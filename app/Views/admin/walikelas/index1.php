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
                            <a href="<?= base_url('admin/walikelas/add_data') ?>" class="btn btn-primary btn-sm float-right">
                                <i class="fas fa-plus-square"></i> Data
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover table-sm">
                                <thead>
                                    <tr class="text-center bg-success">
                                        <th style="width: 10px">No</th>
                                        <th style="width: 200px">Tahun Pelajaran</th>
                                        <th>Kelas</th>
                                        <th>Nama PTK</th>
                                        <th style="width: 80px">Action</th>
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
                                                <a href="<?= base_url('admin/walikelas/update_data/' . $key['id_walikelas']); ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                                <a href="<?= base_url('admin/walikelas/delete_data/' . $key['id_walikelas']); ?>" class="btn btn-danger btn-sm "> <i class="fas fa-trash"></i></a>
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
                    <?= form_open('admin/kelas/add'); ?>
                    <?= csrf_field(); ?>

                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-sm-4 col-form-label">Kelas</label>
                        <div class="col-sm-8">
                            <select name="nama_kelas" id="nama_kelas" class="form-control">
                                <option selected="selected" value="">-- Pilih Kelas -- </option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kode_kelas" class="col-sm-4 col-form-label">Kode Kelas</label>
                        <div class="col-sm-8">
                            <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" value="<?= old('kode_kelas'); ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_keahlian" class="col-sm-4 col-form-label">Kompetensi Keahlian</label>
                        <div class="col-sm-8">
                            <select name="id_keahlian" id="id_keahlian" class="form-control">
                                <option selected="selected" value="">-- Pilih Kompetensi Keahlian --</option>
                                <?php foreach ($jurusan as $key) : ?>
                                    <option value="<?= $key['id_keahlian']; ?>"><?= $key['komp_keahlian']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="id_keahlian" class="col-sm-4 col-form-label">Wali Kelas</label>
                        <div class="col-sm-8">
                            <select name="id_keahlian" id="id_keahlian" class="form-control">
                                <option selected="selected" value="">-- Pilih Wali Kelas --</option>
                                <?php foreach ($guru as $key) : ?>
                                    <option value="<?= $key['id_ptk']; ?>"><?= $key['nama_ptk']; ?></option>
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