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
                                    <tr class="text-center bg-success">
                                        <th style="width: 40px">No</th>
                                        <th style="width: 150px">Tahun Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Nama PTK</th>
                                        <th style="width: 90px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($walikelas as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $key['tahun']; ?></td>
                                            <td class="text-center"><?= $key['kode_kelas']; ?></td>
                                            <td><?= $key['nama_ptk']; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $key['id_walikelas'] ?>"><i class="far fa-edit"></i></button>
                                                <a href="walikelas/delete/<?= $key['id_walikelas']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
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
                    <?= form_open('admin/walikelas/add'); ?>
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="id_ptk" class="col-sm-4 col-form-label">Nama PTK</label>
                        <div class="col-sm-8">
                            <select name="id_ptk" id="id_ptk" class="form-control">
                                <option selected="selected" value="">-- Pilih PTK --</option>
                                <?php foreach ($guru as $key) : ?>
                                    <option value="<?= $key['id_ptk']; ?>"><?= $key['nama_ptk']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_rombel" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <select name="id_rombel" id="id_rombel" class="form-control">
                                <option selected="selected" value="">-- Pilih kelas--</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_tahun" class="col-sm-4 col-form-label">Tahun</label>
                        <div class="col-sm-8">
                            <select name="id_tahun" id="id_tahun" class="form-control">
                                <option selected="selected" value="">-- Pilih Tahun--</option>

                            </select>
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
    <?php foreach ($walikelas as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_walikelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $edit ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/walikelas/edit/' . $value['id_walikelas']); ?>
                        <?= csrf_field(); ?>

                        <div class="mb-3 row">
                            <label for="id_ptk" class="col-sm-4 col-form-label">Nama PTK</label>
                            <div class="col-sm-8">
                                <select name="id_ptk" id="id_ptk" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_tahun" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <select name="id_rombel" id="id_rombel" class="form-control">

                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_tahun" class="col-sm-4 col-form-label">Tahun Pelajaran</label>
                            <div class="col-sm-8">
                                <select name="id_tahun" id="id_tahun" class="form-control">

                                </select>
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