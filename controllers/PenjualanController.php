<?php

class PenjualanController extends BaseController
{
    public function index()
    {
        $idPengguna = $_SESSION['username'];
        $hakAkses = $_SESSION['akses'];

        $listPenjualan = array();

        if ($hakAkses == 'USER') {
            $listPenjualan = $this->model('Penjualan')->getPenjualanByIdPengguna($idPengguna);
        } elseif ($hakAkses == 'ADMIN') {
            $listPenjualan = $this->model('Penjualan')->getPenjualan();
        }

        $listBarang = array();

        if ($listPenjualan != null || count($listPenjualan) != 0) {
            foreach ($listPenjualan as $penjualan) {
                $barang = $this->model('Barang')->getBarangByIdBarang($penjualan['idBarang']);
                $listBarang[] = $barang;
            }
        }

        $data['listBarang'] = $listBarang;
    }

    public function lihatPenjualan()
    {

    }

    public function tambahPenjualan()
    {
        $idBarang = $_POST['idBarang'];
        $hargaPenjualan = $_POST['hargaPenjualan'];
        $jumlahPenjualan = $_POST['$jumlahPenjualan'];
        $idPengguna = $_SESSION['username'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        } elseif ($hargaPenjualan == null || strlen($hargaPenjualan) == 0) {
            Flasher::setFlash('harga Penjualan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        } elseif ($jumlahPenjualan == null || strlen($jumlahPenjualan) == 0) {
            Flasher::setFlash('jumlah Penjualan tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        }

        $updatedStok = $barang['stok'] - $jumlahPenjualan;
        $isSuccess = $this->model('Barang')->updateStokBarang($idBarang, $updatedStok);
        if (!$isSuccess) {
            Flasher::setFlash('Update stok gagal', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        }

        $isSuccess = $this->model('Penjualan')->insertPenjualan($idBarang, $jumlahPenjualan, $hargaPenjualan, $idPengguna);
        if (!$isSuccess) {
            Flasher::setFlash('Penjualan gagal', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        }

        Flasher::setFlash(`Penjualan ${barang['NamaBarang']} gagal`, 'danger');
        header('Location: ' . BASEURL . 'Penjualan');
    }
}