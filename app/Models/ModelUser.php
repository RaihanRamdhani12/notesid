<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['id_user', 'nama_lengkap', 'username', 'password', 'email','no_telpon'];

    public function dapatkan_user($email = false)
    {
        if ($email === false) {
            return $this->findAll();
        } else {
            return $this->where('email', $email)->get();
        }
    }

    public function edit_user($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('email', $id);
        return $builder->update($data);
    }

    public function tambah_user($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function semua_user()
    {
        $query = $this->db->table($this->table);
        $batasan = $query->select('*')
            ->get()
            ->getResultArray();
        return $batasan;
    }

    public function total_user()
    {
        $query = $this->db->table($this->table)
            ->select('COUNT(DISTINCT id_user) as total_user')
            ->get();

        return $query->getRow();
    }
}