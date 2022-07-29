<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Rekap Surat</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Surat</th>
                                        <th>Nama Surat</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Pengirim</th>
                                        <th>Penerima</th>
                                        <th>Jenis Surat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; 
                                    $hal = 'suratmasuk'?>
                                    <?php foreach ($surat as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['nomor_surat'] ?></td>
                                            <td><?= $p['nama_surat'] ?></td>
                                            <td><?= $p['tanggal_surat'] ?></td>
                                            <td><?= $p['keterangan'] ?></td>
                                            <td><?= $p['dari'] ?></td>
                                            <td><?= $p['untuk'] ?></td>
                                            <td>
                                                <?php if ($p['jenis'] == 1){
                                                    echo "Surat Masuk";
                                                }else{
                                                    echo "Surat Keluar";
                                                } ?>
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