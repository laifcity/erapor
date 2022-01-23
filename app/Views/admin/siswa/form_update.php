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
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/public/assets/foto/siswa/<?= old('foto_siswa', $dataById['foto_siswa']); ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= old('nama_siswa', $dataById['nama_siswa']); ?></h3>

                            <p class="text-muted text-center"><?= old('nisn', $dataById['nisn']); ?></p>

                            <!-- <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul> -->

                            <!-- <a href="<?= base_url('admin/siswa') ?>" type="submit" class="btn btn-info btn-sm"><i class="fas fa-reply"></i> Back</a> -->
                        </div>
                        <!-- /.card-body -->
                        <li class="list-group-item">
                            <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-info float-right btn-sm"><i class="fas fa-reply"></i> Back</a>
                        </li>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Diri</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Orang Tua</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Wali</a></li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <?= form_open_multipart(); ?>
                                    <?= csrf_field(); ?>
                                    <div class="mb-3 row">
                                        <label for="nis" class="col-sm-3 col-form-label">NIS</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nis" id="nis" class="form-control" value="<?= old('nis', $dataById['nis']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nisn" class="col-sm-3 col-form-label">NISN</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nisn" id="nisn" class="form-control" value="<?= old('nisn', $dataById['nisn']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nama_siswa" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" value="<?= old('nama_siswa', $dataById['nama_siswa']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="" class="col-sm-3 col-form-label">Jenis kelamin</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <?php if ($dataById['jk'] == 'L') : ?>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jk" id="l" value="L" <?= 'checked' ?>>
                                                            <label class="form-check-label" for="l">
                                                                Laki-laki
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jk" id="p" value="P">
                                                            <label class="form-check-label" for="p">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php elseif ($dataById['jk'] == 'P') : ?>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jk" id="l" value="L">
                                                            <label class="form-check-label" for="l">
                                                                Laki-laki
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="jk" id="p" value="P" <?= 'checked' ?>>
                                                            <label class="form-check-label" for="p">
                                                                Perempuan
                                                            </label>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="t_lahir" class="col-sm-3 col-form-label">Tempat Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" name="t_lahir" id="nama_siswa" class="form-control" value="<?= old('t_lahir', $dataById['t_lahir']); ?>">
                                                </div>
                                                <div class="col">
                                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= old('tgl_lahir', $dataById['tgl_lahir']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alm_siswa" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="alm_siswa" id="alm_siswa" class="form-control" value="<?= old('alm_siswa', $dataById['alm_siswa']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="agama" id="agama" class="form-control" value="<?= old('agama', $dataById['agama']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="st_keluarga" class="col-sm-3 col-form-label">Status Keluarga</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="st_keluarga" id="st_keluarga" class="form-control" value="<?= old('st_keluarga', $dataById['st_keluarga']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="anak_ke" class="col-sm-3 col-form-label">Anak Ke</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="anak_ke" id="anak_ke" class="form-control" value="<?= old('anak_ke', $dataById['anak_ke']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="foto_siswa" class="col-sm-3 col-form-label">Foto Siswa</label>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="foto_siswa" id="foto_siswa" value="<?= old('foto_siswa', $dataById['foto_siswa']); ?>">
                                                <label class="custom-file-label" for="foto_siswa">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <?= form_open_multipart(); ?>
                                    <div class="form-horizontale">

                                        <div class="mb-3 row">
                                            <label for="nm_ayah" class="col-sm-3 col-form-label">Nama Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nm_ayah" id="nm_ayah" class="form-control" value="<?= old('nm_ayah', $dataById['nm_ayah']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="nm_ibu" class="col-sm-3 col-form-label">Nama Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nm_ibu" id="nm_ibu" class="form-control" value="<?= old('nm_ibu', $dataById['nm_ibu']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="alm_ortu" class="col-sm-3 col-form-label">Alamat Oramg Tua</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alm_ortu" id="alm_ortu" class="form-control" value="<?= old('alm_ortu', $dataById['alm_ortu']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="tlp_ortu" class="col-sm-3 col-form-label">Telp / HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="tlp_ortu" id="tlp_ortu" class="form-control" value="<?= old('tlp_ortu', $dataById['tlp_ortu']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="pek_ayah" class="col-sm-3 col-form-label">Pekerjaan Ayah</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pek_ayah" id="pek_ayah" class="form-control" value="<?= old('pek_ayah', $dataById['pek_ayah']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="pek_ibu" class="col-sm-3 col-form-label">Pekerjaan Ibu</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pek_ibu" id="pek_ibu" class="form-control" value="<?= old('pek_ibu', $dataById['pek_ibu']); ?>">
                                            </div>
                                        </div>


                                    </div>
                                    <?= form_close(); ?>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <?= form_open_multipart(); ?>
                                    <form class="form-horizontal">

                                        <div class="mb-3 row">
                                            <label for="nm_wali" class="col-sm-3 col-form-label">Nama Wali</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nm_wali" id="nm_wali" class="form-control" value="<?= old('nm_wali', $dataById['nm_wali']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="alm_wali" class="col-sm-3 col-form-label">Alamat Wali</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="alm_wali" id="alm_wali" class="form-control" value="<?= old('alm_wali', $dataById['alm_wali']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="tlp_wali" class="col-sm-3 col-form-label">Telp / HP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="tlp_wali" id="tlp_wali" class="form-control" value="<?= old('tlp_wali', $dataById['tlp_wali']); ?>">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="pek_wali" class="col-sm-3 col-form-label">Pekerjaan Wali</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pek_wali" id="pek_wali" class="form-control" value="<?= old('pek_wali', $dataById['pek_wali']); ?>">
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Save</button>
                                        <?= form_close(); ?>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div><!-- /.card -->
                </div><!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->