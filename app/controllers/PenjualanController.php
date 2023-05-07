<?php


class PenjualanController extends BaseController
{
    public function index()
    {
        $idPengguna = $_SESSION['username'];
        $idAkses = $_SESSION['idAkses'];

        $listPenjualan = array();

        if ($idAkses == ADMIN) {
            $listPenjualan = $this->model('Penjualan')->getPenjualan();
        } else {
            $listPenjualan = $this->model('Penjualan')->getPenjualanByIdPengguna($idPengguna);
        }

        $listBarang = array();

        if ($listPenjualan != null || count($listPenjualan) != 0) {
            foreach ($listPenjualan as $penjualan) {
                $barang = $this->model('Barang')->getBarangByIdBarang($penjualan['idBarang']);
                $listBarang[] = [
                    "idBarang" => $barang["idBarang"],
                    "namaBarang" => $barang["namaBarang"],
                    "satuan" => $barang["satuan"],
                    "hargaJual" => $penjualan["hargaJual"],
                    "jumlahPenjualan" => $penjualan["jumlahPenjualan"],
                ];
            }
        }

        $data['listBarang'] = $listBarang;

        $data['title'] = 'List Penjualan Barang';
        $this->view('template/header', $data);
        $this->view('Penjualan/LihatPenjualan', $data);
        $this->view('template/footer');
    }

    public function tambahPenjualan()
    {
        $data['title'] = 'Penjualan Stok Barang';
        $data['listBarang'] = $this->model('Barang')->getBarang();

        $this->view('template/header', $data);
        $this->view('Penjualan/TambahPenjualan', $data);
        $this->view('template/footer');
    }

    public function processTambahPenjualan()
    {
        $idBarang = $_POST['idBarang'];
        $hargaPenjualan = $_POST['hargaPenjualan'];
        $jumlahPenjualan = $_POST['jumlahPenjualan'];
        $idPengguna = $_SESSION['username'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        } elseif ($hargaPenjualan == null || $hargaPenjualan == 0) {
            Flasher::setFlash('harga Penjualan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        } elseif ($jumlahPenjualan == null || $jumlahPenjualan == 0) {
            Flasher::setFlash('jumlah Penjualan tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        }

        $updatedStok = $barang['stok'] + $jumlahPenjualan;
        $isSuccess = $this->model('Barang')->updateStokBarang($idBarang, $updatedStok);
        if (!$isSuccess) {
            Flasher::setFlash('Update stok gagal', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        }

        $isSuccess = $this->model('Penjualan')->insertPenjualan($idBarang, $jumlahPenjualan, $hargaPenjualan, $idPengguna);
        if (!$isSuccess) {
            Flasher::setFlash('Penjualan gagal', 'red');
            header('Location: ' . BASEURL . 'Penjualan/tambahPenjualan');
            return;
        }

        $namaBarang = $barang['namaBarang'];
        Flasher::setFlash("Penjualan $namaBarang berhasil", 'green');
        header('Location: ' . BASEURL . 'Penjualan');
    }
}
