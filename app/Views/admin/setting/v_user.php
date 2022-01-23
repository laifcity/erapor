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

                            <table class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center bg-success">
                                        <th style="width: 150px">foto</th>
                                        <th>Nama User</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th style="width: 150px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($user as $key) : ?>
                                        <tr>
                                            <td class="text-center"><img src="<?= base_url('public/assets/foto/ptk/' . $key['foto_ptk']) ?>" class="img-circle elevation-2 foto" alt="User Image"></td>
                                            <td><?= $key['nama_ptk']; ?></td>
                                            <td class="text-center"><?= $key['username']; ?></td>
                                            <td class="text-center"><?= $key['password']; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $key['id_user'] ?>"><i class="far fa-edit"></i></button>
                                                <a href="user/resetuser/<?= $key['id_user']; ?>" class="btn btn-success btn-sm"><i class="fas fa-sync"></i></a>
                                                <a href="user/delete/<?= $key['id_user']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
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
                    <?= form_open('admin/user/add'); ?>
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="id_ptk" class="col-sm-4 col-form-label">Nama User</label>
                        <div class="col-sm-8">
                            <select name="id_ptk" id="id_ptk" class="form-control">
                                <option selected="selected" value="">-- Pilih User --</option>
                                <?php foreach ($ptk as $key) : ?>
                                    <option value="<?= $key['id_ptk']; ?>"><?= $key['nama_ptk']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="username" class="col-sm-4 col-form-label">Username</label>
                        <div class="col-sm-8">
                            <input name="username" id="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input name="password" id="password" class="form-control" placeholder="Password" required>
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
    <?php foreach ($user as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_user'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $edit ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/user/edit/' . $value['id_user']); ?>
                        <?= csrf_field(); ?>

                        <div class="mb-3 row">
                            <label for="id_ptk" class="col-sm-4 col-form-label">Nama User</label>
                            <div class="col-sm-8">
                                <select name="id_ptk" id="id_ptk" class="form-control">
                                    <option selected="selected" value="<?= $value['id_ptk']; ?>"><?= $value['nama_ptk']; ?></option>
                                    <?php foreach ($ptk as $key) : ?>
                                        <option value="<?= $key['id_ptk']; ?>"><?= $key['nama_ptk']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="username" class="col-sm-4 col-form-label">Username</label>
                            <div class="col-sm-8">
                                <input name="username" class="form-control" value="<?= $value['username']; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input name="password" id="password" class="form-control" placeholder="Password Baru" required>
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