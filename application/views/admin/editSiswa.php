<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <?php foreach ($siswa as $s) : ?>
                            <form class="needs-validation" novalidate="" action="<?= base_url('admin/updateSiswa/' . $s['nis']) ?>" method="POST">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nama">Nama
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $s['nama'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nis">NIS
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nis" name="nis" value="<?= $s['nis'] ?>" required="" readonly>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nisn">NISN
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nisn" name="nisn" value="<?= $s['nisn'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="alamat">Alamat <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="alamat" name="alamat" rows="5" value="<?= $s['alamat'] ?>" required=""></input>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="gender">Gender
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" id="gender" name="gender" value="<?= $s['gender'] ?>">
                                                    <option data-display="Select">Please select</option>
                                                    <option value="1" <?= $s['gender'] == '1' ? 'selected' : '' ?>>Laki - Laki</option>
                                                    <option value="2" <?= $s['gender'] == '2' ? 'selected' : '' ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nama_ibu">Nama Ibu
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" value="<?= $s['nama_ibu'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kelas">Kelas
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" id="kelas" name="kelas">
                                                    <option data-display="Select">Please select</option>
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <option value="<?= $k['id']; ?>"><?= $k['tingkat'] ?> <?= $k['prodi'] ?> <?= $k['rombel'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kontak">Kontak
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $s['kontak'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="tahun_masuk">Tahun Masuk <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?= $s['tahun_masuk'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-lg-8 ms-auto">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>