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

                <!-- Default Basic Forms Start -->
                <div class="clearfix">
                    <div class="pull-left pb-3">
                        <h4 class="text-blue h4">Edit Email</h4>
                    </div>

                </div>
                <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/Aksibtn/edit_email" method="POST">
                    <?= csrf_field() ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email Baru:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                apa email kamu...
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="emaillama" class="col-sm-2 col-form-label">Email lama :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="emaillama" name="emaillama" required>
                            <div class="invalid-feedback">
                                apa email lama kamu...
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password Lama :</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                apa password kamu...
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>



            </div>

            <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                <!-- Default Basic Forms Start -->
                <div class="clearfix">
                    <div class="pull-left pb-3">
                        <h4 class="text-blue h4">Edit Password</h4>
                    </div>

                </div>
                <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/Aksibtn/edit_pass" method="POST">
                    <?= csrf_field() ?>

                    <div class="form-group row">
                        <label for="passwordnew" class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="passwordnew" name="passwordnew" required>
                            <div class="invalid-feedback">
                                apa password baru kamu...
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="passwordnew2" class="col-sm-2 col-form-label">Password :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="passwordnew2" name="passwordnew2" required>
                            <div class="invalid-feedback">
                                sekali lagi password baru kamu...
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="oldpassword" class="col-sm-2 col-form-label">Old Password :</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="oldpassword" name="oldpassword" required>
                            <div class="invalid-feedback">
                                apa old password baru kamu...
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
            <div class="footer-wrap pd-20 mb-20 card-box">
                App - Template By <a href="https://github.com/ringga-dev" target="_blank">Ringga Septia Pribadi</a>
            </div>
        </div>
    </div>

    <?= $this->endSection() ?>