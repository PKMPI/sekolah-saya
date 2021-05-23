<?php

namespace App\Controllers;

use App\Models\Modelaksibtn;
use App\Models\UserModel;
use App\Models\ModelAdmin;
use App\Controllers\BaseController;

class Aksibtn extends BaseController
{
	public function __construct()
	{
		$this->Modelaksibtn = new Modelaksibtn();
		$this->UserModel = new UserModel();
		$this->ModelAdmin = new ModelAdmin();
	}

	//fungsi di profile 
	//1. skill user
	public function add_skill()
	{
		$data = [
			'no_pengenal' => session()->get('no_pengenal'),
			'nama' => $this->request->getVar('keahlian'),
			'persentase' => $this->request->getVar('persentase'),
		];

		$pesan = $this->Modelaksibtn->add_skil_user($data);

		session()->setFlashdata('pesan', "<div class='alert alert-success col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/home/profile');
	}

	public function delete_skill($id)
	{
		$pesan = $this->Modelaksibtn->delete_skil_user($id);

		session()->setFlashdata('pesan', "<div class='alert alert-danger col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/home/profile');
	}
	//edit profile
	public function edit_profie()
	{
		$imageCrop = \Config\Services::image();
		$width = 100;
		$height = 100;
		if ($this->validate([
			'image' => [
				'rules'  => 'max_size[image,2048]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => '{field} ukuran foto kamu lebih dari 2 MB ...',
					'is_image' => '{field} file kamu bukan gambar ...',
					'mime_in' => '{field} file kamu bukan gambar...'
				]
			]
		])) {
			$image = $this->request->getFile('image');
			$userData = $this->UserModel->data_user();
			$imageLama = $userData['image'];
			$path = './assets/profile/';
			$gambar = service('image');


			if ($image != null) {
				if ($imageLama != 'user.jpg') {
					unlink($path . $imageLama);
				}
				$nameFile = $image->getRandomName();
				$image->move($path, $nameFile);

				// menambah foldel 
				// if (!file_exists($path . 'crop/'))
				// 	mkdir($path . 'crop/', 755);

				$gambar->withFile($path . '/' . $nameFile)
					->fit(400, 400, "center")
					->save($path . "/" . $nameFile);

				$data = [
					'nama' => $this->request->getVar('nama'),
					'image' => $nameFile,
					'no_phone' => $this->request->getVar('nomor'),
					'alamat' => $this->request->getVar('alamat'),
				];
			} else {
				$data = [
					'nama' => $this->request->getVar('nama'),
					'no_phone' => $this->request->getVar('no_phone'),
					'alamat' => $this->request->getVar('alamat'),
				];
			}

			if ($this->Modelaksibtn->updateUser($data) == true) {
				session()->setFlashdata('pesan', "<div class='alert alert-success col-lg-12' role='alert'>data kamu sudah diperbarui...</div>");
				return redirect()->to('/home/profile');
			} else {
				session()->setFlashdata('pesan', "<div class='alert alert-danger col-lg-12' role='alert'>data kamu gagal diperbarui...</div>");
				return redirect()->to('/home/profile');
			}

			dd($data);
		} else {
			$errors = \Config\Services::validation();
			$err = $errors->getError('image');

			session()->setFlashdata('pesan', "<div class='alert alert-danger col-lg-12' role='alert'>$err</div>");
			return redirect()->to('/home/profile');
		}
	}

	public function add_menu()
	{
		$data = [
			'menu' => $this->request->getVar('menu'),
			'icons' => $this->request->getVar('logo_user'),
			'aktif' => 1,
		];

		$pesan = $this->ModelAdmin->tambah_menu($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/menu');
	}

	public function delete_menu($id)
	{
		$pesan = $this->ModelAdmin->hapus_menu($id);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/menu');
	}

	public function add_submenu()
	{
		$data = [
			'menu_id' => $this->request->getVar('menu_id'),
			'nama_menu' => $this->request->getVar('title'),
			'url' => $this->request->getVar('url'),
			'aktif' => 1,
		];

		$pesan = $this->ModelAdmin->tambah_submenu($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/menu');
	}

	public function delete_submenu($id)
	{
		$pesan = $this->ModelAdmin->hapus_submenu($id);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/menu');
	}

	public function edit_email()
	{
		$email = $this->request->getVar('email');
		$password = $this->request->getVar('password');
		$emaillama = $this->request->getVar('emaillama');

		$pesan = $this->UserModel->cek_pass($emaillama, $email, $password);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/home/password');
	}

	public function edit_pass()
	{
		$passwordnew = $this->request->getVar('passwordnew');
		$passwordnew2 = $this->request->getVar('passwordnew2');
		$oldpassword = $this->request->getVar('oldpassword');

		$pesan = $this->UserModel->ubah_pass($passwordnew, $passwordnew2, $oldpassword);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/home/password');
	}

	public function add_role()
	{
		$role = ['role' => $this->request->getVar('role')];

		$pesan = $this->UserModel->tambah_role($role);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/akses_menu');
	}

	public function delete_role($id)
	{
		$pesan = $this->UserModel->hapus_role($id);

		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/akses_menu');
	}

	public function atur_akses()
	{
		$data = [
			'role_id' => $this->request->getVar('role'),
			'menu_id' => $this->request->getVar('menu')
		];

		$pesan = $this->UserModel->akses_menu($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/kelola_akses/' . $this->request->getVar('role'));
	}

	public function add_admin()
	{
		$data = [
			'no_pengenal' => $this->request->getVar('no_pengenal'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('nama'),
			'no_phone' => $this->request->getVar('no_phone'),
			'alamat' => $this->request->getVar('alamat'),
			'email' => $this->request->getVar('email'),
		];

		$pesan = $this->UserModel->tambah_admin($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/data_admin');
	}

	public function delete_admin($no_pengenal)
	{
		$pesan = $this->UserModel->hapus_admin($no_pengenal);

		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/data_admin');
	}

	public function add_pengajar()
	{
		$data = [
			'no_pengenal' => $this->request->getVar('no_pengenal'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('nama'),
			'no_phone' => $this->request->getVar('no_phone'),
			'alamat' => $this->request->getVar('alamat'),
			'email' => $this->request->getVar('email'),
		];

		$pesan = $this->UserModel->tambah_pengajar($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/pengajar');
	}

	public function delete_pengajar($no_pengenal)
	{
		$pesan = $this->UserModel->hapus_pengajar($no_pengenal);

		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/pengajar');
	}

	public function add_siswa()
	{
		$data = [
			'no_pengenal' => $this->request->getVar('no_pengenal'),
			'email' => $this->request->getVar('email'),
			'nama' => $this->request->getVar('nama'),
			'no_phone' => $this->request->getVar('no_phone'),
			'alamat' => $this->request->getVar('alamat'),
			'email' => $this->request->getVar('email'),
		];

		$pesan = $this->UserModel->tambah_siswa($data);
		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/data_siswa');
	}


	public function delete_siswa($no_pengenal)
	{
		$pesan = $this->UserModel->hapus_siswa($no_pengenal);

		session()->setFlashdata('pesan', "<div class='alert alert-warning col-lg-12' role='alert'>$pesan</div>");
		return redirect()->to('/admin/data_siswa');
	}
}
