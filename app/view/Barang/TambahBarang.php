<!-- Page Content  -->
<div id="content" class="container-fluid">
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <!-- Please help to change the form action link -->
            <form action="<?= BASEURL; ?>Barang/processTambahBarang" method="post">
                <h1 class="mb-4">Tambah Barang</h1>
                <div class="formbold-mb-5">
                    <label for="namaBarang" class="formbold-form-label"> Nama Barang </label>
                    <input type="text" name="namaBarang" placeholder="Masukkan nama Barang" class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="keterangan" class="formbold-form-label"> Keterangan </label>
                    <input type="text" name="keterangan" id="keterangan" placeholder="Masukkan keterangan barang" class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="satuan" class="formbold-form-label"> Satuan </label>
                    <input type="number" name="satuan" id="satuan" placeholder="Masukkan satuan barang" class="formbold-form-input" />
                </div>
                <div class="formbold-mb-5">
                    <label for="harga" class="formbold-form-harga"> Harga </label>
                    <input type="number" name="harga" id="hrgBeli" placeholder="Masukkan harga barang" class="formbold-form-input" />
                </div>

                <?php Flasher::flash(); ?>

                <div>
                    <button type="submit" class="formbold-btn">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>