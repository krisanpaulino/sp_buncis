<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PakarModel;
use App\Models\PetaniModel;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        if (session()->has('user')) {
            return redirect()->to(session()->get('user')->user_type);
        }
        return view('login');
    }

    public function login()
    {
        $model = new UserModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $user = $model->getLoginData($email);
        // dd($user->user_password);
        if ($user == null) {
            return redirect()->to(previous_url())
                ->with('danger', 'Username tidak ditemukan!');
        }

        if (!password_verify($password, $user->user_password)) {
            return redirect()->to(previous_url())
                ->with('danger', 'Password Salah!');
        }


        switch ($user->user_type) {
            case 'pakar':
                $model = new PakarModel();

                $data = [
                    'user' => $user,
                    'pakar' => $model->where('user_id', $user->user_id)->first(),
                    'pakar_logged_in' => 1,
                ];
                session()->set($data);
                return redirect()->to('pakar');
                break;
            case 'admin':
                $data = [
                    'user' => $user,
                    'admin_logged_in' => 1,
                ];
                session()->set($data);
                return redirect()->to('admin');
                break;
            case 'petani':
                $model = new PetaniModel();

                $data = [
                    'user' => $user,
                    'petani_logged_in' => 1,
                    'petani' => $model->where('user_id', $user->user_id)->first(),
                ];
                session()->set($data);
                return redirect()->to('petani');
                break;
            default:
                return redirect()->to('/');
                break;
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('auth');
    }
}
