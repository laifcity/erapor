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
                                        <th>Nama PTK</th>
                                        <th>Kelas</th>
                                        <th>Tahun</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($mapelkelas as $key) : ?>
                                        <tr>
                                            <td class="text-center"><?= $i++; ?></td>
                                            <td><?= $key['nama_ptk']; ?></td>
                                            <td class="text-center"><?= $key['kode_kelas']; ?></td>
                                            <td class="text-center"><?= $key['mapel']; ?></td>
                                            <td class="text-center">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $key['id_mapelkelas'] ?>"><i class="far fa-edit"></i></button>
                                                <a href="mapelkelas/delete/<?= $key['id_mapelkelas']; ?>" class="btn btn-danger btn-sm btn-hapus"><i class="fas fa-trash"></i></a>
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
                    <?= form_open('admin/walikelas/add_data'); ?>
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="id_ptk" class="col-sm-4 col-form-label">Nama PTK</label>
                        <div class="col-sm-8">
                            <select name="id_ptk" id="id_ptk" class="form-control">
                                <option selected="selected" value="">-- Pilih PTK --</option>
                                <?php foreach ($ptk as $key) : ?>
                                    <option value="<?= $key['id_ptk']; ?>"><?= $key['nama_ptk']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_kelas" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <select name="id_kelas" id="id_kelas" class="form-control">
                                <option selected="selected" value="">-- Pilih kelas--</option>
                                <?php foreach ($kls as $key) : ?>
                                    <option value="<?= $key['id_kelas']; ?>"><?= $key['kode_kelas']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_mapel" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                        <div class="col-sm-8">
                            <select name="id_mapel" id="id_mapel" class="form-control">
                                <option selected="selected" value="">-- Pilih Mapel--</option>
                                <?php foreach ($mapel as $key) : ?>
                                    <option value="<?= $key['id_mapel']; ?>"><?= $key['mapel']; ?></option>
                                <?php endforeach; ?>
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
    <?php foreach ($mapelkelas as $key => $value) { ?>
        <div class="modal fade" id="edit<?= $value['id_mapelkelas'] ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header card-outline card-success">
                        <h4 class="modal-title"><?= $edit ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= form_open('admin/mapelkelas/edit/' . $value['id_mapelkelas']); ?>
                        <?= csrf_field(); ?>

                        <div class="mb-3 row">
                            <label for="id_ptk" class="col-sm-4 col-form-label">Nama PTK</label>
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
                            <label for="id_kelas" class="col-sm-4 col-form-label">Kelas</label>
                            <div class="col-sm-8">
                                <select name="id_kelas" id="id_kelas" class="form-control">
                                    <option selected="selected" value="<?= $value['id_kelas']; ?>"><?= $value['kode_kelas']; ?></option>
                                    <?php foreach ($kls as $key) : ?>
                                        <option value="<?= $key['id_kelas']; ?>"><?= $key['kode_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_mapel" class="col-sm-4 col-form-label">Mata Pelajarn</label>
                            <div class="col-sm-8">
                                <select name="id_mapel" id="id_mapel" class="form-control">
                                    <option selected="selected" value="<?= $value['id_mapel']; ?>"><?= $value['mapel']; ?></option>
                                    <?php foreach ($mapel as $key) : ?>
                                        <option value="<?= $key['id_mapel']; ?>"><?= $key['mapel']; ?></option>
                                    <?php endforeach; ?>
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