<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelNotes extends Model
{
    protected $table = 'tb_notes'; 
    protected $primaryKey = 'id_notes'; 
    protected $allowedFields = ['id_notes', 'id_user' , 'judul', 'isi', 'tanggal']; 

    public function tambah_notes($data)
    {
        $builder = $this->db->table($this->table);
        return $this->insert($data);
    }

    public function dapatkan_notes()
    {
        return $this->findAll();
    }

    public function semua_notes($id_user)
    {
        $query = $this->db->table('tb_notes');
        $batasan = $query->select('*')
        ->join('tb_user', 'tb_user.id_user = tb_notes.id_user')
        ->where('tb_notes.id_user', $id_user)
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function hapus_notes($id_notes)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_notes' => $id_notes]);
    }
}