<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Input Pemasukan Lain</h4>
            </div>
            <div class="card-body">
                <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('admin/inputPemasukanLain') ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nis">Tanggal Pemasukan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="jumlah_pemasukan">Jumlah Pemasukan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="jumlah_pemasukan" name="jumlah_pemasukan" placeholder="Rp.." required="">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-xl-6">
                                    
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="ket">Keterangan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-lg-8 ms-auto">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>  
                
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row page-titles">
                                <div class="d-flex justify-content-between">
                                    <div class="judul">
                                        <h4 class="card-title">History Transaksi</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>No. Transaksi</th>
                                                <th>Tanggal Pemasukan</th>
                                                <th>Jumlah Pemasukan</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($pemasukan as $p) : ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $p['no_pemasukan'] ?></td>
                                                    <td><?= $p['tanggal_pemasukan'] ?></td>
                                                    <td>Rp.<?= number_format($p['jumlah_pemasukan'],2,'.','.') ?></td>
                                                    <td><?= $p['keterangan'] ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/editPemasukan_lain/') . $p['id_pemasukan'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="<?= base_url('admin/hapusPemasukan_lain/') . $p['id_pemasukan'] ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
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
            <div class="card-body">
            </div>
        </div>
    </div>
</div>