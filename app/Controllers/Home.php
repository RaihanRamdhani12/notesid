<?php

namespace App\Controllers;
use App\Models\ModelUser;
use App\Models\ModelNotes;


class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelNotes = new ModelNotes();

    }
    
    public function home()
    {
        $status_login = session()->get('status_login');
        $email = session()->get('email');
        $nama_lengkap = session()->get('nama_lengkap');
        $id_user = session()->get('id_user');
        $username = session()->get('username');
        $dapatkan_user = $this->ModelUser->dapatkan_user($email)->getRow();
        $semua_notes = $this->ModelNotes->semua_notes($id_user);

        // $semua_buku = $this->ModelBuku->semua_buku();

        // $cari_buku = $this->request->getGet('cari_buku');
        // if ($cari_buku) {
        //     $semua_buku = $this->ModelBuku->cari_buku($cari_buku);
        // }
        $data = [
            'status_login' => $status_login,  
            'username' => $username,  
            'email' => $email,  
            'nama_lengkap' => $nama_lengkap,  
            'semua_notes' => $semua_notes,  
        ];
        return view('home', $data);
    }
}