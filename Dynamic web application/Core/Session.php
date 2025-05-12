<?php

namespace Core;

class Session
{
	public static function has($key)
	{
		return (bool)static::get($key);
	}

	public static function put($key, $vlaue)
	{
		$_SESSION[$key] = $vlaue;
	}

	public static function get($key, $default = null)
	{
		if (isset($_SESSION['_flash'][$key])) {
			return $_SESSION['_flash'][$key];
		}
		return $_SESSION[$key] ?? $default;

	}

	public static function flash($key, $vlaue)
	{
		$_SESSION['_flash'][$key] = $vlaue;
	}

	public static function unflash()
	{
		unset($_SESSION['_flash']);
	}

	public static function flush()
	{
		$_SESSION=[];
	}

	public static function destroy()
	{
		static::flush();
		session_destroy();
		$params = session_get_cookie_params();
		setcookie('PHPSESSID', '', time() - 1500, $params['domain'], $params['secure'], $params['httponly']);
	}
}