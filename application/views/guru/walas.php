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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Jabatan</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="<?= base_url('guru/naik'); ?>" method="POST">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check custom-checkbox ms-2">
                                                    <input type="checkbox" class="form-check-input" name="checkAll" id="checkAll">
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Nama</th>
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
                                                <td><?= $p['nama'] ?></td>
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
                                <?php

                                if ($tingkat == 'XII') {
                                    echo '
                                    <div class="lulus">
                                    <a href="' .  ' guru/lulus '  . '"> class="btn btn-info">Luluskan Siswa</a>
                                </div>
                                    ';
                                } else {
                                    echo '';
                                }

                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Form Naik Kelas</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-lg-4">
                                            <select class=" default-select wide form-control" id="to" name="to">
                                                <option data-display="Select">Please select</option>
                                                <?php foreach ($naik as $k) : ?>
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
        <!-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-body">
                            <table class="table-responsive">

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    </div>