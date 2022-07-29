<div class="content-body">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title fs-6">Daftar Surat</h1>
            </div>
            <div class="card-body">
                <div class="table table-sm">
                    <table id="" class="display" style="font-size:xx-small;">
                        <thead>
                            <tr>
                                <th style="font-size:8px;">No</th>
                                <th style="font-size:8px;">Tanggal</th>
                                <th style="font-size:8px;">Dari</th>
                                <th style="font-size:8px;">Untuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($surat as $p) : ?>
                                <tr>
                                    <td style="font-size:8px;"><?= $p['nomor_surat'] ?></td>
                                    <td style="font-size:8px;"><?= $p['tanggal_surat'] ?></td>
                                    <td style="font-size:8px;"><?= $p['dari'] ?></td>
                                    <td style="font-size:8px;"><?= $p['untuk'] ?></td>
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