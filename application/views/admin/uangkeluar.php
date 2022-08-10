<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="page-titles d-flex justify-content-between">
            <button type="button" class="btn light btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-plus"></i> 
                Add
            </button>
            <a href="<?php echo base_url('admin/gaji')?>" class="btn btn-info">Gaji Karyawan</a>
        </div>
        <!-- modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate="" action="<?= base_url('admin/savepengeluaran') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name='id'>
                        <div class="col-xl-12">
                        <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="type">Jenis Pengeluaran
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="type" name="type">
                                        <option value="0">Please select</option>
                                        <?php foreach($jenis_pemasukan as $j) : ?>
                                            <?php if($j['id'] == 1): ?>
                                                <option value="<?= $j['id']?>" disabled><?= $j['desc']?></option>
                                            <?php endif ?>
                                            <?php if($j['id'] != 1): ?>
                                                <option value="<?= $j['id']?>"><?= $j['desc']?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row d-none" id='input_id_siswa'>
                                <label class="col-lg-2 col-form-label" for="id_siswa">Siswa
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="id_siswa" name="id_siswa">
                                        <option data-display="Select" value="null">Please select</option>
                                        <?php foreach($siswa as $s) : ?>
                                            <option value="<?= $s['id']?>"><?= $s['nama']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="jumlah">Amount
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control decimal-input" id="jumlah" name="jumlah" placeholder="Jumlah.." required="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="tanggal_pengeluaran">Tanggal Pengeluaran
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control" id="tanggal_pengeluaran" name="tanggal_pengeluaran" placeholder="Tanggal pemasukan.." required="">
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-lg-2 col-form-label" for="keterangan">Keterangan <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="5" placeholder="keterangan..." required=""></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        <!-- end modal -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Type Pengeluaran</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pengeluaran</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if($pengeluaran) : ?>
                                        <?php foreach ($pengeluaran as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td><?= number_format($p['jumlah'],2,'.',',') ?></td>
                                                <td><?= date("d/m/Y",strtotime($p['tanggal_pengeluaran'])) ?></td>
                                                <td><?= $p['keterangan'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button"
                                                         
                                                            class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModal"
                                                            data-id="<?= $p['id'] ?>"
                                                            data-type="<?= $p['type'] ?>"
                                                            data-jumlah="<?= $p['jumlah'] ?>"
                                                            data-tanggalpengeluaran="<?= date("Y-m-d",strtotime($p['tanggal_pengeluaran'])) ?>"
                                                            data-keterangan="<?= $p['keterangan'] ?>"
                                                            >
                                                                <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a href="<?= base_url('admin/deletepengeluaran/'.$p['id']) ?>"
                                                            class="btn btn-danger shadow btn-xs sharp"
                                                            onclick="return confirm('Are you sure you want to delete this data?');"
                                                            >
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>