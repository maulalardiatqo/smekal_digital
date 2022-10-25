<div class="content-body">
    <div class="container-fluid">
        <!-- table start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Kelas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Prodi</th>
                                        <th>Rombel</th>
                                        <th>Wali Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kelas as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['tingkat'] ?></td>
                                            <td><?= $p['prodi'] ?></td>
                                            <td><?= $p['rombel'] ?></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= base_url('waka/editKelas/' . $p['id_kelas']) ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('waka/hapusKelas/' . $p['id_kelas']) ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash "></i></a>
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
        <!-- table end -->
    </div>
</div>