<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Jumlah Jam</th>
                                            <th>Gaji / Jam</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($guru as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['kode'] ?></td>
                                                <td><?= $p['nama'] ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td><?= $p['jam_kerja'] ?></td>
                                                <td><?= $p['salary_per_hour'] ?></td>
                                                <td><?= ($p['jam_kerja'] * $p['salary_per_hour']) ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('admin/editGuru/') . $p['kode'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <?php if($p['tanggal_pengeluaran'] == NULL): ?>
                                                        <form action="<?= base_url('admin/savepengeluaran')?>" method="post">
                                                            <input type="hidden" name="type" value="1">
                                                            <input type="hidden" name="id_guru"  value="<?= $p['id'] ?>">
                                                            <input type="hidden" name="keterangan" value="Pemberian Gaji bulan <?= date("m")?> tahun <?= date('Y')?>">
                                                            <input type="hidden" name="tanggal_pengeluaran" value="<?= date("Y-m-d H:i:s") ?>">
                                                            <input type="hidden" name="jumlah" value="<?= ($p['jam_kerja'] * $p['salary_per_hour']) ?>">
                                                            <input type="hidden" name="status_gaji" value="MENUNGGU KONFIRMASI">
                                                            <button type="submit" class="btn btn-success shadow btn-xs sharp"><i class="fa fa-check"></i></button>
                                                        </form>
                                                        <?php else :?>
                                                            <span><?= $p['status_gaji'] ?></span>
                                                        <?php endif ;?>
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
</div>