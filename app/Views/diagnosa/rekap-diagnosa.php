<?= $this->extend('layout_' . type()); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(type()) ?>"><i class="bx bx-home-alt"></i></a>
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
            <h5 class="card-title">Data Diagnosa</h5>
            <hr />
            <!-- Your Content Here -->
            <div class="d-flex justify-content-start mb-3 row">
                <form action="<?= base_url('admin/diagnosa/rekapan') ?>" method="post" class="col row" style="width: auto;">
                    <div class="col-md-4">
                        <label for="">Dari</label>
                        <input type="date" name="tgldari" value="<?= ($tgldari != null) ? $tgldari : '' ?>" id="" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label for="">Sampai</label>
                        <input type="date" name="tglsampai" value="<?= $tglsampai ?>" id="" class="form-control">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </form>
                <form action="<?= base_url('admin/diagnosa/cetak-rekapan') ?>" class="col d-flex align-items-end">
                    <input type="hidden" name="tgldari" value="<?= $tgldari ?>">
                    <input type="hidden" name="tglsampai" value="<?= $tglsampai ?>">
                    <div class="">
                        <button type="submit" class="btn btn-warning">Cetak</button>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Penyakit</th>
                            <th>Jumlah Diagnosa</th>
                            <th>Presentase</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnosa as $diag) : ?>
                            <tr>
                                <?php if ($diag->diagnosa_deskripsi == null) : ?>
                                    <td><i>Data penyakit belum tersedia</i></td>
                                <?php elseif ($diag->penyakit_kode == null) : ?>
                                    <td><i>Penyakit diubah/dihapus</i></td>
                                <?php else : ?>
                                    <td><?= $diag->penyakit_nama ?></td>
                                <?php endif; ?>
                                <td><?= $diag->jumlah ?></td>
                                <td><?= $diag->jumlah / $jumlah->jumlah * 100 ?>%</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>