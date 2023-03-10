<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksibukuModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksibuku';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function transaksiTrigger()
    {
        $query = $this->db->query('CREATE TRIGGER log_insert_user AFTER INSERT ON user FOR EACH ROW begin
        INSERT INTO log_user(id_user,nama_user,email_user,waktu_terdaftar,keterangan)
        VALUES (NEW.id_user, NEW.nama_lengkap, NEW.email, NOW(), "insert data user baru");
        END');
        return $query;
    }
}
