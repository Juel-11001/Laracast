<?php
$heading = 'Notes';
$config = require('config.php');
$db = new Database($config['mysql_database'], 'valet', '11001');
// dd($_SERVER);

// if($_SERVER['REQUEST_METHOD'] === 'POST'){
// 	dd("you submited the form?");
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = [];
	if (strlen($_POST['note_body']) === 0) {
		$errors['note_body'] = 'Body is required?';
	}
	if(strlen($_POST['note_body'])>100){
		$errors['note_body']='The body can not be more than 100 char?';
	}

	if (empty($errors)) {
		$db->query('INSERT INTO posts(user_id, body) VALUES (:user_id, :body)', [
			'user_id' => 1,
			'body' => $_POST['note_body']
		]);
	}
}

require "views/note-create.view.php";