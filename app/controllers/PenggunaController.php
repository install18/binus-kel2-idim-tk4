<?php

class PenggunaController extends BaseController
{
    public function index()
    {
        $username = $_SESSION['username'];
        $data['pengguna'] = $this->model('Pengguna')->getPenggunaByNamaPengguna($username);
        $this->view('Pengguna/detail', $data);
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $this->model('Pengguna')->getPenggunaByNamaPenggunaAndPassword($username, $password);

        if ($result == null) {
            Flasher::setFlash('username tidak ditemukan atau password tidak sesuai', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/login');
        }

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['access'] = $result['idAkses'];
        header('Location: ' . BASEURL . 'Home');
    }

    public function register()
    {
        $username = $_POST['namaPengguna'];
        $password = $_POST['password'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];
        $access = 'USER';

        if ($username == null || strlen($username) == 0) {
            Flasher::setFlash('username tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        } elseif ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        } elseif ($namaDepan == null || strlen($namaDepan) == 0) {
            Flasher::setFlash('nama depan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        } elseif ($namaBelakang == null || strlen($namaBelakang) == 0) {
            Flasher::setFlash('nama belakang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        } elseif ($noHp == null || strlen($noHp) == 0) {
            Flasher::setFlash('no hp tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        } elseif ($alamat == null || strlen($alamat) == 0) {
            Flasher::setFlash('alamat tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        }

        $isSuccess = $this->model("Pengguna")->insertPengguna($username, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $access);

        if (!$isSuccess) {
            Flasher::setFlash('registrasi gagal', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/register');
        }

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['access'] = $access;
        header('Location: ' . BASEURL . 'Home');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['idAkses']);
        session_destroy();
        header('Location: ' . BASEURL . 'Pengguna/login');
    }

    public function deletePengguna($idPengguna)
    {
        $isSuccess = $this->model("Pengguna")->deletePengguna($idPengguna);

        if (!$isSuccess) {
            Flasher::setFlash('delete pengguna gagal', 'danger');
            header('Location: ' . BASEURL . 'Pengguna');
        }

        header('Location: ' . BASEURL . 'Home');
    }

    public function updatePengguna()
    {
        $username = $_SESSION['username'];
        $password = $_POST['password'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];

        if ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        } elseif ($namaDepan == null || strlen($namaDepan) == 0) {
            Flasher::setFlash('nama depan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        } elseif ($namaBelakang == null || strlen($namaBelakang) == 0) {
            Flasher::setFlash('nama belakang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        } elseif ($noHp == null || strlen($noHp) == 0) {
            Flasher::setFlash('no hp tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        } elseif ($alamat == null || strlen($alamat) == 0) {
            Flasher::setFlash('alamat tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        }

        $isSuccess = $this->model("Pengguna")->updatePengguna($username, $password, $namaDepan, $namaBelakang, $noHp, $alamat);

        if (!$isSuccess) {
            Flasher::setFlash('registrasi gagal', 'danger');
            header('Location: ' . BASEURL . 'Pengguna/update');
        }

        header('Location: ' . BASEURL . 'Home');
    }
}