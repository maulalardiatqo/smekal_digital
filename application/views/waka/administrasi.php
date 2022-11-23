<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Administrasi Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Guru</th>
                                        <th>Nama Guru</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($guru as $a) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $a['kode'] ?></td>
                                            <td><?= $a['nama'] ?></td>
                                            <td><a href="<?= base_url('waka/kelengkapan/' . $a['kode']) ?>">Lihat Kelengkapan</a></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>