<?php

use Core\App;
use Core\Database;
use Core\Validator;
$db = APP::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];
//validate form input :
$errors = [];
if (! Validator::email($email)) {
	$errors['email'] = "Please Provide a Valid Eamil !";
}
if (!Validator::string($password, 7, 255)) {
	$errors['password'] = 'Please provide password of seven character.';
}
if (!empty($errors)) {
	return view('registation/create.view.php', [
		'errors' => $errors
	]);
}
// check the user email is already exists:

$user = $db->query('select * from users where email =:email', [
	'email' => $email
])->find();
// dd($result);
if ($user) {
	//if exists then show error and redireact:
	header('location: /');
	exit();
} else {
	// if not exists then store the data into database:
	$db->query('insert into users (email, password) values (:email, :password)', [
		'email' => $email,
		'password' => password_hash($password, PASSWORD_BCRYPT)
	]);
	login([
		'email'=>$email
	]);
	header('location: /');
	exit();
}
