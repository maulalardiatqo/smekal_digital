<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <button type="button" class="btn light btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> 
                    Add
                </button>
            </ol>
        </div>
        <!-- modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pemasukan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate="" action="<?= base_url('admin/tambahpemasukan') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id">
                        <div class="col-xl-12">
                        <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="type">Jenis Pemasukan
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="default-select wide form-control" id="type" name="type">
                                        <!-- <option value="0">Please select</option> -->
                                        <?php foreach($jenis_pemasukan as $j) : ?>
                                            <option value="<?= $j['id']?>"><?= $j['desc']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row d-none" id='input_id_siswa'>
                                <label class="col-lg-2 col-form-label" for="id_siswa">Siswa
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="default-select wide form-control" id="id_siswa" name="id_siswa">
                                        <option data-display="Select" value="null">Please select</option>
                                        <?php foreach($siswa as $s) : ?>
                                            <option value="<?= $s['id']?>"><?= $s['nama']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="gender">Guru
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <select class="default-select wide form-control" id="id_guru" name="id_guru">
                                        <option data-display="Select">Please select</option>
                                        <?php foreach($guru as $s) : ?>
                                            <option value="<?= $s['id']?>"><?= $s['nama']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="jumlah">Amount
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah.." required="">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="nis">Tanggal Pemasukan
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input type="date" class="form-control" id="tanggal_pemasukan" name="tanggal_pemasukan" placeholder="Tanggal pemasukan.." required="">
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
                                            <th>Type Pemasukan</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Pemasukan</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if($pemasukan) : ?>
                                        <?php foreach ($pemasukan as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td><?= $p['jumlah'] ?></td>
                                                <td><?= $p['tanggal_pemasukan'] ?></td>
                                                <td><?= $p['keterangan'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button"
                                                            id="btn-edit" 
                                                            class="btn btn-primary shadow btn-xs sharp me-1" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModal"
                                                            data-id="<?= $p['id'] ?>"
                                                            data-type="<?= $p['type'] ?>"
                                                            data-jumlah="<?= $p['jumlah'] ?>"
                                                            data-tanggal_pemasukan="<?= $p['tanggal_pemasukan'] ?>"
                                                            data-keterangan="<?= $p['keterangan'] ?>"
                                                            >
                                                                <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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