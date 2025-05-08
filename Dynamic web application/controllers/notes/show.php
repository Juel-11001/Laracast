<?php

use Core\App;
use Core\Database;

// $config = require base_path('config.php');
//
// $db = new Database($config['mysql_database'], 'valet', '11001');
$db=App::resolve(Database::class);

$currentUserId = 1;

	$note = $db->query('select * from posts where id = :id', ['id' => $_GET['id']])->findOrFail();

	authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
	'heading' => 'Notes',
	'note' => $note
]);