<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gejala';
    protected $primaryKey       = 'gejala_kode';
    protected $useAutoIncrement = true;
    protected $insertID         = '';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'gejala_nama',
        'gejala_foto'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'gejala_nama' => 'required',
        // 'gejala_foto' => 'required'
    ];
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

    public function findGejalaNotIn($penyakit_kode)
    {
        $this->select('gejala.*');
        $this->where("NOT EXISTS (SELECT * FROM petagejala WHERE petagejala.gejala_kode = gejala.gejala_kode AND petagejala.penyakit_kode = '$penyakit_kode')", null, false);
        $this->groupBy('gejala.gejala_kode');
        // $this->whereNotIn('petagejala.penyakit_kode', [$penyakit_kode]);
        return $this->find();
    }
}
