<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Guru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Nama</th>
                                        <th>Pend. Terahir</th>
                                        <th>Gender</th>
                                        <th>Kontak</th>
                                        <th>Tahun Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($guru as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['kode'] ?></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td><?= $p['pendidikan_terakhir'] ?></td>
                                            <td><?php if ($p['gender'] == 1) {
                                                    echo 'Laki - Laki';
                                                } else {
                                                    echo 'Perempuan';
                                                } ?></td>
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