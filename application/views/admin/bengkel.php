<div class="content-body">
    <div class="container-fluid">
        <!-- row -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Inventaris Bengkel</h4>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        <?php $hal = 'bengkel' ?>
                        <form class="needs-validation" novalidate="" action="<?= base_url('admin/tambahInventaris/' . $hal) ?>" method="POST">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="nama_barang">Nama Barang
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="spek">Spek / Merk
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi Barang.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="kondisi">Kondisi
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="kondisi" name="kondisi" placeholder="Kondisi Barang.." required="">
                                        </div>
                                    </div>


                                </div>
                                <div class="col-xl-6">
                                    <input type="hidden" value="3" name="kode" id="kode">

                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="jumlah">Jumlah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah Barang.." required="">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-lg-4 col-form-label" for="tempat">Lokasi Barang
                                            <span class="text-danger">*</span>
                                        </label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="tempat" name="tempat" placeholder="Lokasi Barang.." required="">
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftar Inventaris Bengkel</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Spek / Merk</th>
                                        <th>Kondisi</th>
                                        <th>Jumlah</th>
                                        <th>Lokasi Barang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($inventaris as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['nama_barang'] ?></td>
                                            <td><?= $p['spek'] ?></td>
                                            <td><?= $p['kondisi'] ?></td>
                                            <td><?= $p['jumlah'] ?></td>
                                            <td><?= $p['tempat'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="#" class="btn btn-primary shadow btn-xs sharp me-1"><i class="fas fa-pencil-alt"></i></a>
                                                    <a href="<?= base_url('admin/hapusInventaris/' . $p['id_inventaris'] . '/' . $hal) ?>" class="btn btn-danger shadow btn-xs sharp tombol-hapus"><i class="fa fa-trash"></i></a>
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