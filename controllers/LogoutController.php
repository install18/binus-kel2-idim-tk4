<?php

class LogoutController extends BaseController
{
    public function index()
    {
        unset($_SESSION['username']);
        session_destroy();
        header('Location: ' . BASEURL . 'Login');
    }
}