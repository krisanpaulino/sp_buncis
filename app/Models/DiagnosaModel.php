<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'diagnosa';
    protected $primaryKey       = 'diagnosa_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'diagnosa_tgl',
        'petani_id',
        'diagnosa_deskripsi'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'diagnosa_tgl' => 'required',
        'petani_id' => 'required',
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

    public function findDiagnosa($petani_kode = null)
    {
        if ($petani_kode != null)
            $this->where('diagnosa.petani_id', $petani_kode);
        $this->join('penyakit', 'penyakit.penyakit_kode = diagnosa.diagnosa_deskripsi', 'left');
        $this->join('petani', 'petani.petani_id = diagnosa.petani_id');
        return $this->find();
    }

    public function getForDashboard($petani_id)
    {
        $this->where('diagnosa.petani_id', $petani_id);
        $this->join('penyakit', 'penyakit.penyakit_kode = diagnosa.diagnosa_deskripsi', 'left');
        $this->limit(5);
        return $this->find();
    }
    public function findCount()
    {
        $this->select('count(*) as jumlah');
        return $this->first()->jumlah;
    }
}
