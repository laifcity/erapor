    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1 class="m-0">Tahun Pelajaran</h1> -->
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/kelas'); ?>"><?= $title ?></a></li>
                        <!-- <li class="breadcrumb-item active"></li> -->
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
                <div class="col-md-8">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $judul ?></h3>
                        </div>
                        <div class="card-body">
                            <?php
                            $errors = session()->getFlashdata('failed');
                            if (!empty($errors)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fas fa-times"></i> Failed</strong> data not added to database.
                                    <ul>
                                        <?php foreach ($errors as $e) { ?>
                                            <li><?= esc($e); ?></li>
                                        <?php } ?>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php
                            if (isset($validation)) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="fas fa-times"></i> Failed</strong> data not added to database.
                                    <ul>
                                        <?= $validation->listErrors() ?>
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?= form_open_multipart(); ?>
                            <?= csrf_field(); ?>

                            <div class="mb-3 row">
                                <label for="nama_kelas" class="col-sm-4 col-form-label">Kelas</label>
                                <div class="col-sm-8">
                                    <select name="nama_kelas" id="nama_kelas" class="form-control">
                                        <option selected="selected" value="">-- Pilih Kelas -- </option>
                                        <option>X</option>
                                        <option>XI</option>
                                        <option>XII</option>
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

                            <a href="<?= base_url('admin/kelas') ?>" type="submit" class="btn btn-info"><i class="fas fa-reply"></i> Back</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Save</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->