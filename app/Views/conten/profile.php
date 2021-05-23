<?= $this->extend('auth/tamplate'); ?>
<?= $this->extend('auth/menu'); ?>
<?= $this->section('conten') ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4><?= $title ?></h4>

                            <?php if (session()->getFlashdata('pesan')) : ?>
                                <?= session()->getFlashdata('pesan') ?>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                <!-- conten user -->

                <div class="col-lg-12 ">
                    <div class="profile-photo">
                        <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
                        <img src="<?= base_url('assets/profile/' . $user['image']) ?>" alt="" class="avatar-photo">

                        <!-- modal start -->
                        <div class="modal fade bs-example-modal-lg" id="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">

                                <div class="modal-content">
                                    <form action="<?= base_url() ?>/Aksibtn/edit_profie" method="POST" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myLargeModalLabel">Mengubah Profil Mu...</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body ">
                                            <div class="profile-photo">
                                                <div class="img-container ">
                                                    <img src="<?= base_url('assets/profile/' . $user['image']) ?>" alt="" class="avatar-photo image_user">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image" onchange="lihat()">
                                                    <label class="custom-file-label">Pilih Gambar Ya...</label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        isi nama kamu...
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">email :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>

                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="nomor" class="col-sm-2 col-form-label">nomor :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="nomor" name="nomor" value="<?= $user['no_phone'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        apa nomor kamu...
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-2 col-form-label">alamat :</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        apa alamat kamu...
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- modal end -->

                    </div>
                    <h5 class="text-center h5 mb-0"><?= $user['nama'] ?></h5>
                    <div class="profile-info">
                        <h5 class="mb-20 h5 text-blue">Informasi Kamu</h5>
                        <ul>
                            <li>
                                <span>Email Kamu:</span>
                                <?= $user['email'] ?>
                            </li>
                            <li>
                                <span>Nomor WA/HP Kamu:</span>
                                <?= $user['no_phone'] ?>
                            </li>
                            <li>
                                <span>Nagara Kamu:</span>
                                Indonesia
                            </li>
                            <li>
                                <span>Alamat Kamu:</span>
                                <?= $user['alamat'] ?>
                            </li>
                        </ul>
                    </div>

                    <!-- <div class="profile-social">
                        <div class="btn-list">
                            <h5 class="mb-20 h5 text-blue">Social Links <button type="button" data-bgcolor="#086b5e" data-color="#04413b" class="btn sm" data-toggle="modal" data-target="#sosmet-modal"><i class="dw dw-add"></i> add</button></h5>

                        </div> -->
                    <!-- Sosmet modal start-->
                    <!-- <div class="modal fade" id="sosmet-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="myLargeModalLabel">Tambah Sosoal Kamu</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- Sosmet modal end -->

                    <!-- <ul class="clearfix">
                            <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#c32361" data-color="#ffffff"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#3d464d" data-color="#ffffff"><i class="fa fa-dropbox"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#db4437" data-color="#ffffff"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#bd081c" data-color="#ffffff"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00aff0" data-color="#ffffff"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#" class="btn" data-bgcolor="#00b489" data-color="#ffffff"><i class="fa fa-vine"></i></a></li>
                        </ul>
                    </div> -->


                    <div class="profile-skills">

                        <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group" role="group" aria-label="First group">
                                <h5 class="mb-20 h5 text-blue">Key Skills </h5>
                            </div>
                            <div class="input-group">
                                <button type="button" data-bgcolor="#086b5e" data-color="#04413b" class="btn sm" data-toggle="modal" data-target="#skill-modal"><i class="dw dw-add"></i> add</button>
                            </div>
                        </div>

                        <?php foreach ($skil as $s) : ?>
                            <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                <div class="btn-group" role="group" aria-label="First group">
                                    <h6 class="mb-5 font-14"><?= $s['nama'] ?></h6>
                                </div>
                                <div class="input-group">
                                    <button type="submit" data-toggle="modal" data-target="#confirmation-modal-<?= $s['id']; ?>" class="btn-sm " data-bgcolor="#F2180C" data-color="#000"><i class="dw dw-delete-3"></i></button>

                                    <!-- delete modal -->
                                    <div class="modal fade" id="confirmation-modal-<?= $s['id']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body text-center font-18">
                                                    <h4 class="padding-top-30 mb-30 weight-500">Apakah kamu ingin menghapus <?= $s['nama'] ?>?</h4>
                                                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-secondary border-radius-100 btn-block confirmation-btn"><i class="fa fa-times"></i></button>
                                                        </div>
                                                        <div class="col-6">
                                                            <a href="<?= base_url('Aksibtn/delete_skill/' . $s['id']) ?>" class="btn btn-danger border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- delete modal -->

                                </div>
                            </div>
                            <div class="progress mb-20" style="height: 6px;">
                                <div class="progress-bar" role="progressbar" style="width: <?= $s['persentase'] ?>%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
                <!-- skil modal start-->
                <div class="modal fade" id="skill-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/Aksibtn/add_skill" method="POST">
                                <?= csrf_field() ?>
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Keahlian Kamu</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="Keahlian" class="col-sm-2 col-form-label">Keahlian :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Keahlian" name="keahlian" required>
                                            <div class="invalid-feedback">
                                                apa keahlian kamu...
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label for="formControlRange">Persentase :</label>
                                            <input type="range" class="form-control-range" id="persentase" name="persentase">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- skill modal end -->

            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            App - Template By <a href="https://github.com/ringga-dev" target="_blank">Ringga Septia Pribadi</a>
        </div>
    </div>
</div>


<?= $this->endSection() ?>