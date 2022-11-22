<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Input Administrasi</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('guru/tambahAdmin') ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Jenis Administrasi
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="jenis" name="jenis">
                                                <option data-display="Select">Please select</option>
                                                <option value="1">RPP</option>
                                                <option value="2">SILABUS</option>
                                                <option value="3">PROTA</option>
                                                <option value="4">PROMES</option>
                                                <option value="5">RAPORT</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Mapel
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="mapel" name="mapel">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($mapel as $m) : ?>
                                                    <option value="<?= $m['id_mapel']; ?>"><?= $m['nama_mapel'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Kelas
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="kelas" name="kelas">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($kelas as $k) : ?>
                                                    <option value="<?= $k['id_kelas']; ?>"><?= $k['tingkat'] ?> <?= $k['prodi'] ?> <?= $k['rombel'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nis">Taun Ajaran
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" placeholder="ex. 20xx/20xx" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nis">Upload FIle
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="file" class="form-file-input form-control" id="file" name="file" accept=".xlsx,.xls,.doc,.pdf" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 ms-auto">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Administrasi</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Mapel</th>
                                        <th>Kelas</th>
                                        <th>Tahun Ajaran</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($admin as $p) : ?>

                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['jenis'] ?></td>
                                            <td><?= $p['nama_mapel'] ?></td>
                                            <td><?= $p['tingkat'] . ' ' . $p['prodi'] . ' ' . $p['rombel'] ?></td>
                                            <td><?= $p['tahun_ajaran'] ?></td>
                                            <td><a href="../uploads/administrasi/<?= $p['file'] ?>.xlsx"> <?= $p['file'] ?></a></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= base_url('admin/editAdmin/') . $p['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('admin/hapusAdmin/') . $p['id'] ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
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