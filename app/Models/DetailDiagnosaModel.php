<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailDiagnosaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detaildiagnosa';
    protected $primaryKey       = 'detaildiagnosa_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'diagnosa_id',
        'gejala_kode',
        'detaildiagnosa_jawab',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'diagnosa_id' => 'required',
        'gejala_kode' => 'required',
        'detaildiagnosa_jawab' => 'required',
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

    public function findYa($diagnosa_id)
    {
        $this->where('diagnosa_id', $diagnosa_id);
        $this->where('detaildiagnosa_jawab', 'Ya');
        return $this->find();
    }
    public function findTidak($diagnosa_id)
    {
        $this->where('diagnosa_id', $diagnosa_id);
        $this->where('detaildiagnosa_jawab', 'Tidak');
        return $this->find();
    }
    public function findDetail($diagnosa_id)
    {
        $this->where('detaildiagnosa.diagnosa_id', $diagnosa_id);
        $this->join('gejala', 'gejala.gejala_kode = detaildiagnosa.gejala_kode');
        return $this->find();
    }
}
