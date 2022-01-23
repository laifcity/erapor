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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/tahun'); ?>"><?= $title ?></a></li>
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
                <div class="col-md-5">
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
                            <div class="form-group">
                                <label for="tahun">Tahun Pelajaran</label>
                                <input type="text" name="tahun" id="tahun" class="form-control" value="<?= old('tahun'); ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Semester</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smt" id="ganjil" value="Ganjil">
                                    <label class="form-check-label" for="ganjil" <?= 'checked'; ?>>
                                        Ganjil
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="smt" id="genap" value="Genap">
                                    <label class="form-check-label" for="genap">
                                        Genap
                                    </label>
                                </div>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary btn-sm float-right">Submit</button>
                            <a href="<?= base_url('/admin/tahun'); ?>" class="btn btn-secondary btn-sm float-right mr-1">Back</a> -->

                            <a href="<?= base_url('admin/tahun') ?>" type="submit" class="btn btn-info"><i class="fas fa-reply"></i> Back</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Save</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->