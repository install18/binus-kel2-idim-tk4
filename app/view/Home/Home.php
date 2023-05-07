<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-4">
                    <h2 class="heading-section">Daftar Barang</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Keterangan</th>
                                    <th>Satuan</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['listBarang'] as $barang) : ?>
                                    <tr>
                                        <td>
                                            <div class="namaBrg">
                                                <span><?= $barang['namaBarang'] ?></span>
                                            </div>
                                        </td>
                                        <td><?= $barang['keterangan'] ?></td>

                                        <td><?= $barang['satuan'] ?></td>
                                        <td><?= $barang['stok'] ?></td>
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
</div>