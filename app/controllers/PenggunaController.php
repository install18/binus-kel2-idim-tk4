<?php

class PenggunaController extends BaseController
{
    public function index()
    {
        $idAkses = $_SESSION['idAkses'];
        $listPengguna = array();

        if ($idAkses == ADMIN) {
            $listPengguna = $this->model('Pengguna')->getPengguna();
        } else {
            $username = $_SESSION['username'];
            $listPengguna = $this->model('Pengguna')->getPenggunaByNamaPengguna($username);
        }

        // $listPengguna = $this->model('Pengguna')->getPengguna();

        $data['listPengguna'] = $listPengguna;
        $data['title'] = 'Lihat Pengguna';
        $this->view('template/header', $data);
        $this->view('Pengguna/LihatPengguna', $data);
        $this->view('template/footer');
    }

    public function login()
    {
        $data['title'] = 'Login';
        $this->view('template/loginRegister_header', $data);
        $this->view('Pengguna/Login');
        $this->view('template/loginRegister_footer');
    }

    public function processLogin()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == null || strlen($username) == 0) {
            Flasher::setFlash('username tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/login');
            return;
        } elseif ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/login');
            return;
        }

        $result = $this->model('Pengguna')->getPenggunaByNamaPenggunaAndPassword($username, $password);

        if ($result == null) {
            Flasher::setFlash('username tidak ditemukan atau password tidak sesuai', 'red');
            header('Location: ' . BASEURL . 'Pengguna/login');
            return;
        }

        $_SESSION['username'] = $result['namaPengguna'];
        $_SESSION['idAkses'] = $result['idAkses'];
        header('Location: ' . BASEURL);
    }

    public function register()
    {
        $data['title'] = 'Register';
        $this->view('template/loginRegister_header', $data);
        $this->view('Pengguna/Register');
        $this->view('template/loginRegister_footer');
    }

    public function processRegister()
    {
        $username = $_POST['namaPengguna'];
        $password = $_POST['password'];
        $namaDepan = $_POST['namaDepan'];
        $namaBelakang = $_POST['namaBelakang'];
        $noHp = $_POST['noHp'];
        $alamat = $_POST['alamat'];
        $access = USER;

        if ($username == null || strlen($username) == 0) {
            Flasher::setFlash('username tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        } elseif ($password == null || strlen($password) == 0) {
            Flasher::setFlash('password tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        } elseif ($namaDepan == null || strlen($namaDepan) == 0) {
            Flasher::setFlash('nama depan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        } elseif ($namaBelakang == null || strlen($namaBelakang) == 0) {
            Flasher::setFlash('nama belakang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        } elseif ($noHp == null || strlen($noHp) == 0) {
            Flasher::setFlash('no hp tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        } elseif ($alamat == null || strlen($alamat) == 0) {
            Flasher::setFlash('alamat tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        }

        $isSuccess = $this->model("Pengguna")->insertPengguna($username, $password, $namaDepan, $namaBelakang, $noHp, $alamat, $access);

        if (!$isSuccess) {
            Flasher::setFlash('registrasi gagal', 'red');
            header('Location: ' . BASEURL . 'Pengguna/register');
            return;
        }

        $_SESSION['username'] = $username;
        $_SESSION['idAkses'] = $access;
        header('Location: ' . BASEURL . 'Home');
    }

    public function logout()
    {
        unset($_SESSION['username']);
        unset($_SESSION['idAkses']);
        header('Location: ' . BASEURL . 'Pengguna/login');
    }

    public function deletePengguna($idPengguna)
    {
        $isSuccess = $this->model("Pengguna")->deletePengguna($idPengguna);

        if (!$isSuccess) {
            Flasher::setFlash('delete pengguna gagal', 'red');
            header('Location: ' . BASEURL . 'Pengguna');
            return;
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
            Flasher::setFlash('password tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        } elseif ($namaDepan == null || strlen($namaDepan) == 0) {
            Flasher::setFlash('nama depan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        } elseif ($namaBelakang == null || strlen($namaBelakang) == 0) {
            Flasher::setFlash('nama belakang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        } elseif ($noHp == null || strlen($noHp) == 0) {
            Flasher::setFlash('no hp tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        } elseif ($alamat == null || strlen($alamat) == 0) {
            Flasher::setFlash('alamat tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        }

        $isSuccess = $this->model("Pengguna")->updatePengguna($username, $password, $namaDepan, $namaBelakang, $noHp, $alamat);

        if (!$isSuccess) {
            Flasher::setFlash('registrasi gagal', 'red');
            header('Location: ' . BASEURL . 'Pengguna/update');
            return;
        }

        header('Location: ' . BASEURL . 'Home');
    }
}
