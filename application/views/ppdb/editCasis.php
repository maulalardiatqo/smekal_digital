<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Calon Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <?php foreach ($casis as $s) : ?>
                            <form class="needs-validation" novalidate="" action="<?= base_url('ppdb/updateCasis/' . $s['id']) ?>" method="POST">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="nama_casis">Nama
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="nama_casis" name="nama_casis" value="<?= $s['nama_casis'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="asal_sekolah">Asal Sekolah
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="<?= $s['asal_sekolah'] ?>" required="">
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
                                            <label class="col-lg-4 col-form-label" for="pendamping">Pendamping
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="pendamping" name="pendamping" rows="5" value="<?= $s['pendamping'] ?>" required="" readonly></input>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="kontak">Kontak
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="kontak" value="<?= $s['kontak'] ?>" required="">
                                            </div>
                                        </div>
                                        <div class=" mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="bukti">Bukti Berkas
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="bukti" name="bukti" rows="5" value="<?= $s['bukti'] ?>" required="" readonly></input>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-lg-4 col-form-label" for="status">Status
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="default-select wide form-control" id="status" name="status">
                                                    <option data-display="Select">Please select</option>
                                                    <option value="1" <?= $s['status'] == '1' ? 'selected' : '' ?>>Casis</option>
                                                    <option value="2" <?= $s['status'] == '2' ? 'selected' : '' ?>>DU</option>
                                                    <option value="2" <?= $s['status'] == '3' ? 'selected' : '' ?>>Cancel</option>
                                                    <option value="2" <?= $s['status'] == '4' ? 'selected' : '' ?>>FIX</option>
                                                </select>
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