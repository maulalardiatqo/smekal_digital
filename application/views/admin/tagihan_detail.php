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
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" id="myForm" novalidate="" action="<?= base_url('admin/savetagihandetail') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id_tagihan" name='id_tagihan' value="<?= $tagihan['id'] ?>">
                        <?php foreach ($siswa as $key => $s) : ?>
                            <div class="form-check">
                                <input class="form-check-input checkbox-kelas" type="checkbox" value="" id="flexCheckDefault" data-index="<?= $key ?>">
                                <label class="form-check-label h5" for="flexCheckDefault">
                                    <?= $s['kelas'] ?>
                                </label>
                            </div>
                            <hr>
                            <?php foreach ($s['detail'] as $d) : ?>
                                <?php $checked =false ;?>
                                <?php foreach ($tagihan_detail as $p) : ?>
                                    <?php if($d['id'] == $p['to']){
                                        $checked =true;
                                    }?>
                                <?php endforeach ?>
                                <div class="form-check">
                                    <input class="form-check-input checkbox-<?= $key ?>" type="checkbox"  value="" id="<?= $d['id'] ?>" name="<?= $d['id'] ?>" <?= $checked ? "checked" : "" ?>>
                                    <label class="form-check-label" for="<?= $d['id'] ?>">
                                        <?= $d['nama'] ?>
                                    </label>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                        <?php endforeach; ?>
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
        <!-- Modal Bayar -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tagihan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="needs-validation" novalidate="" action="<?= base_url('admin/bayartagihan') ?>" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" id="id" name='id'>
                        <input type="hidden" id="id_tagihan" name='id_tagihan' value="<?= $tagihan['id'] ?>">
                        <div class="mb-3 row ">
                            <label class="col-lg-2 col-form-label" for="jumlah">Jumlah Tagihan
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control decimal-input" id="jumlah" name="jumlah" value="<?= $tagihan['jumlah'] ?>" placeholder="Jumlah.." required="">
                            </div>
                        </div>
                        <div class="mb-3 row ">
                            <label class="col-lg-2 col-form-label" for="jumlah">Jumlah Sudah dibayar
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control decimal-input" id="sudahdibayar" name="sudahdibayar" placeholder="sudahDiBayar.." required="">
                            </div>
                        </div>
                        <div class="mb-3 row ">
                            <label class="col-lg-2 col-form-label" for="jumlah">Jumlah Bayar Tagihan
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control decimal-input" id="bayar" name="bayar" placeholder="Bayar.." required="">
                            </div>
                        </div>

                        <div class="mb-3 row d-none" id="container-kurang">
                            <label class="col-lg-2 col-form-label" for="jumlah">Kurang
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control decimal-input" id="kurang" name="kurang" placeholder="kurang.." required="" readonly>
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
        <!-- end modal Bayar -->
        <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Penerima Tagihan</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display" style="min-width: 845px">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Kurang</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php if($tagihan_detail) : ?>
                                        <?php foreach ($tagihan_detail as $p) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $p['to'] ?></td>
                                                <td class="decimal-input"><?= number_format($p['bayar'],2,'.',',')  ?></td>
                                                <td><?= date("d/m/Y",strtotime($p['tanggal_bayar'])) ?></td>
                                                <td class="decimal-input"><?= number_format(($tagihan['jumlah'] - $p['bayar']),2,'.',',')  ?></td>
                                                <td><?= $p['status'] ? "Lunas" : 'Belum Lunas'; ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <button type="button"
                                                            class="btn btn-primary shadow btn-xs btn-bayar" 
                                                            data-bs-toggle="modal" 
                                                            data-bs-target="#exampleModal1"
                                                            data-id = "<?php echo $p['id'] ?>"
                                                            data-sudahdibayar = "<?php echo $p['bayar'] ?  $p['bayar'] : 0  ?>"
                                                            >
                                                                <!-- <i class="fas fa-pencil-alt"> </i> -->
                                                                Bayar
                                                        </button>
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