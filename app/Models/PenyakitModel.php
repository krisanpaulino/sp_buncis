<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'penyakit';
    protected $primaryKey       = 'penyakit_kode';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'penyakit_nama',
        'penyakit_detail',
        'penyakit_solusi',
        'penyakit_foto'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'penyakit_nama' => 'required',
        'penyakit_detail' => 'required',
        'penyakit_solusi' => 'required',
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

    public function getPenyakitByAnswer($ya, $tidak, $penyakit_kode = null, $jumlahgejala = null)
    {

        $this->select('penyakit.*, count(petagejala.petagejala_id) as jumlahgejala');
        $this->join('petagejala', 'petagejala.penyakit_kode = penyakit.penyakit_kode');
        $this->join('gejala', 'petagejala.gejala_kode = gejala.gejala_kode');
        // dd($tidak);
        if ($ya != null)
            $this->whereIn('petagejala.gejala_kode', $ya);
        if ($tidak != null) {
            $tidak = implode(',', $tidak);
            $this->where("NOT EXISTS(SELECT * FROM petagejala a where a.penyakit_kode = penyakit.penyakit_kode AND a.gejala_kode IN ($tidak))", null, false);
        }
        if ($penyakit_kode != null) {
            $this->whereNotIn('penyakit.penyakit_kode', $penyakit_kode);
        }
        $this->groupBy('penyakit.penyakit_kode');
        if ($jumlahgejala != null)
            $this->having('jumlahgejala >=', $jumlahgejala, false);
        if ($ya != null || $tidak != null)
            $this->orderBy('jumlahgejala', 'desc');
        $this->orderBy('penyakit.penyakit_kode', 'asc');
        // dd($this->builder->getCompiledSelect());
        return $this->first();
    }
    public function findCount()
    {
        $this->select('count(*) as jumlah');
        return $this->first()->jumlah;
    }
}
