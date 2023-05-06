<?php

class RegisterController extends BaseController
{
    public function index()
    {
        $this->view('register');
    }

    private function register()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $access = 'BUYER';

        if ($username == null || strlen($username) == 0) {
            Flasher::setFlash('username tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Register');
        } elseif ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Register');
        } elseif ($namaDepan == null || strlen($namaDepan) == 0) {
            Flasher::setFlash('nama depan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Register');
        } elseif ($namaBelakang == null || strlen($namaBelakang) == 0) {
            Flasher::setFlash('nama belakang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Register');
        }

        $isSuccess = $this->model("Pengguna")->insertPengguna($username, $password, $namaDepan, $namaBelakang, $access);

        if (!$isSuccess) {
            Flasher::setFlash('registrasi gagal', 'danger');
            header('Location: ' . BASEURL . 'Register');
        }

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['access'] = $access;
        header('Location: ' . BASEURL . 'Home');
    }
}