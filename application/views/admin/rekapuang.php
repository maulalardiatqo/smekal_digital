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
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Uraian</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;$saldo = $rekap[0]['jumlah']; ?>
                            <?php foreach ($rekap as $p) : ?>
                                <?php 
                                    if($no > 1){
                                        if($p['type_transaction'] == 'pemasukan'){
                                            $saldo = $saldo + $p['jumlah'];
                                            $totalDebet = $totalDebet + $p['jumlah'];
                                        }else{
                                            $saldo = $saldo - $p['jumlah'];
                                            $totalKredit = $totalKredit + $p['jumlah'];
                                        }
                                    } 
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $p['tanggal'] ?></td>
                                    <td><?= $p['keterangan'] ?></td>
                                    <td><?= $p['type_transaction'] == 'pemasukan' ? number_format($p['jumlah'],2,'.',',') : '' ?></td>
                                    <td><?= $p['type_transaction'] == 'pengeluaran' ? number_format($p['jumlah'],2,'.',',') : '' ?></td>
                                    <td><?= number_format($saldo,2,'.',',') ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Jumlah</th>
                                <th><?= number_format($totalDebet,2,'.',',') ?></th>
                                <th><?= number_format($totalKredit,2,'.',',') ?></th>
                                <th><?= number_format($saldo,2,'.',',') ?></th>
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>