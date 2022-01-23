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
                            <a href="<?= base_url('admin/mapel/add_data') ?>" class="btn btn-primary btn-sm float-right">
                                <i class="fas fa-plus-square"></i> Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 10px">No</th>
                                        <th style="width: 100px">Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Mapel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $db = \Config\Database::connect();
                                    $i = 1; ?>
                                    <?php foreach ($kelas as $key) :
                                        $jml = $db->table('mapel')
                                            ->where('id_keahlian', $key['id_keahlian'])
                                            ->countAllResults();
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td class="text-center"><?= $key['kode_kelas']; ?></td>
                                            <td><?= $key['komp_keahlian']; ?></td>
                                            <td>
                                                <span class="badge badge-success right"><?= $jml ?></span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success btn-sm "> <i class="fas fa-plus"></i></a>
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