<?php

namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelNotes;


class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelNotes = new ModelNotes();

    }

    public function register()
    {
        $data = [
            'judul' => 'Register ',
            'validation' => \Config\Services::validation()

        ];
        echo view('register', $data);
    }

    public function proses_register_user()
{
    if (!$this->validate([
        'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Email Harus diisi !',
            ]
        ],
        'username' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Username Harus diisi !',
            ]
        ],
        'nama_lengkap' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama Lengkap Harus diisi !',
            ]
        ],
        'no_telpon' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nomor Telpon Harus diisi !',
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]',
            'errors' => [
                'required' => 'Password Harus diisi !',
                'min_length' => 'Password Minimal 8!',
            ]
        ],
    ])) {
        // session()->setFlashdata('info', 'Semua Data Harus Diisi');
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->to(base_url('register'))->withInput();	
    } else {
        $request = \Config\Services::request();
        $username = $request->getVar('username');
        $password = $request->getVar('password');
        $email = $request->getVar('email');
        $no_telpon = $request->getVar('no_telpon');
        $nama_lengkap = $request->getVar('nama_lengkap');
        $dapatkan_user = $this->ModelUser->dapatkan_user($email)->getRow();
        if ($dapatkan_user) {
            // echo 'EMAIL SUDAH DIGUNAKAN';
            session()->setFlashdata('info', 'Email Sudah Di gunakan');
            return redirect()->to(base_url('register'));
        } else {
                $data = [
                    'username' => $username,
                    'password' => $password,
                    'email' => $email,
                    'no_telpon' => $no_telpon,
                    'nama_lengkap' => $nama_lengkap,
                ];
                $tambah_user = $this->ModelUser->tambah_user($data);
                return redirect()->to(base_url('/login'));
            }
        }
    }

    public function login()
    {
        $data = [
            'judul' => 'Login ',
            'validation' => \Config\Services::validation()
        ];
        echo view('login', $data);
    }

    public function proses_login_user()
    {
        $request = \Config\Services::request();
        $email = $request->getVar('email');
        $password = $request->getVar('password');
        $dapatkan_user = $this->ModelUser->dapatkan_user($email)->getRow();
    
        if ($dapatkan_user) {
            // Memeriksa kecocokan password tanpa menggunakan password_verify
            if ($password === $dapatkan_user->password) {
                // Menyimpan data user ke dalam sesi
                session()->set([
                    'id_user' => $dapatkan_user->id_user,
                    'email' => $dapatkan_user->email,
                    'username' => $dapatkan_user->username,
                    'nama_lengkap' => $dapatkan_user->nama_lengkap,
                    'no_telpon' => $dapatkan_user->no_telpon,
                    'status_login' => TRUE,
                ]);
                session()->setFlashdata('success', 'Anda Berhasil Login');
                return redirect()->to(base_url('/'));
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to(base_url('/login'));
            }
        } else {
            session()->setFlashdata('error', 'Akun user Tidak Ditemukan!');
            return redirect()->to(base_url('/login'));
        }
    }

    public function keluar()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
    

    // public function profil_akun()
	// {
	// 	$email = session()->get('email');
	// 	$status_login = session()->get('status_login');
    //     $dapatkan_user = $this->ModelUser->dapatkan_user($email)->getRow();
	// 	if ($status_login == true) {
	// 		if ($dapatkan_user) {
	// 			$username = $dapatkan_user->username;
	// 			$nama_lengkap = $dapatkan_user->nama_lengkap;
	// 			$no_telpon = $dapatkan_user->no_telpon;
	// 			$password = $dapatkan_user->password;
	// 			$jenis_kelamin = $dapatkan_user->jenis_kelamin;

	// 			$data = [
	// 				// WAJIB START //
	// 				'email' => $email,
	// 				'username' => $username,
	// 				'nama_lengkap' => $nama_lengkap,
	// 				'no_telpon' => $no_telpon,
	// 				'status_login' => $status_login,
	// 				'password' => $password,
	// 				'jenis_kelamin' => $jenis_kelamin,
	// 			];
	// 			echo view('profil_akun', $data);
	// 		} else {
    //             session()->setFlashdata('error', 'Akun user Tidak Ditemukan!');
    //             return redirect()->to(base_url('/login'));
	// 		}
	// 	} else {
    //         return redirect()->to(base_url('/login'));
	// 	}
	}