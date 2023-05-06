<?php

class LoginController extends BaseController
{
    public function index()
    {
        $this->view('login');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->model('Pengguna')->getPenggunaByNamaPenggunaAndPassword($username, $password);

        if ($result != null) {
            session_start();
            $_SESSION['username'] = $username;
            header('Location: ' . BASEURL . 'Home');
        } else {
            Flasher::setFlash('username tidak ditemukan atau password tidak sesuai', 'login', 'danger');
            header('Location: ' . BASEURL . 'Login');
            exit;
        }
    }
}