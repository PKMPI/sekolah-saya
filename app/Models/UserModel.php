<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    public function save_user($data)
    {
        $this->db->table('user_login')->insert($data);
    }

    public function login_user($email, $pass)
    {
        $data = $this->db->table('user_login')->where(['email' => $email])->get()->getRowArray();
        if ($data != null) {
            if (password_verify($pass, $data['pass'])) {
                $user = [
                    'pesan' => 'login berhasil',
                    'stts' => true,
                    'data_user' => $data
                ];
            } else {
                $user = [
                    'pesan' => 'Password user salah...',
                    'stts' => false
                ];
            }
        } else {
            $user = [
                'pesan' => 'Akun tidak ditemukan mohon di periksa lagi...',
                'stts' => false
            ];
        }
        return $user;
    }

    public function data_user()
    {
        $identitas = session()->get('no_pengenal');

        $user =  $this->db->table('user_data')
            ->select('user_login.email, user_data.*')
            ->join('user_login', 'user_login.no_pengenal = user_data.no_pengenal')
            ->where(['user_data.no_pengenal' => $identitas])
            ->get()
            ->getRowArray();



        return $user;
    }

    public function skil_user()
    {
        $identitas = session()->get('no_pengenal');

        return $this->db->table('keahlian')
            ->where(['no_pengenal' => $identitas])
            ->get()->getResultArray();
    }

    public function get_menu()
    {
        return $this->db->table('user_menu')
            ->get()->getResultArray();
    }
    public function getSubMenu()
    {
        return $this->db->table('user_menu_sub')
            ->select('user_menu_sub.id,user_menu_sub.nama_menu,user_menu_sub.url,user_menu_sub.url, user_menu.menu')
            ->join('user_menu', 'user_menu.id = user_menu_sub.menu_id')
            ->get()->getResultArray();
    }



    public function cek_pass($emaillama, $email, $password)
    {
        $identitas = session()->get('no_pengenal');

        $data = $this->db->table('user_login')->where(['email' => $emaillama])->get()->getRowArray();
        if ($data != null) {
            if (password_verify($password, $data['pass'])) {
                if ($data['no_pengenal'] == $identitas) {
                    $pesan = 'Email diubah yaa...';
                    $this->db->table('user_login')
                        ->where(['id' => $data['id']])
                        ->update(['email' => $email]);
                } else {
                    $pesan = 'Jangan ini bukan anda...';
                }
            } else {
                $pesan = 'password salah, mohon di periksa lagi...';
            }
        } else {

            $pesan = 'Akun tidak ditemukan, mohon di periksa lagi...';
        }
        return $pesan;
    }

    public function ubah_pass($passwordnew, $passwordnew2, $oldpassword)
    {
        $identitas = session()->get('no_pengenal');

        $data = $this->db->table('user_login')->where(['no_pengenal' => $identitas])->get()->getRowArray();
        if ($passwordnew != $passwordnew2) {
            $pesan = 'password salah, mohon di periksa lagi...';
        } else {
            if ($passwordnew2 != $oldpassword) {
                if (password_verify($oldpassword, $data['pass'])) {
                    $pesan = 'Password diubah yaa...';
                    $this->db->table('user_login')
                        ->where(['id' => $data['id']])
                        ->update(['pass' => password_hash($passwordnew, PASSWORD_DEFAULT)]);
                } else {
                    $pesan = 'password salah, mohon di periksa lagi...';
                }
            } else {
                $pesan = 'password lama dan baru sama...';
            }
        }
        return $pesan;
    }

    public function getRole()
    {
        return $this->db->table('user_role')->get()->getResultArray();
    }

    public function tambah_role($role)
    {
        $data_cek = $this->db->table('user_role')->where(['role' => $role])->get()->getRowArray();
        if ($data_cek == null) {
            $this->db->table('user_role')->insert($role);
            $pesan = 'Role berhasil di simpan ya...';
        } else {
            $pesan = 'role sudah ada...';
        }
        return $pesan;
    }

    public function hapus_role($id)
    {
        $role = session()->get('role');
        if ($role == 1) {
            $this->db->table('user_role')->where(['id' => $id])->delete();
            $pesan = 'data sudah kamu hapus...';
        } else {
            $pesan = 'ini bukan hak kamu yaa...';
        }

        return $pesan;
    }

    public function getRoleId($id)
    {
        return $this->db->table('user_role')->where(['id' => $id])->get()->getRowArray();
    }

    public function akses_menu($data)
    {
        $result = $this->db->table('user_menu_akses')->where($data)->get()->getRowArray();
        if ($result == null) {
            $this->db->table('user_menu_akses')->insert($data);
        } else {
            $this->db->table('user_menu_akses')->where($data)->delete();
        }
        return "data di ubah ya....";
    }

    public function getAdmin()
    {
        return $this->db->table('user_login')
            ->select('user_login.email,  user_data.*')
            ->join('user_data', 'user_login.no_pengenal = user_data.no_pengenal')
            ->where(['role' => 1])
            ->get()
            ->getResultArray();
    }

    public function tambah_admin($data)
    {
        $user_login = [
            'no_pengenal' => $data['no_pengenal'],
            'email' => $data['email'],
            'pass' => password_hash(123456, PASSWORD_DEFAULT),
            'role' => 1,
        ];

        $user_data = [
            'no_pengenal' => $data['no_pengenal'],
            'nama' => $data['nama'],
            'image' => 'user.jpg',
            'no_phone' => $data['no_phone'],
            'alamat' => $data['alamat'],
        ];

        $data_admin1 = $this->db->table('user_login')->where(['no_pengenal' => $data['no_pengenal']])->get()->getResultArray();
        $data_admin2 = $this->db->table('user_login')->where(['email' => $data['email']])->get()->getResultArray();
        $data_admin3 = $this->db->table('user_data')->where(['no_phone' => $data['no_phone']])->get()->getResultArray();


        if ($data_admin1) {
            $pesan = 'nomor pengenal sudah terdaftar yaa...';
        } else {
            if ($data_admin2) {
                $pesan = 'email sudah terdaftar yaa...';
            } else {
                if ($data_admin3) {
                    $pesan = 'nomor telfon sudah terdaftar yaa...';
                } else {
                    $this->db->table('user_login')->insert($user_login);
                    $this->db->table('user_data')->insert($user_data);
                    $pesan = 'Admin Baru sudah di simpan...';
                }
            }
        }
        return $pesan;
    }


    public function hapus_admin($no_pengenal)
    {
        $role = session()->get('role');
        if ($role == 1) {
            $this->db->table('user_login')->where(['no_pengenal' => $no_pengenal])->delete();
            $this->db->table('user_data')->where(['no_pengenal' => $no_pengenal])->delete();
            $pesan = 'data sudah kamu hapus...';
        } else {
            $pesan = 'ini bukan hak kamu yaa...';
        }

        return $pesan;
    }

    public function getPengajar()
    {
        return $this->db->table('user_login')
            ->select('user_login.email,  user_data.*')
            ->join('user_data', 'user_login.no_pengenal = user_data.no_pengenal')
            ->where(['role' => 2])
            ->get()
            ->getResultArray();
    }

    public function tambah_pengajar($data)
    {
        $user_login = [
            'no_pengenal' => $data['no_pengenal'],
            'email' => $data['email'],
            'pass' => password_hash(123456, PASSWORD_DEFAULT),
            'role' => 2,
        ];

        $user_data = [
            'no_pengenal' => $data['no_pengenal'],
            'nama' => $data['nama'],
            'image' => 'user.jpg',
            'no_phone' => $data['no_phone'],
            'alamat' => $data['alamat'],
        ];

        $data_admin1 = $this->db->table('user_login')->where(['no_pengenal' => $data['no_pengenal']])->get()->getResultArray();
        $data_admin2 = $this->db->table('user_login')->where(['email' => $data['email']])->get()->getResultArray();
        $data_admin3 = $this->db->table('user_data')->where(['no_phone' => $data['no_phone']])->get()->getResultArray();


        if ($data_admin1) {
            $pesan = 'nomor pengenal sudah terdaftar yaa...';
        } else {
            if ($data_admin2) {
                $pesan = 'email sudah terdaftar yaa...';
            } else {
                if ($data_admin3) {
                    $pesan = 'nomor telfon sudah terdaftar yaa...';
                } else {
                    $this->db->table('user_login')->insert($user_login);
                    $this->db->table('user_data')->insert($user_data);
                    $pesan = 'Admin Baru sudah di simpan...';
                }
            }
        }
        return $pesan;
    }

    public function hapus_pengajar($no_pengenal)
    {
        $role = session()->get('role');
        if ($role == 1) {
            $this->db->table('user_login')->where(['no_pengenal' => $no_pengenal])->delete();
            $this->db->table('user_data')->where(['no_pengenal' => $no_pengenal])->delete();
            $pesan = 'data sudah kamu hapus...';
        } else {
            $pesan = 'ini bukan hak kamu yaa...';
        }

        return $pesan;
    }

    public function getSiswa()
    {
        return $this->db->table('user_login')
            ->select('user_login.email,  user_data.*')
            ->join('user_data', 'user_login.no_pengenal = user_data.no_pengenal')
            ->where(['role' => 3])
            ->get()
            ->getResultArray();
    }

    public function tambah_siswa($data)
    {
        $user_login = [
            'no_pengenal' => $data['no_pengenal'],
            'email' => $data['email'],
            'pass' => password_hash(123456, PASSWORD_DEFAULT),
            'role' => 3,
        ];

        $user_data = [
            'no_pengenal' => $data['no_pengenal'],
            'nama' => $data['nama'],
            'image' => 'user.jpg',
            'no_phone' => $data['no_phone'],
            'alamat' => $data['alamat'],
        ];

        $data_admin1 = $this->db->table('user_login')->where(['no_pengenal' => $data['no_pengenal']])->get()->getResultArray();
        $data_admin2 = $this->db->table('user_login')->where(['email' => $data['email']])->get()->getResultArray();
        $data_admin3 = $this->db->table('user_data')->where(['no_phone' => $data['no_phone']])->get()->getResultArray();


        if ($data_admin1) {
            $pesan = 'nomor pengenal sudah terdaftar yaa...';
        } else {
            if ($data_admin2) {
                $pesan = 'email sudah terdaftar yaa...';
            } else {
                if ($data_admin3) {
                    $pesan = 'nomor telfon sudah terdaftar yaa...';
                } else {
                    $this->db->table('user_login')->insert($user_login);
                    $this->db->table('user_data')->insert($user_data);
                    $pesan = 'Admin Baru sudah di simpan...';
                }
            }
        }
        return $pesan;
    }

    public function hapus_siswa($no_pengenal)
    {
        $role = session()->get('role');
        if ($role == 1) {
            $this->db->table('user_login')->where(['no_pengenal' => $no_pengenal])->delete();
            $this->db->table('user_data')->where(['no_pengenal' => $no_pengenal])->delete();
            $pesan = 'data sudah kamu hapus...';
        } else {
            $pesan = 'ini bukan hak kamu yaa...';
        }

        return $pesan;
    }
}
