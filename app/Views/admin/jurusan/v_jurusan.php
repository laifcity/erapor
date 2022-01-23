    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Info boxes -->
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $judul ?></h3>

                            <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool btn-primary" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <?php
                            if (session()->getFlashdata('Sukses')) {
                                echo '<div class="alert alert-success" role="alert">';
                                echo session()->getFlashdata('pesan');
                                echo '</div>';
                            } ?>

                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 10px">Kode Keahlian</th>
                                        <th>Bidang Keahlian</th>
                                        <th>Program Keahlian</th>
                                        <th>Kompetensi Keahlian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($jurusan as $key) : ?>
                                        <tr class="text-center">
                                            <td><?= $key['k_keahlian']; ?></td>
                                            <td><?= $key['bid_keahlian']; ?></td>
                                            <td><?= $key['prog_keahlian']; ?></td>
                                            <td><?= $key['komp_keahlian']; ?></td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $key['id_keahlian'] ?>"><i class="far fa-edit"></i></button>
                                                <a href="jurusan/delete/<?= $key['id_keahlian']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.modal add-->
    <div class="modal fade" id="add">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header card-outline card-success">
                    <h4 class="modal-title"><?= $add ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('admin/jurusan/add'); ?>
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="k_keahlian" class="col-sm-5 col-form-label">Kode Keahlian</label>
                        <input name="k_keahlian" class="form-control" value="<?= old('k_keahlian'); ?>" placeholder="Kode Keahlian" required>
                    </div>

                    <div class="form-group row">
                        <label for="bid_keahlian" class="col-sm-5 col-form-label">Bidang Keahlian</label>
                        <input type="text" name="bid_keahlian" class="form-control" value="<?= old('bid_keahlian'); ?>" placeholder="Bidang Keahlian" required>
                    </div>

                    <div class="form-group row">
                        <label for="prog_keahlian" class="col-sm-5 col-form-label">Program Keahlian</label>
                        <input type="text" name="prog_keahlian" class="form-control" value="<?= old('prog_keahlian'); ?>" placeholder="Program Keahlian" required>
                    </div>

                    <div class="form-group row">
                        <label for="komp_keahlian" class="col-sm-5 col-form-label">Kompetensi Keahlian</label>
                        <input type="text" name="komp_keahlian" class="form-control" value="<?= old('komp_keahlian'); ?>" placeholder="Kompetensi Keahlian" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-warning btn-sm " data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-paper-plane"></i> Save</button>
                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


    <!-- /.modal edit-->
    <?php foreach ($jurusan as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_keahlian'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $edit ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/jurusan/edit/' . $value['id_keahlian']); ?>
                        <?= csrf_field(); ?>

                        <div class="form-group row">
                            <!-- <label for="k_keahlian">Kode Keahlian</label> -->
                            <input name="k_keahlian" class="form-control" value="<?= $value['k_keahlian']; ?>" placeholder="Kode Keahlian" required>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="bid_keahlian">Bidang Keahlian</label> -->
                            <input type="text" name="bid_keahlian" class="form-control" value="<?= $value['bid_keahlian']; ?>" placeholder="Bidang Keahlian" required>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="prog_keahlian">Program Keahlian</label> -->
                            <input type="text" name="prog_keahlian" class="form-control" value="<?= $value['prog_keahlian']; ?>" placeholder="Program Keahlian" required>
                        </div>

                        <div class="form-group row">
                            <!-- <label for="komp_keahlian">Kompetensi Keahlian</label> -->
                            <input type="text" name="komp_keahlian" class="form-control" value="<?= $value['komp_keahlian']; ?>" placeholder="Kompetensi Keahlian" required>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-sm " data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm float-right"><i class="fas fa-paper-plane"></i> Save</button>
                    </div>
                    <?= form_close() ?>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>

    <!-- /.modal Delete-->
    <?php foreach ($jurusan as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_keahlian'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $delete ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        Apakah anda yakin ingin menghapus data <br>
                        <b><?= $value['komp_keahlian'] ?>. ?</b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-sm " data-dismiss="modal">Close</button>
                        <a href="<?= base_url('admin/jurusan/delete/' . $value['id_keahlian']); ?>" class="btn btn-primary btn-sm float-right">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>