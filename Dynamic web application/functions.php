<?php
function dd($value)
{
	echo "<pre>";
	var_dump($value);
	echo "</pre>";
	die();
}

// dd($_SERVER);
// echo $_SERVER['REQUEST_URI'];

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