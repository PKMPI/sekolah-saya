<?= $this->extend('auth/tamplate'); ?>
<?= $this->section('menu') ?>

<?php
$db = \Config\Database::connect();
$role = session()->get('role');

$menu = $db->table('user_menu')
    ->select('user_menu.*')
    ->join('user_menu_akses', 'user_menu.id = user_menu_akses.menu_id')
    ->where(['user_menu_akses.role_id' => $role, 'user_menu.aktif' => 1])
    ->orderBy('user_menu.id', 'ASC')
    ->get()
    ->getResultArray();

?>

<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="<?= base_url('tamplate/admin') ?>/vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
            <img src="<?= base_url('tamplate/admin') ?>/vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <?php foreach ($menu as $m) : ?>
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle">
                            <span class="micon <?= $m['icons'] ?>"></span><span class="mtext"><?= $m['menu'] ?></span>
                        </a>
                        <?php
                        $menuid = $m['id'];
                        $submenu = $db->table('user_menu_sub')
                            ->select('user_menu_sub.*')
                            ->join('user_menu', 'user_menu_sub.menu_id = user_menu.id')
                            ->where(['user_menu_sub.menu_id' => $menuid, 'user_menu_sub.aktif' => 1])
                            ->orderBy('user_menu_sub.id', 'ASC')
                            ->get()
                            ->getResultArray();
                        ?>
                        <ul class="submenu">
                            <?php foreach ($submenu as $sm) : ?>
                                <li><a href="<?= base_url($sm['url'])  ?>"><?= $sm['nama_menu'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?php $this->endSection() ?>