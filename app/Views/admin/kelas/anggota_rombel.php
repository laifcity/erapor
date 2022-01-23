    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?> : <?= $kelas['kode_kelas'] ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $judul ?></li>
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
                            <table class="table table-borderless">
                                <tr>
                                    <th withd="10px">Nama Kelas</th>
                                    <th withd="30px">:</th>
                                    <td><?= $kelas['kode_kelas'] ?></td>
                                    <th withd="100px">Tahun Masuk</th>
                                    <th withd="30px">:</th>
                                    <td><?= $kelas['tahun_angkatan'] ?></td>
                                </tr>
                                <tr>
                                    <th withd="10px">Kompetensi Keahlian</th>
                                    <th withd="30px">:</th>
                                    <td><?= $kelas['komp_keahlian'] ?></td>
                                    <th withd="10px">Jumlah</th>
                                    <th withd="30px">:</th>
                                    <td><?= $jml_siswa ?></td>
                                </tr>
                            </table>

                            <table class="table table-bordered ">
                                <thead>
                                    <tr class="text-center bg-success">
                                        <th style="width: 30px">No</th>
                                        <th style="width: 300px">NIS/NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($siswa as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $key['nis']; ?>/<?= $key['nisn']; ?></td>
                                            <td><?= $key['nama_siswa']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/kelas/delete_anggota_rombel/' . $key['id_siswa'] . '/' . $kelas['id_kelas']); ?>" class="btn btn-danger btn-sm btn-remove">
                                                    <i class=" fas fa-trash"></i>
                                                </a>

                                                </button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header card-outline card-success">
                    <h4 class="modal-title"><?= $add ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('admin/kelas/add'); ?>
                    <?= csrf_field(); ?>

                    <table id="example1" class="table table-bordered table-hover table-sm">
                        <thead>
                            <tr class="text-center bg-success">
                                <th style="width: 30px">No</th>
                                <th style="width: 70px">NIS</th>
                                <th style="width: 100px">NISN</th>
                                <th>Nama Siswa</th>
                                <th style="width: 40px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($siswa_tpk as $key) : ?>
                                <?php if ($kelas['id_keahlian'] == $key['id_keahlian']) { ?>

                                    <tr>
                                        <td class="text-center"><?= $i++; ?></td>
                                        <td class="text-center"><?= $key['nis']; ?></td>
                                        <td class="text-center"><?= $key['nisn']; ?></td>
                                        <td><?= $key['nama_siswa']; ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('admin/kelas/add_anggota_rombel/' . $key['id_siswa'] . '/' . $kelas['id_kelas']); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>

                        </tbody>

                </div>
                <?= form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>