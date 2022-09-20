<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Gaji Bulan Ini</h5>
            </div>
            <div class="card-body">
                <?php foreach ($gaji as $g) : ?>
                    <?php if ($g['status_gaji'] == 'MENUNGGU KONFIRMASI') : ?>
                        <p class="card-text">
                            Tanggal Terima Gaji : <?= $g['tanggal_pengeluaran'] ?><br>
                            Jumlah Gaji : <?= $g['jumlah'] ?><br>
                        </p>
                    <?php endif ?>
            </div>
            <div class="card-footer d-sm-flex justify-content-between align-items-center">
                <a href="<?= base_url('guru/updateGaji/' . $g['id_guru'])  ?>" class="btn btn-primary">Konfirmasi Terima Gaji</a>
            </div>
        <?php endforeach ?>
        </div>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Histori Gaji</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive table-sm">
                    <table id="example" class="display" style="min-width: 545px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($gaji as $g) :
                            ?>
                                <?php if ($g['status_gaji'] == 'TERKONFIRMASI') : ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $g['tanggal_pengeluaran'] ?></td>
                                        <td><?= $g['jumlah'] ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endif ?>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>