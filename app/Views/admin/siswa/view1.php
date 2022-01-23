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
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url(); ?>/assets/backend/dist/img/user4-128x128.jpg" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= old('nama', $dataById['nama']); ?></h3>

                            <p class="text-muted text-center">Software Engineer</p>

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

                            <!-- <a href="<?= base_url('admin/ptk') ?>" type="submit" class="btn btn-info btn-sm"><i class="fas fa-reply"></i> Back</a> -->
                        </div>
                        <!-- /.card-body -->
                        <li class="list-group-item">
                            <a href="<?= base_url('admin/ptk') ?>" type="submit" class="btn btn-info btn-sm"><i class="fas fa-reply"></i> Back</a>
                            <a href="<?= base_url('admin/ptk/update_data/' . $dataById['id_ptk']); ?>" class="btn btn-warning btn-sm"><i class="far fa-edit"> Edit</i></a>
                            <a href="<?= base_url('admin/ptk/delete_data/' . $dataById['id_ptk']); ?>" class="btn btn-danger btn-sm "> <i class="fas fa-trash"> Delate</i></a>
                        </li>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Data Diri</a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Pendidikan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Jabatan</a></li> -->
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="mb-3 row">
                                        <label for="niy" class="col-sm-2 col-form-label">NIY</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="niy" value=": <?= old('niy', $dataById['niy']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nuptk" class="col-sm-2 col-form-label">NUPTK</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="nuptk" value=": <?= old('nuptk', $dataById['nuptk']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="nama" value=": <?= old('nama', $dataById['nama']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="t_lahir" class="col-sm-2 col-form-label">Tempat</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="t_lahir" value=": <?= old('t_lahir', $dataById['t_lahir']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="tgl_lahir" value=": <?= old('tgl_lahir', $dataById['tgl_lahir']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="jk" value=": <?= old('jk', $dataById['jk']); ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <input type="text" readonly class="form-control-plaintext" id="alamat" value=": <?= old('alamat', $dataById['alamat']); ?>">
                                        </div>
                                    </div>

                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">


                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->