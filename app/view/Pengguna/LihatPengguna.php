<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-4">
          <h2 class="heading-section">Daftar Pengguna</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="table-wrap">
            <table class="table">
              <thead class="thead-primary">
                <tr>
                  <th>Nama Pengguna</th>
                  <th>Nama Depan</th>
                  <th>Nama Belakang</th>
                  <th>No HP</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['listPengguna'] as $pengguna) : ?>
                  <tr>
                    <td>
                      <div class="namaBrg">
                        <span><?= $pengguna['namaPengguna'] ?></span>
                      </div>
                    </td>

                    <td><?= $pengguna['namaDepan'] ?></td>
                    <td><?= $pengguna['namaBelakang'] ?></td>
                    <td><?= $pengguna['noHp'] ?></td>
                    <td><?= $pengguna['alamat'] ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</div>