<?php

class RegisterController extends BaseController
{
    public function index()
    {
        $this->view('register');
    }

    public function register() {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == null || strlen($username) == 0) {
            Flasher::setFlash('username tidak boleh kosong', 'register', 'danger');
            header('Location: ' . BASEURL . 'Register');
        } elseif ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'register', 'danger');
            header('Location: ' . BASEURL . 'Register');
        }

        session_start();
        header('Location: ' . BASEURL . 'Home');
    }
}