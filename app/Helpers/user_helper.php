<?php

use App\Models\PakarModel;
use App\Models\PetaniModel;

function petani()
{
    $model = new PetaniModel();
    $model->join('user', 'user.user_id = petani.user_id');
    return $model->where('petani.user_id', session('user')->user_id)->first();
}
function pakar()
{
    $model = new PakarModel();
    $model->join('user', 'user.user_id = pakar.user_id');
    return $model->where('pakar.user_id', session('user')->user_id)->first();
}

function getGejalaID($detaildiagnosa)
{
    if ($detaildiagnosa == null)
        return null;
    $gejala = [];
    foreach ($detaildiagnosa as $key => $diagnosa) {
        $gejala[$key] = $diagnosa->gejala_kode;
    }
    return $gejala;
}
function type()
{
    return session('user')->user_type;
}
