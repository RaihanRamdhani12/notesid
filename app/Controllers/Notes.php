<?php

namespace App\Controllers;

use App\Models\ModelNotes;

class Notes extends BaseController
{
    protected $ModelNotes;

    public function __construct()
    {
        $this->ModelNotes = new ModelNotes();
    }

    public function tambah_notes()
    {
        return view('tambah_notes'); 
    }
    
    public function proses_tambah_notes()
    {
        $request = \Config\Services::request();
        $this->validate([
            'judul' => 'required|min_length[3]|max_length[255]',
            'isi' => 'required',
            'tanggal' => 'required|valid_date'
        ]);

        // Data yang akan disimpan
        $data = [
            'id_user' => session()->get('id_user'),
            'judul' => $this->request->getPost('judul'),
            'isi' => $this->request->getPost('isi'),
            'tanggal' => $this->request->getPost('tanggal'),
        ];
        if ($this->ModelNotes->tambah_notes($data)) {
            return redirect()->to('/')->with('success', 'Catatan berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan catatan.');
        }
    }

    public function hapus_notes($id_notes)
    {
        $dapatkan_notes = $this->ModelNotes->dapatkan_notes($id_notes);
        if (isset($dapatkan_notes)) {
            $this->ModelNotes->hapus_notes($id_notes);
            session()->setFlashdata("success", "Berhasil Hapus Koleksi Buku");
            return redirect()->to(base_url('/'));
        } else {
            session()->setFlashdata("error", "Gagal Hapus Koleksi");
            return redirect()->to(base_url('/'));
        }
    }
}