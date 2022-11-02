<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Guru</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <?php foreach ($guru as $s) : ?>
                            <form class="needs-validation" novalidate="" action="<?= base_url('waka/updateGuru/' . $s['kode']) ?>" method="POST">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kode">Kode
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" readonly class="form-control" id="kode" name="kode" value="<?= $s['kode'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nama">Nama
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $s['nama'] ?>" required="">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="pendidikan_terakhir">Pendidikan
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" value="<?= $s['pendidikan_terakhir'] ?>" required="">
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
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="jabatan">Jabatan <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="jabatan" name="jabatan">
                                                    <option value="0">Please select</option>
                                                    <?php foreach ($jabatan as $j) : ?>
                                                        <option value="<?= $j['id'] ?>" <?= $s['jabatan'] == $j['id'] ? 'selected' : '' ?>><?= $j['desc'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">

                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kontak">Kontak
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kontak" name="kontak" value="<?= $s['kontak'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="tahun_masuk">Tahun Masuk
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" value="<?= $s['tahun_masuk'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="tahun_masuk">Gaji/Jam <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="salary_per_hour" name="salary_per_hour" value="<?= $s['salary_per_hour'] ?>" placeholder="Gaji / Jam.." required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="tahun_masuk">Jumlah Jam Kerja <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="jam_kerja" name="jam_kerja" value="<?= $s['jam_kerja'] ?>" placeholder="Jumlah Jam Kerja.." required="">
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