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
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title"><?= $judul ?></h3>
                            <a href="<?= base_url('admin/tahun/add_data') ?>" class="btn btn-primary btn-sm float-right">
                                <i class="fas fa-plus-square"></i> Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- <table id="example1" class="table table-bordered table-hover table-sm"> -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 10px">No</th>
                                        <th>Tahun Pelajaran</th>
                                        <th>Semester</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($tahun as $T) : ?>
                                        <tr class="text-center">
                                            <td><?= $i++; ?></td>
                                            <td><?= $T['tahun']; ?></td>
                                            <td><?= $T['smt']; ?></td>
                                            <td>
                                                <a href="<?= base_url('admin/tahun/update_data/' . $T['id_tahun']); ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></i></a>
                                                <a href="<?= base_url('admin/tahun/delete_data/' . $T['id_tahun']); ?>" class="btn btn-danger btn-sm "> <i class="fas fa-trash"></i></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div><!-- /.cad body-->
                    </div><!-- /.cad -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->