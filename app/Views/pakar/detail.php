<?= $this->extend('layout_admin'); ?>
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
                    <li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('admin/pakar') ?>">Pakar</a></li>
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
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?= base_url('assets/img/profile/' . $pakar->pakar_foto) ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <form action="<?= base_url('admin/pakar/update') ?>" method="post" enctype="multipart/form-data">
                                        <!-- <h6 class="mb-0">Update Foto</h6> -->
                                        <div class="form-group mb-2">
                                            <input type="hidden" name="pakar_id" value="<?= $pakar->pakar_id ?>">
                                            <input type="file" class="form-control <?= (isset(session('errors')['pakar_foto'])) ? 'is-invalid' : '' ?>" id="pakar_foto" name="pakar_foto" value="<?= old('pakar_foto') ?>" required>
                                            <div class="invalid-feedback">
                                                <?php if (isset(session('errors')['pakar_foto'])) : ?>
                                                    <?= session('errors')['pakar_foto'] ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update Foto</button>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form action="<?= base_url('admin/pakar/update') ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Pribadi</h5>
                                <hr />
                                <input type="hidden" name="pakar_id" value="<?= $pakar->pakar_id ?>">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['pakar_nama'])) ? 'is-invalid' : '' ?>" id="pakar_nama" name="pakar_nama" value="<?= old('pakar_nama', $pakar->pakar_nama) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_nama'])) : ?>
                                                <?= session('errors')['pakar_nama'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Jenis Kelamin</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select <?= (isset(session('errors')['pakar_jk'])) ? 'is-invalid' : '' ?>" id="pakar_jk" name="pakar_jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" <?= (old('pakar_jk', $pakar->pakar_jk) == 'L') ? 'selected' : '' ?>>Laki - Laki</option>
                                            <option value="P" <?= (old('pakar_jk', $pakar->pakar_jk) == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_jk'])) : ?>
                                                <?= session('errors')['pakar_jk'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tempat Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['pakar_tempatlahir'])) ? 'is-invalid' : '' ?>" id="pakar_tempatlahir" name="pakar_tempatlahir" value="<?= old('pakar_tempatlahir', $pakar->pakar_tempatlahir) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_tempatlahir'])) : ?>
                                                <?= session('errors')['pakar_tempatlahir'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" class="form-control <?= (isset(session('errors')['pakar_tgllahir'])) ? 'is-invalid' : '' ?>" id="pakar_tgllahir" name="pakar_tgllahir" value="<?= old('pakar_tgllahir', $pakar->pakar_tgllahir) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_tgllahir'])) : ?>
                                                <?= session('errors')['pakar_tgllahir'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['pakar_alamat'])) ? 'is-invalid' : '' ?>" id="pakar_alamat" name="pakar_alamat" value="<?= old('pakar_alamat', $pakar->pakar_alamat) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_alamat'])) : ?>
                                                <?= session('errors')['pakar_alamat'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Pekerjaan</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['pakar_pekerjaan'])) ? 'is-invalid' : '' ?>" id="pakar_pekerjaan" name="pakar_pekerjaan" value="<?= old('pakar_pekerjaan', $pakar->pakar_pekerjaan) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_pekerjaan'])) : ?>
                                                <?= session('errors')['pakar_pekerjaan'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No. HP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['pakar_hp'])) ? 'is-invalid' : '' ?>" id="pakar_hp" name="pakar_hp" value="<?= old('pakar_hp', $pakar->pakar_hp) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['pakar_hp'])) : ?>
                                                <?= session('errors')['pakar_hp'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Simpan Perubahan" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Data Login</h5>
                                    <hr />
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <h6><?= $pakar->user_email ?></h6>
                                        </div>
                                    </div>
                                    <form action="<?= base_url('admin/pakar/reset-password') ?>" method="post">
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="hidden" name="user_id" value="<?= $pakar->user_id ?>">
                                                <input type="button" class="btn btn-primary px-4" value="Reset Password" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>