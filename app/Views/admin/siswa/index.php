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
                            <a href="<?= base_url('./admin/siswa1/add') ?>" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-square"></i> Data Siswa
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center bg-success">
                                        <!-- <th style="width: 10px">No</th> -->
                                        <th>Foto Siswa</th>
                                        <th style="width: 90px">NIS</th>
                                        <th style="width: 150px">NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Juruasan</th>
                                        <th>Kelas</th>
                                        <th>Tahun Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $key) : ?>
                                        <tr>
                                            <!-- <td><?= $i++; ?></td> -->
                                            <td class="text-center"><a href="<?= base_url('admin/siswa/view/' . $key['id_siswa']); ?>"><img src="<?= base_url('public/assets/foto/siswa/' . $key['foto_siswa']) ?>" class="img-circle elevation-2" alt="User Image" width="50px"></a></td>
                                            <td class="text-center"><?= $key['nis']; ?></td>
                                            <td class="text-center"><?= $key['nisn']; ?></td>
                                            <td><?= $key['nama_siswa']; ?></td>
                                            <td><?= $key['komp_keahlian']; ?></td>
                                            <td class="text-center"><?= $key['kode_kelas']; ?></td>
                                            <td class="text-center"><?= $key['tahun_angkatan']; ?></td>
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