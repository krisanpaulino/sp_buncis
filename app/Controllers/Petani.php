<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PetaniModel;
use App\Models\UserModel;

class Petani extends BaseController
{
    public function index()
    {
        $model = new PetaniModel();
        $data_petani = $model->findAll();

        $data = [
            'title' => 'Petani',
            'data_petani' => $data_petani
        ];

        return view('petani/index', $data);
    }
    public function store()
    {
        $file = $this->request->getFile('petani_foto');
        // dd($file);
        //Buat User
        $model = new UserModel();
        $data = [
            'user_email' => $this->request->getPost('user_email'),
            'user_password' => 'qwerty123',
            'password_confirmation' => 'qwerty123',
            'user_type' => 'petani'
        ];

        if ($model->insert($data)) {
            $user_id = $model->getInsertID();

            $model = new PetaniModel();
            $data = $this->request->getPost();
            $data['user_id'] = $user_id;
            if (!empty($file)) {
                $filename = 'profile_' . $user_id . '.' . $file->getExtension();
                $path = './assets/img/profile';
                if ($file->move($path, $filename, true)) {
                    $data['petani_foto'] = $filename;
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
    public function detail($petani_id)
    {
        $model = new PetaniModel();
        $petani = $model->findPetani($petani_id);
        $data = [
            'title' => 'Detail Petani',
            'petani' => $petani
        ];
        return view('petani/detail', $data);
    }
    public function profil()
    {
        $petani = petani();
        $data = [
            'title' => 'Detail Petani',
            'petani' => $petani
        ];
        return view('petani/profil', $data);
    }
    public function update()
    {
        $data = $this->request->getPost();
        $model = new PetaniModel();
        $petani = $model->find($data['petani_id']);
        $file = $this->request->getFile('petani_foto');
        if (!empty($file)) {
            $filename = 'profile_' . $petani->user_id . '.' . $file->getExtension();
            $path = './assets/img/profile';
            if ($file->move($path, $filename, true)) {
                $data['petani_foto'] = $filename;
            }
        }
        if ($model->update($data['petani_id'], $data)) {
            return redirect()->back()->with('success', 'Data Berhasil Disimpan!');
        }
        return redirect()->to(previous_url())->with('errors', $model->errors())->with('danger', 'Data gagal disimpan!');
    }
    public function delete()
    {
        $model = new PetaniModel();
        $petani_id = $this->request->getPost('petani_id');
        $petani = $model->find($petani_id);
        $user_id = $petani->user_id;
        $model->where('petani_id', $petani_id);
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
        $user = $model->find($user_id);
        $data = [
            'user_id' => $user_id,
            'user_email' => $user->user_email,
            'user_password' => 'qwerty123',
            'password_confirmation' => 'qwerty123'
        ];
        // dd($data);
        $model->update($user_id, $data);
        return redirect()->back()
            ->with('success', 'Password berhasil direset!');
    }
}
