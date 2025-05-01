<?php

$config = require('config.php');

$db = new Database($config['mysql_database'], 'valet', '11001');
$heading = "note";
// $heading='Notes';
// $id = $_GET['id'];
// dd($id);
// $query = "select*from posts where user_id= :id";
$note = $db->query('select * from posts where id = :id', ['id' => $_GET['id']])->findOrFail();
// dd($note);
// if(! $note){
// 	abort();
// }

$currentUserId=1;
// if($note['user_id'] !== $currentUserId ){
// 	abort(Response::FORBIDDEN);
// }
authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";