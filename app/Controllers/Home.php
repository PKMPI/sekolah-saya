<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->UserModel = new UserModel();
	}

	public function error()
	{
		return view('auth/error');
	}

	public function index()
	{
		$data = [
			'title' => 'Home',
			'user' => $this->UserModel->data_user()
		];


		return view('conten/home', $data);
	}

	public function profile()
	{
		$data = [
			'title' => 'Profile User',
			'user' => $this->UserModel->data_user(),
			'skil' => $this->UserModel->skil_user(),
			'validation' => \Config\Services::validation()

		];

		return view('conten/profile', $data);
	}

	public function password()
	{
		$data = [
			'title' => 'Edit Password User',
			'user' => $this->UserModel->data_user(),

		];




		return view('conten/password', $data);
	}





















	public function image()
	{
		$data = [
			'title' => 'Edit Password User',
			'user' => $this->UserModel->data_user(),

		];
		return view('conten/image', $data);
	}
}
