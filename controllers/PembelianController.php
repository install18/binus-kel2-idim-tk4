<?php

class PembelianController extends BaseController
{
    public function index() {
        $listPembelian = $this->model('Barang')->getPembelian();
        $listBarang = array();

        foreach ($listPembelian as $pembelian) {
            $barang = $this->model('Barang')->getBarangByIdBarang($pembelian['idBarang']);
            $listBarang[] = $barang;
        }

        $data['listBarang'] = $listBarang;
    }

    public function tambahPembelian()
    {
        $idBarang = $_POST['idBarang'];
        $hargaPembelian = $_POST['hargaPembelian'];
        $jumlahPembelian = $_POST['$jumlahPembelian'];
        $idPengguna = $_SESSION['username'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        } elseif ($hargaPembelian == null || strlen($hargaPembelian) == 0) {
            Flasher::setFlash('harga pembelian tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        } elseif ($jumlahPembelian == null || strlen($jumlahPembelian) == 0) {
            Flasher::setFlash('jumlah pembelian tidak boleh kosong', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        }

        $updatedStok = $barang['stok'] - $jumlahPembelian;
        $isSuccess = $this->model('Barang')->updateStokBarang($idBarang, $updatedStok);
        if (!$isSuccess) {
            Flasher::setFlash('Update stok gagal', 'danger');
            header('Location: ' . BASEURL . 'Penjualan');
        }

        $isSuccess = $this->model('Pembelian')->insertPembelian($idBarang, $jumlahPembelian, $hargaPembelian, $idPengguna);
        if (!$isSuccess) {
            Flasher::setFlash('pembelian gagal', 'danger');
            header('Location: ' . BASEURL . 'Pembelian');
        }

        Flasher::setFlash(`pembelian ${barang['NamaBarang']} gagal`, 'danger');
        header('Location: ' . BASEURL . 'Pembelian');
    }
}