<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\DiagnosaModel;
use App\Models\PakarModel;
use App\Models\PenyakitModel;
use App\Models\PetaniModel;

class Home extends BaseController
{
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->to(session()->get('user')->user_type);
        }
        return redirect()->to('auth');
    }
    public function pakar()
    {
        $data['title'] = 'Dashboard';
        $model = new DiagnosaModel();
        $data['jumlah_diagnosa'] = $model->findCount();
        $model = new PenyakitModel();
        $data['jumlah_penyakit'] = $model->findCount();

        return view('dashboard/pakar', $data);
    }
    public function admin()
    {
        $data['title'] = 'Dashboard';
        $model = new PetaniModel();
        $data['jumlah_petani'] = $model->findCount();
        $model = new PakarModel();
        $data['jumlah_pakar'] = $model->findCount();
        $model = new DiagnosaModel();
        $data['jumlah_diagnosa'] = $model->findCount();
        $model = new PenyakitModel();
        $data['jumlah_penyakit'] = $model->findCount();

        return view('dashboard/admin', $data);
    }
    public function petani()
    {
        $model = new DiagnosaModel();
        $diagnosa = $model->getForDashboard(petani()->petani_id);
        $petani = petani();
        $model = new BeritaModel();
        $berita = $model->findHighlight();
        $data = [
            'title' => 'Dashboard',
            'diagnosa' => $diagnosa,
            'petani' => $petani,
            'berita' => $berita
        ];
        return view('dashboard/petani', $data);
    }
}
