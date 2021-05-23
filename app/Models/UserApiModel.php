<?php

namespace App\Models;

use CodeIgniter\Model;

class UserApiModel extends Model
{

	public function login_user($email, $pass)
	{
		$data = $this->db->table('user_login')->where(['email' => $email])->get()->getRowArray();
		if ($data != null) {
			if (password_verify($pass, $data['pass'])) {
				$token = $this->db->table('user_token')->where(['no_pengenal' => $data['no_pengenal']])->get()->getRowArray();

				if ($token != null) {
					$user = [
						'stts' => true,
						'pesan' => 'token dikirim ya...',
						'data' => $token
					];
				} else {
					$user = [
						'stts' => false,
						'pesan' => 'mohon Aktifkan fitur aplikasi pada webnya ya...'
					];
				}
			} else {
				$user = [
					'pesan' => 'Password kamu salah nih...',
					'stts' => false
				];
			}
		} else {
			$user = [
				'stts' => false,
				'pesan' => 'Akun tidak ditemukan, periksa lagi ya...'
			];
		}
		return $user;
	}

	public function userdata($token)
	{
		$tokenUser = $this->db->table('user_token')->where(['token' => $token])->get()->getRowArray();

		if ($tokenUser != null) {
			$userlogin = $this->db->table('user_login')->where(['no_pengenal' => $tokenUser['no_pengenal']])->get()->getRowArray();
			$userData = $this->db->table('user_data')->where(['no_pengenal' => $tokenUser['no_pengenal']])->get()->getRowArray();
			// $sosmet = $this->db->table('sosmet')->where(['no_pengenal' => $tokenUser['no_pengenal']])->get()->getRowArray();
			$keahlian = $this->db->table('keahlian')->where(['no_pengenal' => $tokenUser['no_pengenal']])->get()->getResultArray();

			$data = [
				'email' => $userlogin['email'],
				'no_pengenal' => $userData['no_pengenal'],
				'nama' => $userData['nama'],
				'image' => $userData['image'],
				'no_phone' => $userData['no_phone'],
				'alamat' => $userData['alamat']
			];

			$user = [
				'stts' => true,
				'pesan' => 'Data kamu...',
				'data' => $data,
				'keahlian' => $keahlian
			];
		} else {
			$user = [
				'stts' => false,
				'pesan' => 'token tidak falid...'
			];
		}

		return $user;
	}
}
