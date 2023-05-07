<!-- Page Content  -->
<div id="content" class="container-fluid">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <!-- Please help to change the form action link -->
            <form action="<?= BASEURL; ?>Penjualan/processTambahPenjualan" method="post">
                <h1 class="mb-4">Jual Stok Barang</h1>
                <div class="formbold-mb-5">
                    <label for="namaBarang" class="formbold-form-label"> Nama Barang </label>
                    <select class="formbold-form-input" name="idBarang">
                        <?php foreach ($data['listBarang'] as $barang) : ?>
                            <option value="<?= $barang['idBarang']; ?>"><?= $barang['namaBarang']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="formbold-mb-5">
                    <label for="hargaPenjualan" class="formbold-form-harga"> Harga </label>
                    <input type="number" name="hargaPenjualan" id="hargaPenjualan" placeholder="Masukkan harga barang" class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="jumlahPenjualan" class="formbold-form-stok"> Stok </label>
                    <input type="number" name="jumlahPenjualan" id="jumlahPenjualan" placeholder="Masukkan stok barang" class="formbold-form-input" />
                </div>

                <?php Flasher::flash(); ?>

                <div>
                    <button type="submit" class="formbold-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>