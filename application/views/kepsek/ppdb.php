<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <small>Jumlah Casis : <?= $calon ?></small> <br>
                        <small>Jumlah Casis DU : <?= $du ?></small> <br>
                        <small>Jumlah Casis Cancel : <?= $cancel ?></small> <br>
                        <small>Jumlah Casis FIX : <?= $fix ?></small> <br>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jumlah Perolehan Perguru</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($guru as $g) :
                                        $cas = $this->db->get_where('casis', ['pendamping' => $g['nama']])->num_rows();
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $g['nama'] ?></td>
                                            <td><?= $cas ?></td>
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