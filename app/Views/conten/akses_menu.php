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
                    <a href="" class="btn btn-info" data-toggle="modal" data-target="#exampleModal"><i class="icon-copy dw dw-folder-2"></i> Add New Role</a>
                </form>

                <div class="p-2 m-2">
                    <table class="data-table table hover multiple-select-row nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Nomor</th>
                                <th>Role</th>
                                <th>aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($role as $r) : ?>
                                <tr>
                                    <td class="table-plus"><?= $i++ ?></td>
                                    <td><?= $r['role'] ?></td>
                                    <td>
                                        <a href="<?= base_url() . '/admin/kelola_akses/' . $r['id']; ?>" class="btn btn-secondary fa-1x"><i class="icon-copy dw dw-balance"></i> akses</a>
                                        <a href="<?= base_url() . '/aksibtn/delete_role/' . $r['id']; ?>" class="btn btn-danger text-warning sm"><i class="icon-copy dw dw-delete-3"></i> delete</a>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>


                <!-- modal menu start-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form class="m-2 p-2 was-validated" action="<?= base_url() ?>/Aksibtn/add_role" method="POST">
                                <?= csrf_field() ?>
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myLargeModalLabel">Tambah Role</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-2 col-form-label">Role :</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control " id="role" name="role" placeholder="role (gunakan simbol - atau _ sebagai pemisah)" required>
                                            <div class="invalid-feedback">
                                                Apa role nya...
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