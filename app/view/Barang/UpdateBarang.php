<!-- Page Content  -->
<div id="content" class="container-fluid">
  <div class="formbold-main-wrapper">
    <div class="formbold-form-wrapper">
      <!-- Please help to change the form action link -->
      <form action="<?= BASEURL; ?>Barang/processUpdateBarang" method="post">
        <h1 class="mb-4">Update Barang</h1>
        <div class="formbold-mb-5">
          <label for="idBarang" class="formbold-form-label"> ID Barang </label>
          <input readonly type="text" value="<?= $data['barang']['idBarang']; ?>" name="idBarang" placeholder="Masukkan ID Barang" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-5">
          <label for="namaBarang" class="formbold-form-label"> Nama Barang </label>
          <input type="text" value="<?= $data['barang']['namaBarang']; ?>" name="namaBarang" placeholder="Masukkan nama Barang" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-5">
          <label for="keterangan" class="formbold-form-label"> Keterangan </label>
          <input type="text" value="<?= $data['barang']['keterangan']; ?>" name="keterangan" id="keterangan" placeholder="Masukkan keterangan barang" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-5">
          <label for="satuan" class="formbold-form-label"> Satuan </label>
          <input type="text" value="<?= $data['barang']['satuan']; ?>" name="satuan" id="satuan" placeholder="Masukkan satuan barang" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-5">
          <label for="harga" class="formbold-form-harga"> Harga </label>
          <input type="number" value="<?= $data['barang']['harga']; ?>" name="harga" id="hrgBeli" placeholder="Masukkan harga barang" class="formbold-form-input" />
        </div>
        <div class="formbold-mb-5">
          <label for="stok" class="formbold-form-stok"> Stok </label>
          <input readonly type="number" value="<?= $data['barang']['stok']; ?>" name="stok" id="hrgBeli" placeholder="Masukkan stok barang" class="formbold-form-input" />
        </div>

        <?php Flasher::flash(); ?>

        <div>
          <button type="submit" class="formbold-btn">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>