<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class UserApi extends ResourceController
{
	protected $modelName = 'App\Models\UserApiModel';
	protected $format    = 'json';

	public function index()
	{
		helper(['form']);

		if (!$this->validate([
			'email' => [
				'label'  => 'Email',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} harus di isi dan tidak boleh kosong',
					'is_unique' => '{field} harus unik untuk setiap user'
				]
			], 'password' => [
				'label'  => 'Password',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} harus di isi dan tidak boleh kosong'
				]
			]
		])) {
			$respon = 401;
			$data = [
				'stts' => false,
				'errors' => $this->validator->getErrors()
			];
		} else {
			$email = $this->request->getVar('email');
			$pass = $this->request->getVar('password');


			$user = $this->model->login_user($email, $pass);
			if ($user['stts'] == true) {
				$respon = 202;

				$data = $user;
			} else {
				$respon = 401;
				$data = $user;
			}
		}

		return $this->respond($data, $respon);
	}

	public function user_data()
	{
		helper(['form']);

		if (!$this->validate([
			'token' => [
				'label'  => 'token',
				'rules'  => 'required',
				'errors' => [
					'required' => '{field} harus di isi dan tidak boleh kosong',
				]
			]
		])) {
			$respon = 401;
			$data = [
				'stts' => false,
				'pesan' => $this->validator->getErrors()
			];
		} else {
			$token = $this->request->getVar('token');



			$user = $this->model->userdata($token);

			if ($user['stts'] == true) {
				$respon = 202;

				$data = $user;
			} else {
				$respon = 401;
				$data = $user;
			}
		}

		return $this->respond($data, $respon);
	}
}
