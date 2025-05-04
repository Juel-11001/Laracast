<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['mysql_database'], 'valet', '11001');
// dd($_SERVER);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (!Validator::string($_POST['note_body'], 1, 500)) {
		$errors['note_body'] = 'A Body of more than 1 and 500 is  required?';
	}
	
	if (empty($errors)) {
		$db->query('INSERT INTO posts(user_id, body) VALUES (:user_id, :body)', [
			'user_id' => 1,
			'body' => $_POST['note_body']
		]);
	}
}

view('notes/create.view.php', [
	'heading' => 'My Notes',
	'errors' => $errors,
]);