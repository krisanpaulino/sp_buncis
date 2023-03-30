<?php

namespace App\Models;

use CodeIgniter\Model;

class PakarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pakar';
    protected $primaryKey       = 'pakar_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pakar_nama', 'pakar_jk', 'pakar_alamat', 'pakar_hp', 'pakar_pekerjaan', 'pakar_foto', 'pakar_tempatlahir', 'pakar_tgllahir', 'user_id'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'pakar_nama' => 'required',
        'pakar_jk' => 'required',
        'pakar_alamat' => 'required',
        'pakar_hp' => 'required',
        'pakar_pekerjaan' => 'required',
        'pakar_foto' => 'required',
        'pakar_tempatlahir' => 'required',
        'pakar_tgllahir' => 'required'
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

    public function findPakar($pakar_id)
    {
        $this->join('user', 'user.user_id = pakar.user_id');
        return $this->find($pakar_id);
    }
    public function findCount()
    {
        $this->select('count(*) as jumlah');
        return $this->first()->jumlah;
    }
}
