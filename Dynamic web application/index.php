<?php
require 'Database.php';
require 'functions.php';
require 'Response.php';

// require 'views/index.view.php';
// dd($_SERVER);

require 'router.php';

//database connection :
// $config=require('config.php');
// $db=new Database($config['mysql_database'], 'valet', '11001');
// $id=$_GET['id'];


// $query="select * from posts where id= ?";
// dd($query);
// $posts=$db->query($query, [$id])->fetchAll(PDO::FETCH_ASSOC);
// dd($posts);
// dd($posts);
// foreach ($posts as $post){
// 	echo "<li>". $post['title']. "</li>";
// }

