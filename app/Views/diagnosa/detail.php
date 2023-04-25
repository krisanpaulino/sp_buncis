<?= $this->extend('layout_' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url(type() . '/diagnosa') ?>">Diagnosa</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white"><?= session('success') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (session()->has('danger')) : ?>
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white"><?= session('danger') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Hasil Diagnosa</h5>
            <hr />
            <p class="ms-0">
                Tanggal Diagnosa : <?= $diagnosa->diagnosa_tgl ?>
            </p>

            <!-- Your Content Here -->
            <table id="" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Gejala</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($detaildiagnosa as $detail) : ?>
                        <tr>
                            <td><?= $detail->gejala_nama ?></td>
                            <td><b><?= $detail->detaildiagnosa_jawab ?></b></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <hr>
            <?php if ($diagnosa->diagnosa_deskripsi == 'Tidak ditemukan.') : ?>
                <p>Hasil : Penyakit dengan gejala yang anda pilih belum ada pada daftar penyakit yang tersedia. Mohon hubungi Pakar untuk informasi lebih lanjut.</b></p>
            <?php else : ?>
                <p>Hasil : Tanaman buncis anda terserang <b><?= $penyakit->penyakit_nama ?></b>.</p>
                <img src="<?= base_url('assets/img/penyakit/' . $penyakit->penyakit_foto) ?>" alt="" class="img-fluid">
                <h6>Saran Penanganan/Pencegahan :</h6>
                <p><?= $penyakit->penyakit_solusi ?></p>
            <?php endif ?>
            <div class="d-flex justify-content-end">
                <a href="<?= base_url(type() . '/diagnosa/' . $diagnosa->diagnosa_id . '/cetak') ?>" class="btn btn-primary"> <i class="bx bx-printer"></i> Cetak</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>