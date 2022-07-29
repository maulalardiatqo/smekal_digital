<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb d-flex justify-content-between">
                <button type="button" class="btn light btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fas fa-plus"></i> 
                    Add
                </button>
            </ol>
        </div>
        <!-- modal -->
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Jabatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate="" action="<?= base_url('admin/savemasterjabatan') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name='id'>
                        <div class="col-xl-12">
                            <div class="mb-3 row">
                                <label class="col-lg-2 col-form-label" for="jumlah">Jabatan
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-10">
                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="Jabatan.." required="">
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
        <!-- end modal -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Jabatan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if($jabatan) : ?>
                                        <?php foreach ($jabatan as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['desc'] ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button"
                                                            class="btn btn-primary shadow btn-xs sharp me-1 btn-edit" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModal"
                                                            data-id="<?= $p['id'] ?>"
                                                            data-desc="<?= $p['desc'] ?>"
                                                            >
                                                                <i class="fas fa-pencil-alt"></i>
                                                        </button>
                                                        <a href="<?= base_url('admin/deletemasterjabatan/'.$p['id']) ?>"
                                                            class="btn btn-danger shadow btn-xs sharp"
                                                            onclick="return confirm('Are you sure you want to delete this data?');"
                                                            >
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
            </div>
        </div>
</div>