<?php


class PembelianController extends BaseController
{
    public function index()
    {
        $listPembelian = $this->model('Pembelian')->getPembelian();
        $listBarang = array();

        foreach ($listPembelian as $pembelian) {
            $barang = $this->model('Barang')->getBarangByIdBarang($pembelian['idBarang']);
            $listBarang[] = [
                "idBarang" => $barang["idBarang"],
                "namaBarang" => $barang["namaBarang"],
                "satuan" => $barang["satuan"],
                "hargaBeli" => $pembelian["hargaBeli"],
                "jumlahPembelian" => $pembelian["jumlahPembelian"],
            ];
        }

        $data['listBarang'] = $listBarang;

        $data['title'] = 'List Pembelian Barang';
        $this->view('template/header', $data);
        $this->view('Pembelian/LihatPembelian', $data);
        $this->view('template/footer');
    }

    public function tambahPembelian()
    {
        $data['title'] = 'Pembelian Stok Barang';
        $data['listBarang'] = $this->model('Barang')->getBarang();

        $this->view('template/header', $data);
        $this->view('Pembelian/TambahPembelian', $data);
        $this->view('template/footer');
    }

    public function processTambahPembelian()
    {
        $idBarang = $_POST['idBarang'];
        $hargaPembelian = $_POST['hargaPembelian'];
        $jumlahPembelian = $_POST['jumlahPembelian'];
        $idPengguna = $_SESSION['username'];

        if ($idBarang == null || strlen($idBarang) == 0) {
            Flasher::setFlash('id barang tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        } elseif ($hargaPembelian == null || $hargaPembelian == 0) {
            Flasher::setFlash('harga pembelian tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        } elseif ($jumlahPembelian == null || $jumlahPembelian == 0) {
            Flasher::setFlash('jumlah pembelian tidak boleh kosong', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        }

        $barang = $this->model('Barang')->getBarangByIdBarang($idBarang);
        if ($barang == null) {
            Flasher::setFlash('barang tidak ditemukan', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        }

        $updatedStok = $barang['stok'] + $jumlahPembelian;
        $isSuccess = $this->model('Barang')->updateStokBarang($idBarang, $updatedStok);
        if (!$isSuccess) {
            Flasher::setFlash('Update stok gagal', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        }

        $isSuccess = $this->model('Pembelian')->insertPembelian($idBarang, $jumlahPembelian, $hargaPembelian, $idPengguna);
        if (!$isSuccess) {
            Flasher::setFlash('pembelian gagal', 'red');
            header('Location: ' . BASEURL . 'Pembelian/tambahPembelian');
            return;
        }

        $namaBarang = $barang['namaBarang'];
        Flasher::setFlash("pembelian $namaBarang berhasil", 'green');
        header('Location: ' . BASEURL . 'Pembelian');
    }
}
