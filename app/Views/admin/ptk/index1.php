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
    <div class="container-fluid">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success'); ?>
            </div>
        <?php endif; ?>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <!-- Info boxes -->
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <!-- <h3 class="card-title"><?= $judul ?></h3> -->
                            <div class="swal" data-swal="<?= session()->get('message'); ?>"></div>
                            <a href="<?= base_url('./admin/ptk1/add_data') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-square"></i> Data PTK
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <!-- <th style="width: 10px">No</th> -->
                                        <th>Foto PTK</th>
                                        <th style="width: 90px">NIY</th>
                                        <th style="width: 90px">NUPTK</th>
                                        <th>Nama PTK</th>
                                        <th>E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($ptk as $key) : ?>
                                        <tr>
                                            <!-- <td><?= $i++; ?></td> -->
                                            <td class="text-center"><a href="<?= base_url('admin/ptk1/view/' . $key['id_ptk']); ?>"><img src="<?= base_url('public/assets/foto/ptk/' . $key['foto_ptk']) ?>" class="img-circle elevation-2" alt="User Image" width="50px"></a></td>
                                            <td class="text-center"><?= $key['niy']; ?></td>
                                            <td class="text-center"><?= $key['nuptk']; ?></td>
                                            <td><?= $key['nama_ptk']; ?></td>
                                            <td><?= $key['email']; ?></td>
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