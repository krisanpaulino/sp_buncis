<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class Berita extends BaseController
{
    public function index()
    {
        $model = new BeritaModel();
        $berita = $model->findAll();

        $data = [
            'title' => 'Berita',
            'berita' => $berita
        ];

        return view('berita/index-' . type(), $data);
    }

    public function tambah()
    {
        return view('berita/tambah', ['title' => 'Tambah Berita']);
    }

    public function store()
    {
        $data = $this->request->getPost();
        $file = $this->request->getFile('file');
        $model = new BeritaModel();
        $data['file'] = 'default.png';
        $data['berita_tgl'] = date('Y-m-d');
        if ($berita_id = $model->insert($data, true)) {
            if (!empty($file)) {
                $filename = 'thumbnail' . $berita_id . '.' . $file->getExtension();
                $path = './assets/img/profile';
                if ($file->move($path, $filename, true)) {
                    $update['berita_thumbnail'] = $filename;
                }
                $model->where('berita_id', $berita_id);
                $model->update($berita_id, $update);
            }

            return redirect()->to('admin/berita')->with('success', 'Berita Ditambahkan');
        }
        return redirect()->to(previous_url())
            ->with('errors', $model->errors())
            ->withInput();
    }

    public function detail($berita_id)
    {
        $model = new BeritaModel();
        $berita = $model->find($berita_id);
        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita
        ];

        return view('berita/detail-admin', $data);
    }
    public function detailPetani($berita_id)
    {
        $model = new BeritaModel();
        $berita = $model->find($berita_id);
        $data = [
            'title' => 'Detail Berita',
            'berita' => $berita
        ];

        return view('berita/detail-petani', $data);
    }

    public function update()
    {
        $data = [
            'berita_judul' => $this->request->getPost('berita_judul'),
            'berita_isi' => $this->request->getPost('berita_isi'),
            'berita_highlight' => $this->request->getPost('berita_highlight'),
        ];
        if ($data['berita_highlight'] == null)
            $data['berita_highlight'] = 0;
        $berita_id = $this->request->getPost('berita_id');
        $file = $this->request->getFile('file');
        $model = new BeritaModel();
        if (!empty($file) && $file->isValid()) {
            $filename = 'thumbnail' . $berita_id . '.' . $file->getExtension();
            $path = './assets/img/profile';
            if ($file->move($path, $filename, true)) {
                $data['berita_thumbnail'] = $filename;
            }
        }
        $model->where('berita_id', $berita_id);
        $model->update($berita_id, $data);
        return redirect()->to(previous_url())->with('success', 'Berita Diupdate');
    }

    public function delete()
    {
        $berita_id = $this->request->getPost('berita_id');
        $model = new BeritaModel();
        $model->where('berita_id', $berita_id);
        $model->delete($berita_id);
        return redirect()->to(previous_url())->with('success', 'Berita Dihapus');
    }
}
