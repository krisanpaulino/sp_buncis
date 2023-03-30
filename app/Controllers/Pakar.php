<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PakarModel;
use App\Models\UserModel;

class Pakar extends BaseController
{
    public function index()
    {
        $model = new PakarModel();
        $data = [
            'title' => 'Pakar',
            'data_pakar' => $model->findAll()
        ];
        return view('pakar/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('pakar_foto');
        // dd($file);
        //Buat User
        $model = new UserModel();
        $data = [
            'user_email' => $this->request->getPost('user_email'),
            'user_password' => '12345',
            'password_confirmation' => '12345',
            'user_type' => 'pakar'
        ];

        if ($model->insert($data)) {
            $user_id = $model->getInsertID();

            $model = new PakarModel();
            $data = $this->request->getPost();
            $data['user_id'] = $user_id;
            if (!empty($file)) {
                $filename = 'profile_' . $user_id . '.' . $file->getExtension();
                $path = './assets/img/profile';
                if ($file->move($path, $filename, true)) {
                    $data['pakar_foto'] = $filename;
                }
            }
            if ($model->insert($data)) {
                return redirect()->to(previous_url())
                    ->with('success', 'Data berhasil disimpan!');
            } else {
                $errors = $model->errors();
                //Hapus User
                $model = new UserModel();
                $model->where('user_id', $user_id);
                $model->delete($user_id);
                // dd($errors);
                return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $errors)->withInput();
            }
        } else {
            // dd($model->errors());
            return redirect()->to(previous_url())->with('danger', 'Data Gagal Disimpan. Cek Kembali Data Yang Dimasukkan!!')->with('errors', $model->errors())->withInput();
        }
    }
    public function detail($pakar_id)
    {
        $model = new PakarModel();
        $pakar = $model->findPakar($pakar_id);
        $data = [
            'title' => 'Detail Pakar',
            'pakar' => $pakar
        ];
        return view('pakar/detail', $data);
    }

    public function update()
    {
        $data = $this->request->getPost();
        $model = new PakarModel();
        $pakar = $model->find($data['pakar_id']);
        $file = $this->request->getFile('pakar_foto');
        if (!empty($file)) {
            $filename = 'profile_' . $pakar->user_id . '.' . $file->getExtension();
            $path = './assets/img/profile';
            if ($file->move($path, $filename, true)) {
                $data['pakar_foto'] = $filename;
            }
        }
        if ($model->update($data['pakar_id'], $data)) {
            return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
        }
        return redirect()->to(previous_url())->with('errors', $model->errors())->with('danger', 'Data gagal disimpan!');
    }
    public function delete()
    {
        $model = new PakarModel();
        $pakar_id = $this->request->getPost('pakar_id');
        $pakar = $model->find($pakar_id);
        $user_id = $pakar->user_id;
        $model->where('pakar_id', $pakar_id);
        $model->delete();

        $model = new UserModel();
        $model->where('user_id', $user_id);
        $model->delete();

        return redirect()->back()
            ->with('success', 'Data berhasil dihapus!');
    }
    public function resetPassword()
    {
        $model = new UserModel();
        $user_id = $this->request->getPost('user_id');
        $data = [
            'user_password' => '12345',
            'password_confirmation' => '12345'
        ];
        $model->update($user_id, $data);
        return redirect()->back()
            ->with('success', 'Password berhasil direset!');
    }
}
