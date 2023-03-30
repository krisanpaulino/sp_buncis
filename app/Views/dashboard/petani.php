<?= $this->extend('layout_petani'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
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
    <!-- <div class="d-flex justify-content-center"> -->
    <div class="row d-flex justify-content-center mb-4">
        <div class="col-md-12 text-center">
            <h2 class="">SELAMAT DATANG DI SISTEM PAKAR DIAGNOSA PENYAKIT TANAMAN BUNCIS <br> KELOMPOK TANI DABALULIK</h2>
        </div>
    </div>
    <!-- </div> -->

    <div class="row">
        <div class="col-lg-4 col-md-3">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?= base_url('assets/img/profile/' . $petani->petani_foto) ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                            <h4><?= $petani->petani_nama ?></h4>
                            <p class="text-secondary mb-1">Petani</p>
                            <p class="text-muted font-size-sm"><?= $petani->petani_alamat ?></p>
                            <a class="btn btn-outline-primary" href="<?= base_url('petani/profil') ?>">Edit Profil</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card radius-10">
                <div class="card-body">
                    <h5 class="card-title">Diagnosa Anda</h5>
                    <hr />
                    <?php if (!empty($diagnosa)) : ?>
                        <table class="table mb-4">
                            <tr>
                                <th>Tanggal</th>
                                <th>Hasil</th>
                            </tr>
                            <?php foreach ($diagnosa as $diag) : ?>
                                <tr>
                                    <td><?= $diag->diagnosa_tgl ?></td>
                                    <td><?= $diag->penyakit_nama ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div class="d-flex justify-content-end">
                            <a href="<?= base_url('petani/diagnosa') ?>" class="text-primary">Lihat Selengkapnya >></a>
                        </div>
                    <?php else : ?>
                        <p class="text-center">Anda Belum memiliki riawayat diagnosa. Pergi ke menu <b>Diagnosa</b> untuk mulai melakukan diagnosa.</p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>