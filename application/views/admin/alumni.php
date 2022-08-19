<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Alumni</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Alamat</th>
                                        <th>Gender</th>
                                        <th>Kelas</th>
                                        <th>Kontak</th>
                                        <th>Tahun Masuk</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($alumni as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td><?= $p['nis'] ?></td>
                                            <td><?= $p['nisn'] ?></td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?php if ($p['gender'] == 1) {
                                                    echo 'Laki-Laki';
                                                } else {
                                                    echo 'Perempuan';
                                                }

                                                ?></td>
                                            <td><?= $p['kelas'] ?></td>
                                            <td><?= $p['kontak'] ?></td>
                                            <td><?= $p['tahun_masuk'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= base_url('admin/editSiswa/') . $p['nis'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('admin/hapusSiswa/') . $p['nis'] ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
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
</div>