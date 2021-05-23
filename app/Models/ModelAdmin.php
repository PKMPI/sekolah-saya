<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
	public function tambah_menu($data)
	{
		$data_cek = $this->db->table('user_menu')->where(['menu' => $data['menu']])->get()->getRowArray();
		if ($data_cek == null) {
			$this->db->table('user_menu')->insert($data);
			$pesan = 'berhasil di simpan ya....';
		} else {
			$pesan = 'Kayaknya menu sudah ada? coba menu lain....';
		}
		return $pesan;
	}

	public function hapus_menu($id)
	{
		$role = session()->get('role');

		if ($role == 1) {
			$this->db->table('user_menu')->where(['id' => $id])->delete();
			$pesan = 'data sudah kamu hapus....';
		} else {
			$pesan = 'mehapus menu hanya bisa dilakukan admin yaa....';
		}
		return $pesan;
	}

	public function tambah_submenu($data)
	{
		$data_cek = $this->db->table('user_menu_sub')->where(['nama_menu' => $data['nama_menu']])->get()->getRowArray();
		if ($data_cek == null) {
			$this->db->table('user_menu_sub')->insert($data);
			$pesan = 'berhasil di simpan ya....';
		} else {
			$pesan = 'Kayaknya menu sudah ada? coba menu lain....';
		}
		return $pesan;
	}

	public function hapus_submenu($id)
	{
		$role = session()->get('role');

		if ($role == 1) {
			$this->db->table('user_menu_sub')->where(['id' => $id])->delete();
			$pesan = 'data sudah kamu hapus....';
		} else {
			$pesan = 'mehapus menu hanya bisa dilakukan admin yaa....';
		}
		return $pesan;
	}
}
