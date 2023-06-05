<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use App\Models\PetagejalaModel;

class Penyakit extends BaseController
{
    public function index()
    {
        $model = new PenyakitModel();
        $data_penyakit = $model->findAll();
        $data = [
            'title' => 'Data Penyakit',
            'data_penyakit' => $data_penyakit
        ];
        return view('penyakit/index', $data);
    }
    public function tambah()
    {
        $penyakit = new PenyakitModel();
        $data['title'] = 'Tambah Penyakit';
        $data['form_title'] = 'Tambah Penyakit';
        $data['penyakit'] = $penyakit;
        return view('penyakit/form', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $model = new PenyakitModel();
        $file = $this->request->getFile('file');
        if ($penyakit_id = $model->insert($data)) {
            if (!empty($file) && $file->isValid()) {
                // dd($penyakit_id);
                $filename = 'penyakit' . $penyakit_id . '.' . $file->getExtension();
                $path = './assets/img/penyakit';
                if ($file->move($path, $filename, true)) {
                    $input['penyakit_foto'] = $filename;
                    $model->update($penyakit_id, $input);
                }
            }
            return redirect()->to(session('user')->user_type . '/penyakit')
                ->with('success', 'Data Penyakit berhasil disimpan!!');
        } else {
            $errors = $model->errors();
            if (!empty($model->errors())) {
                return redirect()->back()
                    ->with('errors', $errors)
                    ->with('danger', 'Periksa kembali data penyakit!')
                    ->withInput();
            } else {
                return redirect()->to(session('user')->user_type . '/penyakit')
                    ->with('success', 'Data Penyakit berhasil disimpan!!');
            }
        }
    }
    public function update()
    {
        $penyakit_kode = $this->request->getPost('penyakit_kode');
        $file = $this->request->getFile('file');
        $data = [
            'penyakit_nama' => $this->request->getPost('penyakit_nama'),
            'penyakit_detail' => $this->request->getPost('penyakit_detail'),
            'penyakit_solusi' => $this->request->getPost('penyakit_solusi'),
        ];
        if (!empty($file) && $file->isValid()) {
            $filename = 'penyakit' . $penyakit_kode . '.' . $file->getExtension();
            $path = './assets/img/penyakit';
            if ($file->move($path, $filename, true)) {
                $data['penyakit_foto'] = $filename;
            }
        }
        $model = new PenyakitModel();

        if ($model->update($penyakit_kode, $data)) {
            return redirect()->back()
                ->with('success', 'Data Penyakit berhasil disimpan!!');
        } else {
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('danger', 'Periksa kembali data penyakit!')
                ->withInput();
        }
    }
    public function detail($penyakit_kode)
    {
        $model = new PenyakitModel();
        $penyakit = $model->find($penyakit_kode);

        $data = [
            'title' => 'Detail Penyakit',
            'penyakit' => $penyakit
        ];
        $data['form_title'] = 'Update Penyakit';

        return view('penyakit/form', $data);
    }


    public function delete()
    {
        $penyakit_kode = $this->request->getPost('penyakit_kode');
        $model = new PenyakitModel();
        $model->where('penyakit_kode', $penyakit_kode);
        $model->delete();

        return redirect()->back()->with('success', 'Data penyakit berhasil dihapus');
    }

    public function gejala($penyakit_kode)
    {
        $model = new PenyakitModel();
        $penyakit = $model->find($penyakit_kode);

        $model = new PetagejalaModel();
        $petagejala = $model->findGejala($penyakit_kode);

        $data = [
            'title' => 'Gejala Penyakit',
            'penyakit' => $penyakit,
            'petagejala' => $petagejala
        ];

        return view('penyakit/gejala', $data);
    }

    public function tambahGejala($penyakit_kode)
    {
        $model = new PenyakitModel();
        $penyakit = $model->find($penyakit_kode);

        $model = new GejalaModel();
        $petagejala = $model->findGejalaNotIn($penyakit_kode);
        // dd($model->getLastQuery());
        // dd($petagejala);
        $data = [
            'title' => 'Tambah Gejala',
            'penyakit' => $penyakit,
            'petagejala' => $petagejala
        ];

        return view('penyakit/tambah-gejala', $data);
    }

    public function storeGejala()
    {
        $penyakit_kode = $this->request->getPost('penyakit_kode');
        $gejala = $this->request->getPost('gejala');


        if (!empty($gejala)) {
            foreach ($gejala as $gejala_kode) {
                $model = new PetagejalaModel();
                if (!$model->isExists($penyakit_kode, $gejala_kode)) {
                    // dd($penyakit_kode);
                    $data = [
                        'penyakit_kode' => $penyakit_kode,
                        'gejala_kode' => $gejala_kode,
                    ];
                    $model->insert($data);
                }
            }
            return redirect()->back()
                ->with('success', 'Gejala berhasil ditambahkan pada penyakit!');
        } else {
            return redirect()->back()
                ->with('warning', 'Anda belum memilih gejala!');
        }
    }

    public function deleteGejala()
    {
        $petagajala_id = $this->request->getPost('petagejala_id');
        $model = new PetagejalaModel();
        $model->where('petagejala_id', $petagajala_id);
        $model->delete();

        return redirect()->back()
            ->with('success', 'Gejala berhasil dihapus dari penyakit!');
    }

    public function showPetani()
    {
        $model = new PenyakitModel();
        $data_penyakit = $model->findAll();

        $data = [
            'title' => 'Data Penyakit',
            'data_penyakit' => $data_penyakit
        ];
        return view('penyakit/index-petani', $data);
    }
    public function detailPetani($penyakit_kode)
    {
        $model = new PenyakitModel();
        $penyakit = $model->find($penyakit_kode);
        $model = new PetagejalaModel();
        $petagejala = $model->findGejala($penyakit_kode);

        $data = [
            'title' => 'Detail Penyakit',
            'penyakit' => $penyakit,
            'petagejala' => $petagejala
        ];

        return view('penyakit/detail-petani', $data);
    }
}
