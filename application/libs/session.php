<?php

//Session class handles session stuff
class Session
{
	/** 
	*	Start session
	*/
	public static function init()
	{
		// if no session exist, start session
		if(session_id() == '') {
			session_start();
		}
	}

	/** 
	*	set specific value to specific key in session
	*/
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	/**
	* return the value of a specific key of the session
	*/
	public static function get($key)
	{
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
	}
	/**
	* Deletes the session (= logs the user out)
	*/
	public static function destroy()
	{
		session_destroy();
	}
}