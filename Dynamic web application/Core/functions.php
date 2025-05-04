<?php

use Core\Response;

function dd($value)
{
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
}
//url check :
function urlIs($value): bool
{
	return $_SERVER['REQUEST_URI'] === $value;
}

// authorized:
function authorize($condition, $status = Response::FORBIDDEN)
{
	if (!$condition) {
		abort($status);
	}
}
// base path :
function base_path($path){
	return BASE_PATH . $path;
}

// view :

function view($path, $attributes=[]){
	extract($attributes);
	require base_path('views/'.$path);
}
