<?php

use Core\Database;

$config = require base_path( 'config.php');

$db = new Database($config['mysql_database'], 'valet', '11001');

$notes = $db->query("select*from posts where user_id=1")->get();

view('notes/index.view.php', [
	'heading'=>'My Notes Lists',
	'notes'=>$notes
]);