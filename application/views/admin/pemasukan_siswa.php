<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row page-titles">
                                <div class="d-flex justify-content-between">
                                    <div class="judul">
                                        <h4 class="card-title">Daftar Siswa</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kelas</th>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($siswa as $p) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $p['tingkat'] ?> <?= $p['prodi'] ?> <?= $p['rombel'] ?></td>
                                                    <td><?= $p['nis'] ?></td>
                                                    <td><?= $p['nama']?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/editPemasukan_lain/') . $p['nis'] ?>" >Tagihan</a>
                                                        </div>
                                                    </td>
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
            <div class="card-body">
            </div>
        </div>
    </div>
</div>