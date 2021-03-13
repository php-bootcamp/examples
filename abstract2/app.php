<?php

namespace MongoDB;

trait Transistor {

    /**
     * Convert the `_created` UTCDateTime stamp to PHP native DateTime object
     */
    function getCreatedDateTime() {
        if (!$this->_created) {
            throw new \OutOfBoundsException("No creation time registered yet");
        }
        return $this->_created->toDateTime();
    }

    /**
     * Convert the `_lastModified` UTCDateTime stamp to PHP native DateTime object
     * Note: This does not get updated unless the object is loaded again
     */
    function getLastModifiedDateTime() {
        if (!$this->_lastModified) {
            throw new \OutOfBoundsException("No updates registered yet");
        }
        return $this->_lastModified->toDateTime();
    }

    /**
     * Returns an associative array of "properties", and their values, that should
     * be saved for this object.
     * This method can be overwritten in case you'd like to "hide" certain properties,
     * or otherwise mask them.
     */
    function __getObjectData() {
        $props = get_object_vars($this);

        /* These aren't inserted/updated as values, but magically treated by this trait
         * and/or set/updated by MongoDB */
        unset($props["__original"]);
        unset($props["_lastModified"], $this->__original["_lastModified"]);

        return $props;
    }

    /**
     * Implements the bsonUnserialize method from BSON\Persistable.
     * Will set all root keys from the document as top-level object properties.
     * Stores the original values in a magical `__original` property to be used later
     * for change tracking of this object.
     */
    function bsonUnserialize(array $array) {
        $this->__original = $array;

        foreach($array as $k => $v) {
            $this->{$k} = $v;
        }
    }

    /**
     * Here be dragons.
     * Attempts to diff the current state of the object to its original state,
     * and generate MongoDB update statement out of it.
     *
     * The check is recursive, so deeply nested arrays "should work" (tm).
     */
    function _bsonSerializeRecurs(&$updated, $newData, $oldData, $keyfix = "") {
        foreach($newData as $k => $v) {

            /* A new field -- likely a on-the-fly schema upgrade */
            if (!isset($oldData[$k])) {
                $updated['$set']["$keyfix$k"] = $v;
            }

            /* Changed value */
            elseif ($oldData[$k] != $v) {
                /* Not-empty arrays need to be recursively checked for changes */
                if (is_array($v) && $oldData[$k] && $v) {
                    $this->_bsonSerializeRecurs($updated, $v, $oldData[$k], "$keyfix$k.");
                } else {
                    /* Normal changes in keys can simply be overwritten.
                     * This applies to previously empty arrays/documents too */
                    $updated['$set']["$keyfix$k"] = $v;
                }
            }
        }

        /* Data that used to exist, but now doesn't, needs to be $unset */
        foreach($oldData as $k => $v) {
            if (!isset($newData[$k])) {
                /* Removed field -- likely a on-the-fly schema upgrade */
                $updated['$unset']["$keyfix$k"] = "";
                continue;
            }
        }
    }

    /**
     * Implements the bsonSerialize method from BSON\Persistable.
     *
     * Takes all object properties and stores them as propertyname=>propertyvalue
     * in a BSON Document.
     * Automatically detects if this is a fresh object, or is being updated.
     * Calculates differences for updates based on the `__original` property that was
     * set during the unserialization of this object.
     *
     * Automatically sets `_created` property on this object, and stores it in the
     * document.
     * Automatically updates the `_lastModified` property in the document.
     */
    function bsonSerialize() {
        /* temporary workaround for https://jira.mongodb.org/browse/PHPC-545 */
        $this->__pclass = new BSON\Binary(get_class($this), BSON\Binary::TYPE_USER_DEFINED);

        $props = $this->__getObjectData();

        /* If __original doesn't exist, this is a fresh object that needs to be inserted */
        if (empty($this->__original)) {
            /* Generate the `_created` timestamp */
            $datetime = new BSON\UTCDatetime(microtime(true) * 1000);
            $props["_created"] = $datetime;
            $this->_created = $datetime;

            return $props;
        }


        /* Otherwise, only pluck out the changes so we don't have to do full object replacement */
        $updated = array();
        $this->_bsonSerializeRecurs($updated, $props, $this->__original, "");

        if ($updated) {
            /* Track the last time this document was updated */
            $datetime = new BSON\UTCDatetime(microtime(true) * 1000);
            $updated['$set']["_lastModified"] = $datetime;
            $this->_lastModified = $datetime;
            $this->__original["_lastModified"] = $datetime;

            return $updated;
        }

        /* No changes.. Why is this object being saved? */
        return array();
    }

}

namespace App;

use Exception;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\Persistable;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;
use MongoDB\Transistor;

class Comment implements Persistable
{
    use Transistor;

    public $_id;

    public $comment;

    public function __construct($comment)
    {
        $this->comment = $comment;

        $this->_id     = new ObjectId();
    }

}

class Post implements Persistable
{
    use Transistor;

    public $_id;
    public $_lastModified;
    public $_created;

    public $name;
    public $comments = [];

    public function __construct($name) {
        $this->name = $name;

        $this->_id = new ObjectId();
    }

    public function addComment(Comment $comment) {
        $this->comments[] = $comment;
    }

    public function removeComment(Comment $comment) {
        foreach($this->comments as $k => $curr) {
            if ($curr->_id == $comment->_id) {
                unset($this->comments[$k]);

                /* We need to reindex the PHP array so it starts from 0 again */
                $this->comments = array_values($this->comments);
                return true;
            }
        }
    }
}

$_manager = new Manager('mongodb://localhost:27017');
const NS = "blog.posts";

function insert(Persistable $object) {
    global $_manager;

    try {
        $bulk = new BulkWrite();
        $bulk->insert($object);
        $_manager->executeBulkWrite(NS, $bulk);
    } catch(\Exception $e) {
        echo $e->getMessage();
        echo $e->getTraceAsString();
    }
}

function update(array $array, Persistable $object) {
    global $_manager;

    try {
        $bulk = new BulkWrite;
        $bulk->update($array, $object);
        $_manager->executeBulkWrite(NS, $bulk);
    } catch(Exception $e) {
        echo $e->getMessage();
        echo $e->getTraceAsString();
    }

    return findOne($array);
}

function findOne(array $array = array()) {
    global $_manager;


    $result = $_manager->executeQuery(NS, new Query($array));

    $objects = $result->toArray();
    if ($objects) {
        return $objects[0];
    }
}

/*
$post = new Post("İlk Post");
//$post->addComment(new Comment("İlk Yorum"));
//$post->addComment(new Comment("İkinci Yorum"));

insert($post);*/



$post = findOne(['name' => "İlk Post"]);
$post->name = "İlk Post Güncel!";
//$post->addComment(new Comment("Üçüncü Yorum"));
//$post->removeComment(new Comment("İlk Yorum"));

update(['name' => "İlk Post"], $post);
