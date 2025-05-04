<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['mysql_database'], 'valet', '11001');

$currentUserId = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$note = $db->query('select * from posts where id = :id', ['id' => $_GET['id']])->findOrFail();

	authorize($note['user_id'] === $currentUserId);

	$db->query('delete from posts where id = :id', ['id' => $_GET['id']]);
	header('location: /notes');
	exit();
} else {
	$note = $db->query('select * from posts where id = :id', ['id' => $_GET['id']])->findOrFail();

	authorize($note['user_id'] === $currentUserId);
}

view('notes/show.view.php', [
	'heading' => 'Notes',
	'note' => $note
]);