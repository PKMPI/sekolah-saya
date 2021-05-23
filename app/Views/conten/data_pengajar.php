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


                <form action="" method="POST" class="col-md-12 text-right ml-5 mt-2 mb-2">
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#bd-example-modal-lg"><i class="icon-copy dw dw-user-2"></i> Add New Pengajar</a>
                </form>

                <div class="p-2 m-2">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Nomor</th>
                                <th>Email</th>
                                <th>Nomor Pengenal</th>
                                <th>Nama</th>
                                <th>NO Phone</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($pengajar as $a) : ?>
                                <tr>
                                    <td class="table-plus"><?= $i++ ?></td>
                                    <td><?= $a['email'] ?></td>
                                    <td><?= $a['no_pengenal'] ?></td>
                                    <td><?= $a['nama'] ?></td>
                                    <td><?= $a['no_phone'] ?></td>
                                    <td><?= $a['alamat'] ?></td>
                                    <td>
                                        <a href="<?= base_url() . '/aksibtn/delete_pengajar/' . $a['no_pengenal'] ?>" class="btn btn-danger sm"><i class="icon-copy dw dw-delete-3"></i></a>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>

                <!-- modal menu start-->
                <div class="modal fade bs-example-modal-lg" id="bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/Aksibtn/add_pengajar" method="POST">
                                <?= csrf_field() ?>
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Pengajar Baru</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group row">
                                        <label for="no_pengenal" class="col-sm-2 col-form-label">No Pengenal :</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control " id="no_pengenal" name="no_pengenal" placeholder="No Pengenal" required>
                                            <div class="invalid-feedback">
                                                Apa nomor pengenal nya...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email :</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control " id="email" name="email" placeholder="email" required>
                                            <div class="invalid-feedback">
                                                Apa email nya...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="nama" name="nama" placeholder="Nama" required>
                                            <div class="invalid-feedback">
                                                Apa nama nya...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="no_phone" class="col-sm-2 col-form-label">No Phone :</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control " id="no_phone" name="no_phone" placeholder="No Phone" required>
                                            <div class="invalid-feedback">
                                                Apa no phone nya...
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="alamat" name="alamat" placeholder="Alamat" required>
                                            <div class="invalid-feedback">
                                                Apa alamat nya...
                                            </div>
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