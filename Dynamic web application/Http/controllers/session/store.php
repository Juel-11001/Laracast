<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Session;
use Http\Forms\LoginForm;

$db = App::resolve(Database::class);
$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
	$auth = new Authenticator();
	if ($auth->attempt($email, $password)) {
		redirect('/');
	}
	$form->error('email', "No matching account found for that email address and password!");

}
// $_SESSION['_flash']['errors']=$form->errors();
Session::flash('errors', $form->errors());
redirect('/login');
// return view('session/create.view.php', [
// 	'errors' => $form->errors()
// ]);

//validate form input :
// $errors = [];
// if (! Validator::email($email)) {
// 	$errors['email'] = "Please Provide a Valid Eamil !";
// }
// if (!Validator::string($password)) {
// 	$errors['password'] = 'Please provide valid password';
// }
// if (!empty($errors)) {
// 	return view('session/create.view.php', [
// 		'errors' => $errors
// 	]);
// }

// return view('session/create.view.php', [
// 	'errors' => [
// 		'email' => "No matching account found for that email address and password!"
// 	]
// ]);

// $user = $db->query('select * from users where email= :email', [
// 	'email' => $email
// ])->find();
//
// if ($user) {
// 	if (password_verify($password, $user['password'])) {
// 		login([
// 			'email' => $email
// 		]);
// 		header('location: /');
// 		exit();
// 	}
// }

// return view('session/create.view.php', [
// 	'errors' => [
// 		'email' => "No matching account found for that email address and password!"
// 	]
// ]);