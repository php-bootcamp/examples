<?php

class User implements \MongoDB\BSON\Persistable
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function bsonSerialize()
    {
        $props = get_object_vars($this);
        $datetime = new \MongoDB\BSON\UTCDateTime(microtime(true) * 1000);
        $props["createdAt"] = $datetime;
        $this->createdAt = $datetime;

        return $props;
    }

    public function bsonUnserialize(array $data)
    {
        foreach ($data as $key => $value)
            $this->{$key} = $value;
    }
}

$database = new \MongoDB\Driver\Manager('mongodb://localhost:27017');

/*
function insert($object) {
    global $database;

    $bulk = new MongoDB\Driver\BulkWrite;
    $bulk->insert($object);
    $database->executeBulkWrite("blog.users", $bulk);
}

$user = new User("Eray");
insert($user);
*/

function find($query) {
    global $database;

    $result = $database->executeQuery("blog.users", new \MongoDB\Driver\Query($query));

    $objects = $result->toArray();
    if ($objects)
        return $objects[0];
}

$user = find(['name' => "Eray"]);
var_dump($user);