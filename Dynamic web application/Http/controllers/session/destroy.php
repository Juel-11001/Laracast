<?php
//logout the user :
use Core\Authenticator;

$auth=new Authenticator();
$auth->logout();
header('location: /');
exit();