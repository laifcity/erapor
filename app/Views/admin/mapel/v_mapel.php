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

                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 40px">No</th>
                                        <th>Kode Mapel</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mapel as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $key['k_mapel']; ?></td>
                                            <td><?= $key['mapel']; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $key['id_mapel'] ?>"><i class="far fa-edit"></i></button>
                                                <a href="mapel/delete/<?= $key['id_mapel']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
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
                    <?= form_open('admin/mapel/add'); ?>
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="k_mapel" class="col-sm-4 col-form-label">Kode Mapel</label>
                        <div class="col-sm-8">
                            <input name="k_mapel" class="form-control" value="<?= old('k_mapel'); ?>" placeholder="Kode Mapel" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="mapel" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-8">
                            <input name="mapel" class="form-control" value="<?= old('mapel'); ?>" placeholder="Mata Pelajaran" required>
                        </div>
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
    <?php foreach ($mapel as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_mapel'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $edit ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/mapel/edit/' . $value['id_mapel']); ?>
                        <?= csrf_field(); ?>

                        <div class="mb-3 row">
                            <label for="k_mapel" class="col-sm-4 col-form-label">Kode Mapel</label>
                            <div class="col-sm-8">
                                <input name="k_mapel" class="form-control" value="<?= $value['k_mapel']; ?>" placeholder="Kode Mapel" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="mapel" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-8">
                                <input name="mapel" class="form-control" value="<?= $value['mapel']; ?>" placeholder="Mata Pelajaran" required>
                            </div>
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
    <?php foreach ($mapel as $key => $value) { ?>
        <div class="modal fade" id="delete<?= $value['id_mapel'] ?>">
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
                        <b><?= $value['mapel'] ?> ??</b>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-warning btn-sm " data-dismiss="modal">Close</button>
                        <a href="<?= base_url('admin/mapel/delete/' . $value['id_mapel']); ?>" class="btn btn-primary btn-sm float-right">Delete</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    <?php } ?>