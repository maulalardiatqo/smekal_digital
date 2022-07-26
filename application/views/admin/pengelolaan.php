<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Jenis Keuangan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="needs-validation" novalidate="" action="<?= base_url('admin/savejeniskeuangan') ?>" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" id="id" name='id'>
                                <input type="hidden" id="type" name='type'>
                                <div class="">
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Jenis Keuangan.." required="">
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
        <!-- end modal -->
        <!-- row -->
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jenis Pemasukan</h4>
                        <button type="button" class="btn light btn-dark btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal" data-type='jenispemasukan'>
                            <i class="fas fa-plus"></i>
                            Add
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example4" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php if ($jenispemasukan) : ?>
                                        <?php foreach ($jenispemasukan as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button" class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $p['id'] ?>" data-type="jenispemasukan" data-desc="<?= $p['desc'] ?>">
                                                            <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a href="<?= base_url('admin/deletejeniskeuangan/jenispemasukan/' . $p['id']) ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this data?');">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Jenis Pengeluaran</h4>
                        <button type="button" class="btn light btn-dark btn-add" data-bs-toggle="modal" data-bs-target="#exampleModal" data-type='jenispengeluaran'>
                            <i class="fas fa-plus"></i>
                            Add
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php if ($jenispengeluaran) : ?>
                                        <?php foreach ($jenispengeluaran as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td>
                                                    <?php if ($p['id'] != 1) : ?>
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="<?= $p['id'] ?>" data-type="jenispengeluaran" data-desc="<?= $p['desc'] ?>">
                                                                <i class="fas fa-pencil-alt"></i>
                                                            </button>
                                                            <a href="<?= base_url('admin/deletejeniskeuangan/jenispengeluaran/' . $p['id']) ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this data?');">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kelola SPP</h4>
                        <button type="button" class="btn light btn-dark btn-add" data-bs-toggle="modal" data-bs-target="#spp" data-type='jenispengeluaran'>
                            <i class="fas fa-plus"></i>
                            Add
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Tagihan SPP</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($spp as $p) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $p['tahun_masuk'] ?></td>
                                            <td><?= $p['jumlah'] ?></td>
                                            <td>
                                                <div class="d-flex">
                                                    <button type="button" class="btn btn-primary shadow btn-xs sharp me-1 btn-edit-spp" data-bs-toggle="modal" data-bs-target="#spp" data-id="<?= $p['id'] ?>" data-tahunmasuk="<?= $p['tahun_masuk'] ?>" data-jumlah="<?= $p['jumlah'] ?>">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </button>
                                                    <a href="<?= base_url('admin/deletejeniskeuangan/jenispengeluaran/' . $p['id']) ?>" class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Are you sure you want to delete this data?');">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
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
        <!-- end row -->
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="spp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kelola SPP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate="" action="<?= base_url('admin/saveSPP') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id_spp" name='id'>
                        <div class="">
                            <label for="tahun_masuk">Tahun Ajaran</label>
                            <input type="text" class="form-control" id="tahun_masuk" name='tahun_masuk' value="<?= date('Y') ?>">
                            <label for="jumlah">Tagihan SPP</label>
                            <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Tagihan..." required="">
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
<!-- end modal -->