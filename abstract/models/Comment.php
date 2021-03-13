<?php

namespace Models;

use MongoDB\BSON\ObjectId;

class Comment extends Model
{
    public ?string $collectionName = "comments";

    public $comment;

    protected $_id;
}
