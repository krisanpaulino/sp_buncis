<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GejalaModel;

class Gejala extends BaseController
{
    public function index()
    {
        $model = new GejalaModel();
        $data_gejala = $model->findAll();
        $data = [
            'title' => 'Data Gejala',
            'data_gejala' => $data_gejala
        ];
        return view('gejala/index', $data);
    }
    public function store()
    {
        $data = $this->request->getPost();
        $model = new GejalaModel();
        $file = $this->request->getFile('file');
        if ($gejala_id = $model->insert($data, true)) {
            if (!empty($file)) {
                // dd($gejala_id);
                $filename = 'gejala' . $gejala_id . '.' . $file->getExtension();
                $path = './assets/img/gejala';
                if ($file->move($path, $filename, true)) {
                    $input['gejala_foto'] = $filename;
                    $model->update($gejala_id, $input);
                }
            }
            return redirect()->to(session('user')->user_type . '/gejala')
                ->with('success', 'Data Gejala berhasil disimpan!!')
                ->with('errors', $model->errors());
        } else {
            $errors = $model->errors();
            if (!empty($model->errors())) {
                return redirect()->back()
                    ->with('errors', $errors)
                    ->with('danger', 'Periksa kembali data gejala!')
                    ->withInput();
            } else {
                return redirect()->to(session('user')->user_type . '/gejala')
                    ->with('success', 'Data gejala berhasil disimpan!!');
            }
        }
    }
    public function update()
    {
        $gejala_kode = $this->request->getPost('gejala_kode');
        $file = $this->request->getFile('file');
        $data = [
            'gejala_nama' => $this->request->getPost('gejala_nama'),
        ];
        if (!empty($file) && $file->isValid()) {
            // dd($gejala_id);
            $filename = 'gejala' . $gejala_kode . '.' . $file->getExtension();
            $path = './assets/img/gejala';
            if ($file->move($path, $filename, true)) {
                $data['gejala_foto'] = $filename;
            }
        }
        $model = new GejalaModel();

        if ($model->update($gejala_kode, $data)) {
            return redirect()->back()
                ->with('success', 'Data gejala berhasil disimpan!!');
        } else {
            return redirect()->back()
                ->with('errors', $model->errors())
                ->with('danger', 'Periksa kembali data gejala!')
                ->withInput();
        }
    }
    public function delete()
    {
        $gejala_kode = $this->request->getPost('gejala_kode');
        $model = new GejalaModel();
        $model->where('gejala_kode', $gejala_kode);
        $model->delete();

        return redirect()->back()->with('success', 'Data gejala berhasil dihapus!');
    }
}
