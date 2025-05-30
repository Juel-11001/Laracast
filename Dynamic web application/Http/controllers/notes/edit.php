<?php

use Core\App;
use Core\Database;

$db=App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('select * from posts where id = :id', ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);
view('notes/edit.view.php', [
	'heading' => 'My Notes',
	'errors' => [],
	'note'=> $note,
]);