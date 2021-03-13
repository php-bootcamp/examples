<?php

require "vendor/autoload.php";

// Post ekleme
/*
$post = new Models\Post;
$post->name = "Test Post";
$post->slug = "test-post";
$post->save();
*/

// Post alma


//$post = new Models\Post;
//$post->name = "Test Post";
//$post->slug = "test-post";
//
//$comment1 = new Models\Comment;
//$comment1->comment = "İlk Yorum";
//
//$comment2 = new Models\Comment;
//$comment2->comment = "İkinci Yorum";
//
//$post->comments = [
//    $comment1,
//    $comment2
//];



$post = (new Models\Post)->find(['slug' => "test-post"]);
$post->name = "Test Post Güncellendi!";
/*
$comment1 = $post->comments[0];
$comment1->comment = "Yorum 1 Güncellendi!";
$comment3 = new Models\Comment;
$comment3->comment = "Yorum 3 Yeni!";
$post->comments = [
    $comment1,
    $comment3,
];
*/

var_dump($post);
$post->save();