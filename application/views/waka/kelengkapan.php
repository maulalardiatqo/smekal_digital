<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar File Administrasi <?= $nama['nama'] ?></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Tahun Ajaran</th>
                                        <th>MAPEL</th>
                                        <th>JENIS</th>
                                        <th>FILE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($admin as $a) : ?>
                                        <tr>
                                            <td><?= $a['tahun_ajaran'] ?></td>
                                            <td><?= $a['nama_mapel'] ?></td>
                                            <td> <?php
                                                    if ($a['jenis'] == 1) {
                                                        echo 'RPP';
                                                    } elseif ($a['jenis'] == 2) {
                                                        echo 'SILABUS';
                                                    } elseif ($a['jenis'] == 3) {
                                                        echo 'PROTA';
                                                    } elseif ($a['jenis'] == 4) {
                                                        echo 'PROMES';
                                                    } elseif ($a['jenis'] == 5) {
                                                        echo 'RAPORT';
                                                    }
                                                    ?></td>
                                            <td><a href="../uploads/administrasi/<?= $a['file'] ?>.<?= $a['extension'] ?>"> Download File</a></td>
                                        </tr>
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