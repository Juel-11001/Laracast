<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db=App::resolve(Database::class);
$currentUserId = 1;
//find the data :
$note = $db->query('select * from posts where id = :id', ['id' => $_POST['id']])->findOrFail();
//authrozed the user:
authorize($note['user_id'] === $currentUserId);

//validation :
$errors = [];

if (!Validator::string($_POST['note_body'], 1, 500)) {
	$errors['note_body'] = 'A Body of more than 1 and 500 is  required?';
}
//if no error then update the data :

if(count($errors)){
	return view('notes/edit.view.php',[
		'heading'=> 'Edit Note',
		'errors'=>$errors,
		'note'=> $note
	]);
}
$db->query('update posts set body= :note_body where id= :id',[
	'id'=>$_POST['id'],
	'note_body'=>$_POST['note_body']
]);

//rediracte user :

header('location: /notes');
die();