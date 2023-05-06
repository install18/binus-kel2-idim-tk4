<?php

class BarangController extends BaseController
{
    public function index()
    {
        $this->view('lihatBarang');
        $data['listMahasiswa'] = $this->model('Barang')->getBarang();
    }

    public function tambahBarang()
    {
        $namaBarang = $_POST['namaBarang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stok = 0;
        $idPengguna = $_SESSION['username'];

        if ($namaBarang == null || strlen($namaBarang) == 0) {
            Flasher::setFlash('nama barang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($keterangan == null || strlen($keterangan) == 0) {
            Flasher::setFlash('keterangan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($harga == null || strlen($harga) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($satuan == null || strlen($satuan) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        }

        $isSuccess = $this->model('Barang')->insertBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idPengguna);

        if (!$isSuccess) {
            Flasher::setFlash('insert barang gagal', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        }

        Flasher::setFlash('insert barang berhasil', 'success');
        header('Location: ' . BASEURL . 'Barang');
    }

    public function deleteBarang($idBarang)
    {
        $isSuccess = $this->model('Barang')->updateBarang($idBarang);
        if (!$isSuccess) {
            Flasher::setFlash('delete barang gagal', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        }

        Flasher::setFlash('delete barang berhasil', 'success');
        header('Location: ' . BASEURL . 'Barang');
    }

    public function updateBarang()
    {
        $idBarang = $_POST['idBarang'];
        $namaBarang = $_POST['namaBarang'];
        $keterangan = $_POST['keterangan'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stok = 0;
        $idPengguna = $_SESSION['username'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($namaBarang == null || strlen($namaBarang) == 0) {
            Flasher::setFlash('nama barang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($keterangan == null || strlen($keterangan) == 0) {
            Flasher::setFlash('keterangan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($harga == null || strlen($harga) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        } elseif ($satuan == null || strlen($satuan) == 0) {
            Flasher::setFlash('satuan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        }

        $isSuccess = $this->model('Barang')->updateBarang($namaBarang, $keterangan, $harga, $satuan, $stok, $idBarang);
        if (!$isSuccess) {
            Flasher::setFlash('insert barang gagal', 'danger');
            header('Location: ' . BASEURL . 'Barang');
        }

        Flasher::setFlash('insert barang berhasil', 'success');
        header('Location: ' . BASEURL . 'Barang');
    }
}