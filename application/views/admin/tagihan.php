<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-between">
                <button type="button" class="btn light btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                    Add
                </button>
                <!-- <div class='d-flex align-items-center justify-content-evenly'>
                    <select class="form-control" id="filter-pemasukan">
                        <option value="0">Filter Jenis Pemasukan</option>
                        <option value="pemasukan_tetap">Pemasukan Tetap</option>
                        <option value="lainya">Lainya</option>
                    </select>
                    <select class="form-control d-none" id="filter-pemasukan-tetap">
                        <option value="0">Filter Jenis Pemasukan Tetap</option>
                        <option value="all">all</option>
                        <?php foreach ($jenis_pemasukan as $j) : ?>
                            <option value="<?= $j['id'] ?>"><?= $j['desc'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <a href="<?= base_url('admin/pemasukan') ?>" class='btn btn-primary btn-sm d-none' id='btn-filter'>Go</a>
                </div> -->
            </ol>
        </div>
        <!-- modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tagihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" novalidate="" action="<?= base_url('admin/savetagihan') ?>" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="id" name='id'>
                                <div class="col-xl-12">
                                    <!-- <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="type">Jenis Pemasukan
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="type" name="type">
                                        <option value="0">Please select</option>
                                        <?php foreach ($jenis_pemasukan as $j) : ?>
                                            <option value="<?= $j['id'] ?>"><?= $j['desc'] ?></option>
                                        <?php endforeach; ?>
                                        <option value="lainya">Lainya</option>
                                    </select>
                                </div>
                            </div> -->
                                    <!-- <div class="mb-3 row d-none" id='input_id_siswa'>
                                <label class="col-lg-2 col-form-label" for="id_siswa">Siswa
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="form-control" id="id_siswa" name="id_siswa">
                                        <option data-display="Select" value="null">Please select</option>
                                        <?php foreach ($siswa as $s) : ?>
                                            <option value="<?= $s['id'] ?>" data-jumlahtagihan="<?php echo $s['jumlah'] ?>"><?= $s['nama'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="jumlah">Tagihan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ">
                                        <label class="col-lg-2 col-form-label" for="jumlah">Jumlah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="tanggal_pemasukan">Tanggal Input Tagihan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" placeholder="Tanggal pemasukan.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-2 col-form-label" for="tanggal_tenggang">Tanggal Tenggang Tagihan
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <input type="date" class="form-control" id="tanggal_tenggang" name="tanggal_tenggang" placeholder="Tanggal pemasukan.." required="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-lg-2 col-form-label" for="keterangan">Keterangan <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="keterangan..." required=""></textarea>
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
                        <h4 class="card-title">Daftar Tagihan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Input</th>
                                        <th>Tanggal Tenggang</th>
                                        <th>Keterangan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php if ($tagihan) : ?>
                                        <?php foreach ($tagihan as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['title'] ?></td>
                                                <td class="decimal-input"><?= number_format($p['jumlah'], 2, '.', ',')  ?></td>
                                                <td><?= date("d/m/Y", strtotime($p['tanggal_input'])) ?></td>
                                                <td><?= date("d/m/Y", strtotime($p['tanggal_tenggang'])) ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a type="button" class="btn btn-primary shadow btn-xs sharp me-1" href="<?= base_url('admin/tagihandetail/' . $p['id']) ?>">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </a>
                                                        <a href="<?= base_url('admin/deletetagihan/' . $p['id']) ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this data?');">
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