<?php

class BarangController extends BaseController
{
    public function index()
    {
        $data['title'] = 'List Barang';
        $data['listBarang'] = $this->model('Barang')->getBarang();

        $this->view('template/header', $data);
        $this->view('Barang/LihatBarang', $data);
        $this->view('template/footer');
    }

    public function tambahBarang()
    {
        $data['title'] = 'Tambah Barang';
        $this->view('template/header', $data);
        $this->view('Barang/TambahBarang');
        $this->view('template/footer');
    }

    public function processTambahBarang()
    {
        $namaBarang = $_POST['namaBarang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stok = 0;
        $idPengguna = $_SESSION['username'];

        if ($namaBarang == null || strlen($namaBarang) == 0) {
            Flasher::setFlash('nama barang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/tambahBarang');
            return;
        } elseif ($harga == null || strlen($harga) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/tambahBarang');
            return;
        } elseif ($satuan == null || strlen($satuan) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/tambahBarang');
            return;
        }

        $isSuccess = $this->model('Barang')->insertBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idPengguna);

        if (!$isSuccess) {
            Flasher::setFlash('insert barang gagal', 'red');
            header('Location: ' . BASEURL . 'Barang/tambahBarang');
            return;
        }

        header('Location: ' . BASEURL . 'Barang');
    }

    public function deleteBarang($idBarang)
    {
        $isSuccess = $this->model('Barang')->deleteBarang($idBarang);
        if (!$isSuccess) {
            Flasher::setFlash('delete barang gagal', 'red');
            header('Location: ' . BASEURL . 'Barang');
            return;
        }

        header('Location: ' . BASEURL . 'Barang');
    }

    public function updateBarang($idBarang)
    {
        $data['title'] = 'Update Barang';
        $data['barang'] = $this->model('Barang')->getBarangByIdBarang($idBarang);
        $this->view('template/header', $data);
        $this->view('Barang/UpdateBarang', $data);
        $this->view('template/footer');
    }

    public function processUpdateBarang()
    {
        $idBarang = $_POST['idBarang'];
        $namaBarang = $_POST['namaBarang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/updateBarang/' . $idBarang);
            return;
        } elseif ($namaBarang == null || strlen($namaBarang) == 0) {
            Flasher::setFlash('nama barang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/updateBarang/' . $idBarang);
            return;
        } elseif ($keterangan == null || strlen($keterangan) == 0) {
            Flasher::setFlash('keterangan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/updateBarang/' . $idBarang);
            return;
        } elseif ($harga == null || strlen($harga) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/updateBarang/' . $idBarang);
            return;
        } elseif ($satuan == null || strlen($satuan) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Barang/updateBarang/' . $idBarang);
            return;
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'red');
            header('Location: ' . BASEURL . 'Barang');
            return;
        }

        $isSuccess = $this->model('Barang')->updateBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idBarang);
        if (!$isSuccess) {
            Flasher::setFlash('insert barang gagal', 'red');
            header('Location: ' . BASEURL . 'Barang');
            return;
        }

        header('Location: ' . BASEURL . 'Barang');
    }
}
