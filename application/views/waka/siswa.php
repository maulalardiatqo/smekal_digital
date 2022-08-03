<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Siswa</h4>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($siswa as $p) : ?>
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