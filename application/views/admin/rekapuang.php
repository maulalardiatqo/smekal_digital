<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Rekap</h4>
            </div>
            <div class="card-body">
                <?php $totalDebet = 0;?>
                <?php $totalKredit = 0;?>
                <?php $totalAmount = 0;?>
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Transaksi</th>
                                <th>Jenis</th>
                                <th>Tanggal</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                                <th>Ket.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            <?php foreach ($rekap as $p) : ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p['no_trans'] ?></td>
                                    <td><?= $p['jen_trans'] ?></td>
                                    <td><?= $p['tanggal_trans'] ?></td>
                                    <td><?= number_format($p['trans_id'],2,'.','.',) ?></td>
                                    <td><?= number_format($p['trans_out'],2,'.','.',) ?></td>
                                    <td><?= number_format($p['total_amount'],2,'.','.',) ?></td>
                                    <td><?= $p['ket'] ?></td>
                                    
                                </tr>
                                <?php 
                                $no++; 
                                $totalDebet += $p['trans_id'];
                                $totalKredit += $p['trans_out'];
                                $totalAmount = $p['total_amount'];
                                ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">Jumlah</th>
                                <th><?= number_format($totalDebet,2,'.',',') ?></th>
                                <th><?= number_format($totalKredit,2,'.',',') ?></th>
                                <th><?= number_format($totalAmount,2,'.','.',) ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>