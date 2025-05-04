<?php

$config = require('config.php');

$db = new Database($config['mysql_database'], 'valet', '11001');

$heading='Notes';
// $id=$_GET['id'];
// $query = "select*from posts where user_id=1";
$notes = $db->query("select*from posts where user_id=1")->get();
// dd($notes);

require "views/notes/index.view.php";