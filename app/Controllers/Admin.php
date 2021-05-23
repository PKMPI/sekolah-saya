<?php

namespace App\Controllers;

use App\Models\UserModel;

use App\Controllers\BaseController;

class Admin extends BaseController
{
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function menu()
	{
		if (admin_menu() == false) {
			return redirect()->to('/home/error');
		}

		$data = [
			'title' => 'Menu Managemen',
			'user' => $this->UserModel->data_user(),
			'menu' => $this->UserModel->get_menu(),
			'submenu' => $this->UserModel->getSubMenu()

		];

		return view('conten/menuUser', $data);
	}

	public function akses_menu()
	{
		if (admin_menu() == false)
			return redirect()->to('/home/error');


		$data = [
			'title' => 'Role User',
			'user' => $this->UserModel->data_user(),
			'role' => $this->UserModel->getRole()
		];
		return view('conten/akses_menu', $data);
	}

	public function kelola_akses($id)
	{
		if (admin_menu() == false)
			return redirect()->to('/home/error');


		$data = [
			'title' => 'Kelola Akses Menu',
			'user' => $this->UserModel->data_user(),
			'menu' => $this->UserModel->get_menu(),
			'role' => $this->UserModel->getRoleId($id)

		];
		return view('conten/kelola_akses', $data);
	}

	public function sekolah()
	{

		// if (admin_menu() == false) {
		// 	return redirect()->to('/home/error');
		// }

		// $data = [
		// 	'title' => 'Kelola Data Sekolah',
		// 	'user' => $this->UserModel->data_user(),
		// ];

		return view('auth/errordev');
	}

	public function data_admin()
	{
		if (admin_menu() == false)
			return redirect()->to('/home/error');


		$data = [
			'title' => 'Kelola Data Admin',
			'user' => $this->UserModel->data_user(),
			'admin' => $this->UserModel->getAdmin(),
		];

		return view('conten/data_admin', $data);
	}

	public function pengajar()
	{
		if (admin_menu() == false)
			return redirect()->to('/home/error');


		$data = [
			'title' => 'Kelola Data Pengajar',
			'user' => $this->UserModel->data_user(),
			'pengajar' => $this->UserModel->getPengajar(),
		];

		return view('conten/data_pengajar', $data);
	}


	public function data_siswa()
	{
		if (admin_menu() == false)
			return redirect()->to('/home/error');

		$data = [
			'title' => 'Kelola Data Siswa',
			'user' => $this->UserModel->data_user(),
			'siswa' => $this->UserModel->getSiswa(),
		];

		return view('conten/data_siswa', $data);
	}
}
