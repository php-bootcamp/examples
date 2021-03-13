<?php

namespace Models;

use Lib\Database;
use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\Persistable;
use MongoDB\BSON\UTCDateTime;

abstract class Model implements Persistable
{
    protected array $originalAttributes = [];

    protected bool $timestamps = true;

    public ?string $collectionName = null;

    protected function diff(&$updated, $new, $old, $prefix = "")
    {
        $updated = [];

        foreach ($new as $key => $value)
        {
            if (!isset($old[$key])) {
                $updated['$set']["$prefix$key"] = $value;
                continue;
            }

            if ($old[$key] === $value) {
                continue;
            }

            if (is_array($value) && $old[$key] && $value) {
                $this->diff($updated, $value, $old[$key], "$prefix$key.");
                continue;
            }

            $updated['$set']["$prefix$key"] = $value;
        }

        foreach ($old as $key => $value) {
            if (isset($new[$key])) {
                continue;
            }

            $updated['$unset']["$prefix$key"] = null;
        }

        return $updated;
    }

    public function bsonSerialize(): array
    {
        $props = get_object_vars($this);

        $props['__pclass'] = new Binary(get_class($this), Binary::TYPE_USER_DEFINED);

        unset($props['timestamps'], $props['originalAttributes'], $props['collectionName'], $props['_id']);
        $datetime = new UTCDateTime(microtime(true) * 1000);

        if ($this->_id !== null) {
            $props['_id'] = $this->_id;
        }

        if (!empty($this->originalAttributes)) {

            $this->diff($updated, $props, $this->originalAttributes);

            $updated['_id'] = $this->_id;

            /*
            if ($this->timestamps) {
                $updated['$set']["updatedAt"] = $datetime;
                $this->updatedAt = $datetime;
                $this->originalAttributes["updatedAt"] = $datetime;
            }
            */

            return $updated;
        }

        if ($this->timestamps) {
            $this->createdAt = $datetime;
        }

        return $props;
    }

    /** @noinspection SpellCheckingInspection */
    public function bsonUnserialize(array $data): void
    {
        $this->originalAttributes = $data;

        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function find(array $query): self
    {
        return Database::getInstance()->find($this->collectionName, $query);
    }

    public function save()
    {
        if ($this->originalAttributes) {
            Database::getInstance()->update($this);
            return;
        }

        Database::getInstance()->create($this);
    }
}
