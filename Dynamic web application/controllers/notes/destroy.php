<?php

use Core\Database;

$config = require base_path('config.php');

$db = new Database($config['mysql_database'], 'valet', '11001');

$currentUserId = 1;


$note = $db->query('select * from posts where id = :id', ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from posts where id = :id', ['id' => $_POST['id']]);
header('location: /notes');
exit();
