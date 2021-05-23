<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelaksibtn extends Model
{
	public function add_skil_user($data)
	{
		$data_cek = $this->db->table('user_login')->where(['no_pengenal' => $data['no_pengenal']])->get()->getRowArray();
		if ($data_cek != null) {
			$this->db->table('keahlian')->insert($data);
			$pesan = 'Keahlian kamu berhasil di simpan ya...';
		} else {
			$pesan = 'Data kamu gak ada di buku saya...';
		}
		return $pesan;
	}

	public function delete_skil_user($id)
	{
		$identitas = session()->get('no_pengenal');

		$data = $this->db->table('keahlian')->where(['id' => $id])->get()->getRowArray();

		if ($identitas == $data['no_pengenal']) {
			$this->db->table('keahlian')->where(['id' => $id])->delete();
			$pesan = 'data sudah kamu hapus';
		} else {
			$pesan = 'jangan mencoba menghapus data orang lain ya';
		}

		return $pesan;
	}

	public function updateUser($data)
	{
		$identitas = session()->get('no_pengenal');

		$this->db->table('user_data')
			->where(['no_pengenal' => $identitas])
			->update($data);

		return true;
	}
}
