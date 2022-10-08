<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Upload Promes</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('guru/uploadAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <input type="hidden" value="RPP" id="jenis" name="jenis">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="file">Pilih FIle
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-control" id="file" name="file" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="smester">Semester
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="smester" name="smester">
                                                <option data-display="Select">Please select</option>
                                                <option value="GANJIL">Ganjil</option>
                                                <option value="GENAP">Genap</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="ta">Tahun Ajaran
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="ta" name="ta" placeholder=".../..." required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="mapel">Mata Pelajaran
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="mapel" name="mapel">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($mapel as $m) : ?>
                                                    <option value="<?= $m['id_mapel'] ?>"><?= $m['nama_mapel'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="kelas">Kelas
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="kelas" name="kelas">
                                                <option data-display="Select">Please select</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>\
                                                <option value="XII">XII</option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="keterangan">Keterangan
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" required="">
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
        </div>
        <!-- table -->
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">History Upload</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example5" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Semester</th>
                                    <th>TA</th>
                                    <th>Mapel</th>
                                    <th>Kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php
                                    $no = 1;
                                    foreach ($admin as $m) : ?>
                                        <td><?= $no ?></td>
                                        <td><?= $m['smester'] ?></td>
                                        <td><?= $m['ta'] ?></td>
                                        <td><?= $m['nama_mapel'] ?></td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger me-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end table -->
    </div>
</div>