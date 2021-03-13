<?php

namespace Lib;

use Models\Model;
use MongoDB\Driver\BulkWrite;
use MongoDB\Driver\Manager;

class Database
{
    public static $instance;

    protected $manager;

    private function __construct()
    {
        $this->manager = new Manager('mongodb://localhost:27017');
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function create(Model $object): void
    {
        $bulk = new BulkWrite();
        $bulk->insert($object);
        $this->manager->executeBulkWrite("blog.".$object->collectionName, $bulk);
    }

    public function update(Model $object): void
    {
        $bulk = new BulkWrite();
        $bulk->update(['slug' => "test-post"], $object);
        $this->manager->executeBulkWrite("blog.".$object->collectionName, $bulk);
    }

    public function find(string $collectionName, array $query): Model
    {
        $result = $this->manager->executeQuery("blog.".$collectionName, new \MongoDB\Driver\Query($query));

        $objects = $result->toArray();
        if ($objects)
            return $objects[0];
    }
}
