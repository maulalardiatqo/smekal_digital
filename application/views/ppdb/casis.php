<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Calon Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('ppdb/tambahCasis') ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nama_casis">Nama
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_casis" name="nama_casis" placeholder="Nama Siswa.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="asal_sekolah">Asal Sekolah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Asal Sekolah.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="alamat">Alamat <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="alamat..." required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="gender">Gender
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="gender" name="gender">
                                                <option data-display="Select">Please select</option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
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
                                            <select class="default-select wide form-control" id="pendamping" name="pendamping">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($guru as $k) : ?>
                                                    <option value="<?= $k['nama']; ?>"> <?= $k['nama'] ?></option>
                                                <?php endforeach; ?>
                                                <option data-display="Select">Daftar Sendiri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="kontak">Kontak
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="kontak" name="kontak" placeholder="kontak" required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="bukti">Bukti Berkas
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="bukti" name="bukti">
                                                <option data-display="Select">Please select</option>
                                                <option value="Ijazah">Ijazah</option>
                                                <option value="Akta Lahis">Akta Lahir</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="status">Status
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <select class="default-select wide form-control" id="status" name="status">
                                                <option data-display="Select">Please select</option>
                                                <option value="1">Casis</option>
                                                <option value="2">DU</option>
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Calon Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Asal Sekolah</th>
                                            <th>Alamat</th>
                                            <th>Gender</th>
                                            <th>Pendamping</th>
                                            <th>Kontak</th>
                                            <th>Berkas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($casis as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['nama_casis'] ?></td>
                                                <td><?= $p['asal_sekolah'] ?></td>
                                                <td><?= $p['alamat'] ?></td>
                                                <td><?php if ($p['gender'] == 1) {
                                                        echo 'Laki-Laki';
                                                    } else {
                                                        echo 'Perempuan';
                                                    }

                                                    ?></td>
                                                <td><?= $p['pendamping'] ?></td>
                                                <td><?= $p['kontak'] ?></td>
                                                <td><?= $p['bukti'] ?></td>
                                                <td><?php if ($p['status'] == 1) {
                                                        echo 'Casis';
                                                    } elseif ($p['status'] == 2) {
                                                        echo 'DU';
                                                    } else {
                                                        echo 'Cancel';
                                                    }

                                                    ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="<?= base_url('ppdb/editCasis/') . $p['id'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                        <a href="<?= base_url('ppdb/hapusCasis/') . $p['id'] ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
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
</div>