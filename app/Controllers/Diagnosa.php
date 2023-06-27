<?php

namespace App\Controllers;

// require_once '../Libraries/PDFGenerator.php';

use App\Controllers\BaseController;
use App\Models\DetailDiagnosaModel;
use App\Models\DiagnosaModel;
use App\Models\PenyakitModel;
use App\Models\PetagejalaModel;
use App\Libraries\Pdfgenerator;

class Diagnosa extends BaseController
{
    public function index()
    {
        $petani = petani();

        $model = new DiagnosaModel();

        $diagnosa = $model->findDiagnosa($petani->petani_id);
        $data = [
            'title' => 'Diagnosa',
            'diagnosa' => $diagnosa
        ];

        return view('diagnosa/index_petani', $data);
    }
    public function indexAdmin()
    {
        $model = new DiagnosaModel();

        $diagnosa = $model->findDiagnosa();
        $data = [
            'title' => 'Diagnosa',
            'diagnosa' => $diagnosa
        ];

        return view('diagnosa/index-admin', $data);
    }

    public function mulai()
    {
        $data['title'] = 'Mulai Diagnosa';
        return view('diagnosa/starter', $data);
    }

    public function createDiagnosa()
    {
        $model = new DiagnosaModel();
        $data = [
            'petani_id' => petani()->petani_id,
            'diagnosa_tgl' => date('Y-m-d'),
        ];
        $diagnosa_id = $model->insert($data, true);
        return redirect()->to('petani/diagnosa/proses/' . $diagnosa_id);
    }

    public function proses($diagnosa_id)
    {
        $gejala_kode = $this->request->getPost('gejala_kode');
        $jawaban = $this->request->getPost('jawaban');
        //Jawaban Kalau sudah ada langsung simpan.
        $model = new DetailDiagnosaModel();
        if (!empty($gejala_kode) && !empty($jawaban)) {
            $data = [
                'gejala_kode' => $gejala_kode,
                'detaildiagnosa_jawab' => $jawaban,
                'diagnosa_id' => $diagnosa_id
            ];
            $model->insert($data);
        }
        // Cari detail diagnosa yang sudah diisi untuk lihat jawaban 'Ya' dan 'Tidak'
        //Ya
        $gejala_ya = $model->findYa($diagnosa_id);
        //Tidak
        $gejala_tidak = $model->findTidak($diagnosa_id);

        //semua yang sudah dijawab
        $jawaban_gejala = $model->where('diagnosa_id', $diagnosa_id)->find();

        //Cari Penyakit Berdasarkan Jawaban
        $model = new PenyakitModel();
        // $penyakit = $model->getPenyakitByAnswer(getGejalaID($gejala_ya), getGejalaID($gejala_tidak));
        $penyakit = $model->getPenyakitByAnswer(getGejalaID($gejala_ya), null);
        if ($gejala_ya == null)
            $penyakit = $model->getPenyakitByAnswer(null, getGejalaID($gejala_tidak));

        // dd($penyakit);
        //kalau penyakit tidak ada lagi maka proses berhenti karena tidak ada penyakit.
        if (empty($penyakit)) {
            $data = [
                'diagnosa_deskripsi' => 'Tidak ditemukan.'
            ];
            $model = new DiagnosaModel();
            $model->update($diagnosa_id, $data);
            return redirect()->to('petani/diagnosa/' . $diagnosa_id);
        }

        //Lanjut.
        //cari gejala berikut berdasarkan '$jawaban_gejala. Tampilkan yang belum ditanya.
        //Kalau gejala kosong alternatif penyakit lain
        $next_penyakit = $penyakit;
        $not_penyakit = [];
        $gejala = null;
        while (!empty($next_penyakit)) {
            $model = new PetagejalaModel();
            $gejala = $model->findNextGejala($penyakit->penyakit_kode, getGejalaID($jawaban_gejala));
            if ($gejala == null) {
                array_push($not_penyakit, $penyakit->penyakit_kode);
                $model = new PenyakitModel();
                $next_penyakit = $model->getPenyakitByAnswer(getGejalaID($gejala_ya), getGejalaID($gejala_tidak), $not_penyakit, $penyakit->jumlahgejala);
                if ($next_penyakit != null)
                    $penyakit = $next_penyakit;
            } else {
                $next_penyakit = null;
            }
            // dd($penyakit);
        }

        // dd($not_penyakit);

        //Kalau Sudah tidak ada gejala lagi berarti sudah dapat penyakit.
        //redirect ke halaman hasil.
        if (empty($gejala)) {
            $data = [
                'diagnosa_deskripsi' => $penyakit->penyakit_kode
            ];
            $model = new DiagnosaModel();
            $model->update($diagnosa_id, $data);
            return redirect()->to('petani/diagnosa/' . $diagnosa_id);
        }
        //gas view untuk pilih gejala
        $data = [
            'title' => 'Proses Diagnosa',
            'diagnosa_id' => $diagnosa_id,
            'gejala' => $gejala
        ];
        return view('diagnosa/diagnosa', $data);
    }
    public function hasil($diagnosa_id)
    {
        $model = new DiagnosaModel();
        $diagnosa = $model->find($diagnosa_id);
        $model = new DetailDiagnosaModel();
        $detaildiagnosa = $model->findDetail($diagnosa_id);
        $model = new PenyakitModel();
        $penyakit = $model->find($diagnosa->diagnosa_deskripsi);
        $data = [
            'title' => 'Hasil Diagnosa',
            'diagnosa' => $diagnosa,
            'detaildiagnosa' => $detaildiagnosa,
            'penyakit' => $penyakit
        ];

        return view('diagnosa/detail', $data);
    }
    public function cetakHasil($diagnosa_id)
    {
        $model = new DiagnosaModel();
        $diagnosa = $model->findOne($diagnosa_id);
        $model = new DetailDiagnosaModel();
        $detaildiagnosa = $model->findDetail($diagnosa_id);
        $model = new PenyakitModel();
        $penyakit = $model->find($diagnosa->diagnosa_deskripsi);
        $data = [
            'title' => 'Hasil Diagnosa',
            'diagnosa' => $diagnosa,
            'detaildiagnosa' => $detaildiagnosa,
            'penyakit' => $penyakit
        ];

        $file_pdf = 'laporan_diagnosa';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('diagnosa/detailpdf', $data);

        // run dompdf
        $pdf = new Pdfgenerator();
        $pdf->generate($html, $file_pdf, $paper, $orientation);
    }
    public function delete()
    {
        $diagnosa_id = $this->request->getPost('diagnosa_id');
        $model = new DiagnosaModel();
        $model->where('diagnosa_id', $diagnosa_id);
        $model->delete();

        return redirect()->back()
            ->with('success', 'Berhasil hapus!');
    }

    public function rekapanDiagnosa()
    {
        $tgldari = $this->request->getPost('tgldari');
        $tglsampai = $this->request->getPost('tglsampai');
        // dd($this->request->getPost());
        $model = new DiagnosaModel();
        $diagnosa = $model->findRekapan($tgldari, $tglsampai);
        $jumlah = $model->getSum($tgldari, $tglsampai);

        $data = [
            'title' => 'Rekapan Diagnosa',
            'diagnosa' => $diagnosa,
            'tgldari' => $tgldari,
            'tglsampai' => $tglsampai,
            'jumlah' => $jumlah,
        ];

        return view('diagnosa/rekap-diagnosa', $data);
    }
    public function cetakRekapan()
    {
        $tgldari = $this->request->getPost('tgldari');
        $tglsampai = $this->request->getPost('tglsampai');
        // dd($this->request->getPost());
        $model = new DiagnosaModel();
        $diagnosa = $model->findRekapan($tgldari, $tglsampai);
        $jumlah = $model->getSum($tgldari, $tglsampai);

        $data = [
            'title' => 'Rekapan Diagnosa',
            'diagnosa' => $diagnosa,
            'tgldari' => $tgldari,
            'tglsampai' => $tglsampai,
            'jumlah' => $jumlah,
        ];
        $file_pdf = 'laporan_rekap_diagnosa';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";

        $html = view('diagnosa/rekapan-pdf', $data);

        // run dompdf
        $pdf = new Pdfgenerator();
        $pdf->generate($html, $file_pdf, $paper, $orientation);
    }
}
