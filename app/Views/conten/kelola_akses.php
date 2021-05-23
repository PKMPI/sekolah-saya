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


                <form action="" method="POST" class="col-md-12 text-right">
                    <h4 class="text-success">Role :<?= $role['role'] ?></h4>
                </form>

                <div class="p-2 m-2">
                    <table class="data-table table hover multiple-select-row nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Nomor</th>
                                <th>Nama Menu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($menu as $m) : ?>
                                <tr>
                                    <td class="table-plus"><?= $i++ ?></td>
                                    <td><?= $m['menu'] ?></td>
                                    <td>
                                        <a href="<?= base_url() . '/aksibtn/atur_akses?role=' . $role['id'] . '&menu=' . $m['id']; ?>" class="btn btn-secondary fa-1x" data-bgcolor="#c32361"><?= cek_akses($role['id'], $m['id']); ?></a>
                                    </td>
                                <?php endforeach; ?>
                                </tr>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            App - Template By <a href="https://github.com/ringga-dev" target="_blank">Ringga Septia Pribadi</a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>