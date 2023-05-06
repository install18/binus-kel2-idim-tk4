<?php

class LogoutController extends BaseController
{
    public function index()
    {
        unset($_SESSION['username']);
        unset($_SESSION['user_id']);
        session_destroy();
        header('Location: ' . BASEURL . 'Login');
    }
}