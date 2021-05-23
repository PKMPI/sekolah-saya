<?php

function src($fileName, $type = "full")
{
    $path = './img/profile_user/';


    if ($type != 'full')
        $path .= $type . '/';
    return $path . $fileName;
}

function admin_menu()
{
    $db = \Config\Database::connect();
    $uri = service('uri');
    $role = session()->get('role');

    $menuId = $db->table('user_menu')
        ->where(['menu' => $uri->getSegment(1)])
        ->get()
        ->getRowArray();

    $akses = $db->table('user_menu_akses')
        ->where(['role_id' => $role, 'menu_id' => $menuId['id']])
        ->get()->getRowArray();

    if ($akses < 1) {
        $data = false;
    } else {
        $data = true;
    }
    return $data;
}

function cek_akses($role_id, $menu_id)
{
    $db = \Config\Database::connect();
    $cek = $db->table('user_menu_akses')->where(['role_id' => $role_id, 'menu_id' => $menu_id])->get()->getResultArray();
    if ($cek != null) {
        return "<i class='icon-copy dw dw-unlock1'></i> Kunci";
    } else {
        return "<i class='icon-copy dw dw-user-13'></i> Tampilkan";
    }
}
