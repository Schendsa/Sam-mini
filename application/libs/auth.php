<?php

Class Auth
{
	public static function handleLogin()
	{
		// initialize the session
		Session::init();

		if (!isset($_SESSION['user_logged_in'])) {
			Session::destroy();
			header('location: ' . URL . 'login');
			exit();
		}
	}
}