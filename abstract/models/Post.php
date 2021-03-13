<?php

namespace Models;

use MongoDB\BSON\Binary;
use MongoDB\BSON\ObjectId;

class Post extends Model
{
    public ?string $collectionName = "posts";

    public $name;
    public $slug;
    public $comments = [];

    protected $_id;

    public function bsonSerialize(): array
    {
        return [
            '$set' => [
                'slug' => "deneme"
            ]
        ];
        /*
        return [
            "_id" => $this->_id,
            "__pclass" => new Binary(get_class($this), Binary::TYPE_USER_DEFINED),
            'name' => $this->name,
            'slug' => $this->slug,
        ];
        */
    }
}
