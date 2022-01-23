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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/ptk'); ?>"><?= $title ?></a></li>
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
                <div class="col-md-9">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title"><?= $judul ?></h3>
                        </div>
                        <div class="card-body">

                            <?= form_open_multipart(); ?>
                            <?= csrf_field(); ?>

                            <div class="mb-3 row">
                                <label for="niy" class="col-sm-3 col-form-label">NIY</label>
                                <div class="col-sm-9">
                                    <input type="text" name="niy" id="niy" class="form-control <?= ($validation->hasError('niy')) ? 'is-invalid' : ''; ?>" value="<?= old('niy'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('niy'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="niy" class="col-sm-3 col-form-label">NUPTK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nuptk" id="nuptk" class="form-control <?= ($validation->hasError('nuptk')) ? 'is-invalid' : ''; ?>" value="<?= old('nuptk'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nuptk'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_ptk" class="col-sm-3 col-form-label">Nama PTK</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_ptk" id="nama_ptk" class="form-control <?= ($validation->hasError('nama_ptk')) ? 'is-invalid' : ''; ?>" value="<?= old('nama_ptk'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('nama_ptk'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Jenis kelamin</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="l" value="L">
                                                <label class="form-check-label" for="l" <?= 'checked'; ?>>
                                                    Laki-laki
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jk" id="p" value="P">
                                                <label class="form-check-label" for="p" <?= 'checked'; ?>>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="t_lahir" id="t_lahir" class="form-control <?= ($validation->hasError('t_lahir')) ? 'is-invalid' : ''; ?>" value="<?= old('t_lahir'); ?>">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('t_lahir'); ?>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" value="<?= old('tgl_lahir'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" name="alamat" id="alamat" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" value="<?= old('alamat'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('alamat'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                                <div class="col-sm-9">
                                    <input type="text" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= old('email'); ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('email'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <img src="<?= base_url('public/assets/foto/ptk/avatar.png'); ?>" width="150px">
                                    </div>

                                </div>
                                <div class="col-sm-9">
                                    <label for="foto_ptk" class="col-sm-3 col-form-label">Foto PTK</label>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="foto_ptk" id="preview_gambar" value="<?= old('foto_ptk'); ?>">
                                        <label class="custom-file-label" for="foto_ptk">Choose file</label>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <a href="<?= base_url('admin/ptk1') ?>" type="submit" class="btn btn-info"><i class="fas fa-reply"></i> Back</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Save</button>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->