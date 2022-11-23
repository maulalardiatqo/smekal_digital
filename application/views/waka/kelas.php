<div class="content-body">
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Kelas</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('admin/tambahKelas') ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="tingkat">Tingkat
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="tingkat" name="tingkat">
                                                <option data-display="Select">Please select</option>
                                                <option value="X">X</option>
                                                <option value="XI">XI</option>
                                                <option value="XII">XII</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="prodi">Prodi
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="prodi" name="prodi">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($prodi as $p) : ?>
                                                    <option value="<?= $p['nama_prodi'] ?>"><?= $p['nama_prodi'] ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="rombel">Rombel
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="rombel" name="rombel">
                                                <option data-display="Select">Please select</option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="C">C</option>
                                                <option value="D">D</option>
                                                <option value="E">E</option>
                                                <option value="F">F</option>
                                                <option value="G">G</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-6">

                                    <div class="mb-3 row">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="walas">Wali Kelas
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" id="walas" name="walas">
                                                    <option data-display="Select">Please select</option>
                                                    <?php foreach ($guru as $g) : ?>
                                                        <option value="<?= $g['id'] ?>"><?= $g['nama'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>

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
        <!-- table start -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Kelas</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Prodi</th>
                                        <th>Rombel</th>
                                        <th>Wali Kelas</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($kelas as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['tingkat'] ?></td>
                                            <td><?= $p['prodi'] ?></td>
                                            <td><?= $p['rombel'] ?></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="<?= base_url('waka/editKelas/' . $p['id_kelas']) ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('waka/hapusKelas/' . $p['id_kelas']) ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash "></i></a>
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
        <!-- table end -->
    </div>
</div>