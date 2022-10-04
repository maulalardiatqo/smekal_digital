<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <div class="d-flex justify-content-between">
                <div class="template">
                    <ol class="breadcrumb">
                        <a href="<?= base_url('assets/template/template_siswa.xlsx') ?>" download="" type="button" class="btn light btn-dark"><i class="fas fa-download"></i> Unduh Template Siswa</a>
                        <button type="button" class="btn light btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-upload"></i> Upload Template Siswa</button>
                    </ol>
                </div>
                <div class="button">
                    <a class="btn btn-info" href="<?= base_url('admin/alumni') ?>">Data Alumni</a>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Siswa</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <form class="needs-validation" novalidate="" action="<?= base_url('admin/tambahSiswa') ?>" method="POST">
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
                            <div class="row page-titles">
                                <div class="d-flex justify-content-between">
                                    <div class="judul">
                                        <h4 class="card-title">Daftar Siswa</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="lulus">
                                <a href="<?= base_url('admin/lulus') ?>" class="btn btn-info">Luluskan Siswa</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="<?= base_url('admin/naik'); ?>" method="POST">
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="form-check custom-checkbox ms-2">
                                                        <input type="checkbox" class="form-check-input" name="checkAll" id="checkAll">
                                                        <label class="form-check-label" for="checkAll"></label>
                                                    </div>
                                                </th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>NISN</th>
                                                <th>Alamat</th>
                                                <th>Gender</th>
                                                <th>Kelas</th>
                                                <th>Kontak</th>
                                                <th>Tahun Masuk</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($siswa as $p) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="form-check custom-checkbox ms-2">
                                                            <input type="checkbox" name="<?= $p['id'] ?>" class="form-check-input" id="check" name="check">
                                                            <label class="form-check-label" for="customCheckBox2"></label>
                                                        </div>
                                                    </td>
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
                                                    <td><?= $p['tingkat'] ?> <?= $p['prodi'] ?> <?= $p['rombel'] ?></td>
                                                    <td><?= $p['kontak'] ?></td>
                                                    <td><?= $p['tahun_masuk'] ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="<?= base_url('admin/editSiswa/') . $p['nis'] ?>" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                            <a href="<?= base_url('admin/hapusSiswa/') . $p['nis'] ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <div class="card">
                                        <div class="card-header">
                                            <h4>Form Naik Kelas</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-lg-4">
                                                <select class=" default-select wide form-control" id="to" name="to">
                                                    <option data-display="Select">Please select</option>
                                                    <?php foreach ($kelas as $k) : ?>
                                                        <option value="<?= $k['id_kelas']; ?>"><?= $k['tingkat'] ?> <?= $k['prodi'] ?> <?= $k['rombel'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="btn">
                                                <button type="submit" name="naik" class="btn btn-success">Naikan Kelas</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pengeluaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" action="<?= base_url('admin/uploadSiswa') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-12">
                            <label class="col-lg-4 col-form-label" for="file">Nama Prodi
                                <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <div class="form-file">
                                    <input type="file" class="form-file-input form-control" id="file" name="file" accept=".xlsx,.xls" required>
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