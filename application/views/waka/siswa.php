<div class="content-body">
    <div class="container-fluid">

        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('waka/tambahSiswa') ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nama">Nama
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Siswa.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nis">NIS
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS.." required="">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nisn">NISN
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN.." required="">
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
                                        <label class="col-lg-4 col-form-label" for="nama_ibu">Nama Ibu
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Nama Ibu" required="">
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
                                                    <option value="<?= $k['id_kelas']; ?>"><?= $k['tingkat'] ?> <?= $k['prodi'] ?> <?= $k['rombel'] ?></option>
                                                <?php endforeach; ?>
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
                                        <label class="col-lg-4 col-form-label" for="tahun_masuk">Tahun Masuk <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="tahun_masuk" name="tahun_masuk" placeholder="Tahun Masuk..." required="">
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
                            <h4 class="card-title">Daftar Siswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIS</th>
                                            <th>NISN</th>
                                            <th>Alamat</th>
                                            <th>Gender</th>
                                            <th>Kelas</th>
                                            <th>Kontak</th>
                                            <th>Tahun Masuk</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php foreach ($siswa as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['nama'] ?></td>
                                                <td><?= $p['nis'] ?></td>
                                                <td><?= $p['nisn'] ?></td>
                                                <td><?= $p['alamat'] ?></td>
                                                <td><?php if ($p['gender'] == 1) {
                                                        echo 'Laki-Laki';
                                                    } else {
                                                        echo 'Perempuan';
                                                    }

                                                    ?></td>
                                                <td><?= $p['kelas'] ?></td>
                                                <td><?= $p['kontak'] ?></td>
                                                <td><?= $p['tahun_masuk'] ?></td>
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