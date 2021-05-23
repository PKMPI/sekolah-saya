<?php

namespace App\Controllers;


use App\Models\UserModel;
use CodeIgniter\Debug\Toolbar\Collectors\Config;
use Config\Validation;

class Auth extends BaseController
{

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function cek_login()
    {
        //view loding web 
        $data['loding_text'] = 'silahkan tunggu';
        echo view('auth/loding', $data);

        //proses login user in web
        if ($this->validate([
            'email_user' => [
                'label'  => 'Email',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} harus di isi dan tidak boleh kosong',
                    'is_unique' => '{field} harus unik untuk setiap user'
                ]
            ], 'pass' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} harus di isi dan tidak boleh kosong'
                ]
            ]
        ])) {
            // login success

            $email = $this->request->getVar('email_user');
            $pass = $this->request->getVar('pass');

            $user = $this->UserModel->login_user($email, $pass);

            if ($user['stts'] == true) {
                $data_session = [
                    'no_pengenal'  => $user['data_user']['no_pengenal'],
                    'role'     => $user['data_user']['role'],
                    'logged_in' => TRUE
                ];
                session()->set($data_session);
                return redirect()->to(base_url('home'));
            } else {

                $pesan = $user['pesan'];
                session()->setFlashdata('pesan', "<div class='alert alert-danger' role='alert'>$pesan </div>");
                return redirect()->to(base_url('auth'));
            }
        } else {
            $errors = \Config\Services::validation();

            return redirect()->to('/auth')->withInput()->with('validation', $errors);
        }
    }



    public function register()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];

        return view('auth/register', $data);
    }



    public function save_user()
    {
        if ($this->validate([
            'email_user' => [
                'label'  => 'Email',
                'rules'  => 'required|is_unique[user_login.email]',
                'errors' => [
                    'required' => '{field} harus di isi dan tidak boleh kosong',
                    'is_unique' => '{field} harus unik untuk setiap user'
                ]
            ], 'no_pengenal' => [
                'label'  => 'Identitas',
                'rules'  => 'required|is_unique[user_login.no_pengenal]',
                'errors' => [
                    'required' => 'Nomor identitas harus di isi',
                    'is_unique' => 'Nomor identitas harus unik untuk setiap user'
                ]
            ], 'pass' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[6]',
                'errors' => [
                    'required' => '{field} harus di isi dan tidak boleh kosong',
                    'min_length' => '{field} harus lebih dari 6 digit'
                ]
            ]
        ])) {
            $data = [
                'no_pengenal' => $this->request->getVar('no_pengenal'),
                'email' => $this->request->getVar('email_user'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
                'role' => 3
            ];


            $this->UserModel->save_user($data);

            session()->setFlashdata('pesan_false', "<div class='alert alert-success' role='alert'>Hubungi admin untuk melengkapi data</div>");
            return redirect()->to('/auth');
        } else {
            $errors = \Config\Services::validation();
            // dd($errors);
            return redirect()->to('/auth/register')->withInput()->with('validation', $errors);
        }
    }


    public function logout()
    {
        //view loding web 
        $data['loding_text'] = 'silahkan tunggu';
        echo view('auth/loding', $data);

        session()->remove('no_pengenal');
        session()->remove('role');
        session()->remove('logged_in');

        session()->setFlashdata('pesan', "<div class='alert alert-danger' role='alert'>Anda berhasil keluar ...</div>");
        return redirect()->to('/auth');
    }
}
