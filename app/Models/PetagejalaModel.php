<?php

namespace App\Models;

use CodeIgniter\Model;

class PetagejalaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'petagejala';
    protected $primaryKey       = 'petagejala_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'penyakit_kode',
        'gejala_kode'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'penyakit_kode' => 'required',
        'gejala_kode' => 'required'
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

    public function findGejala($penyakit_kode)
    {
        $this->where('petagejala.penyakit_kode', $penyakit_kode);
        $this->join('gejala', 'gejala.gejala_kode = petagejala.gejala_kode');
        return $this->find();
    }
    public function isExists($penyakit_kode, $gejala_kode)
    {
        $this->where('penyakit_kode', $penyakit_kode);
        $this->where('gejala_kode', $gejala_kode);
        return $this->find() === null;
    }
    public function findNextGejala($penyakit_kode, $jawaban)
    {
        $this->join('gejala', 'gejala.gejala_kode = petagejala.gejala_kode');
        $this->where('petagejala.penyakit_kode', $penyakit_kode);
        if ($jawaban != null)
            $this->whereNotIn('petagejala.gejala_kode', $jawaban);
        return $this->first();
    }
}
