<?php

class Login extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('login/index');
    }

    public function login()
    {
        $login_model = $this->loadModel('Login');
        $login_succesfull = $login_model->login();

        if ($login_succesfull) {
            header('location: ' . URL . 'dashboard/login');
        } else {
            header('location: ' . URL . 'login/index');
        }
    }

    public function logout()
    {
        $login_model = $this->loadModel('Login');
        $login_model->logout();

        header('location: ' . URL);
    }

    public function register()
    {
        $this->view->render('login/register');
    }

    public function register_action()
    {
        $login_model = $this->loadModel('login');
        $registration_succesfull = $login_model->registerNewUser();

        if ($registration_succesfull) {
            header('location: ' . URL . 'login/index');
        } else {
            header('location: ' . URL . 'login/register');
        }
    }

    public function verify($user_id, $user_verification_code)
    {
        if (isset($user_id) && isset($user_verification_code)) {
            $login_model = $this->loadModel('Login');
            $login_model->verifyNewUser($user_id, $user_verification_code);
            $this->view->render('login/verify');
        } else {
            header('location: ' . URL . 'login/index');
        }
    }
}