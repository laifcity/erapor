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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/siswa'); ?>"><?= $title ?></a></li>
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

                            <!-- <form action="" method="POST" enctype="multipart/form-data"> -->

                            <?= form_open_multipart(); ?>
                            <?= csrf_field(); ?>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <div class="mb-3 row">
                                            <label for="nis" class="col-sm-6 col-form-label">NIS</label>
                                            <div class="col-sm-6">
                                                <input type="text" name="nis" id="nis" class="form-control " placeholder="NIS">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="mb-3 row">
                                            <label for="nis" class="col-sm-2 col-form-label">NISN</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nisn" id="nisn" class="form-control " placeholder="NISN">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="nama_siswa" class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input type="text" name="nama_siswa" id="nama_siswa" class="form-control " placeholder="Nama Siswa">
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
                                            <input type="text" name="t_lahir" id="t_lahir" class="form-control " placeholder="Tempat Lahit">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- text input -->
                                    <div class="form-group">


                                        <div class="mb-3 row">
                                            <label for="alm_siswa" class="col-sm-4 col-form-label">Alamat</label>
                                            <div class="col-sm-7">
                                                <input type="text" name="alm_siswa" id="alm_siswa" class="form-control " placeholder="Alamat">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="id_keahlian" class="col-sm-4 col-form-label">Kompetensi Keahlian</label>
                                            <div class="col-sm-7">
                                                <select name="id_keahlian" id="id_keahlian" class="form-control">
                                                    <option selected="selected" value="">-- Pilih Kompetensi Keahlian --</option>
                                                    <?php foreach ($jurusan as $key) : ?>
                                                        <option value="<?= $key['id_keahlian']; ?>"><?= $key['komp_keahlian']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label for="foto_siswa" class="col-sm-4 col-form-label">Foto Siswa</label>
                                            <div class="col-sm-7">
                                                <div class="custom-file">
                                                    <input type="file" class="form-control" name="foto_siswa" id="foto_siswa">
                                                    <label class="custom-file-label" for="foto_siswa">Pilih Gambar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <div class="mb-3 row">
                                            <img src="<?= base_url('public/assets/foto/siswa/avatar.png'); ?>" width="150px">
                                        </div>
                                    </div>
                                </div>
                            </div>






                            <a href="<?= base_url('admin/siswa') ?>" type="submit" class="btn btn-info"><i class="fas fa-reply"></i> Back</a>
                            <button type="submit" class="btn btn-primary float-right"><i class="fas fa-paper-plane"></i> Save</button>
                            <!-- </form> -->
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->