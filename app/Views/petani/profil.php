<?= $this->extend('layout_petani'); ?>
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
                                <img src="<?= base_url('assets/img/profile/' . $petani->petani_foto) ?>" alt="Petani" class="rounded-circle p-1 bg-primary" width="110">
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                    <form action="<?= base_url('petani/profil/update') ?>" method="post" enctype="multipart/form-data">
                                        <!-- <h6 class="mb-0">Update Foto</h6> -->
                                        <div class="form-group mb-2">
                                            <input type="hidden" name="petani_id" value="<?= $petani->petani_id ?>">
                                            <input type="file" class="form-control <?= (isset(session('errors')['petani_foto'])) ? 'is-invalid' : '' ?>" id="petani_foto" name="petani_foto" value="<?= old('petani_foto') ?>" required>
                                            <div class="invalid-feedback">
                                                <?php if (isset(session('errors')['petani_foto'])) : ?>
                                                    <?= session('errors')['petani_foto'] ?>
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
                    <form action="<?= base_url('petani/profil/update') ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Data Pribadi</h5>
                                <hr />
                                <input type="hidden" name="petani_id" value="<?= $petani->petani_id ?>">
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['petani_nama'])) ? 'is-invalid' : '' ?>" id="petani_nama" name="petani_nama" value="<?= old('petani_nama', $petani->petani_nama) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_nama'])) : ?>
                                                <?= session('errors')['petani_nama'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Jenis Kelamin</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <select class="form-select <?= (isset(session('errors')['petani_jk'])) ? 'is-invalid' : '' ?>" id="petani_jk" name="petani_jk" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="L" <?= (old('petani_jk', $petani->petani_jk) == 'L') ? 'selected' : '' ?>>Laki - Laki</option>
                                            <option value="P" <?= (old('petani_jk', $petani->petani_jk) == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_jk'])) : ?>
                                                <?= session('errors')['petani_jk'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tempat Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['petani_tempatlahir'])) ? 'is-invalid' : '' ?>" id="petani_tempatlahir" name="petani_tempatlahir" value="<?= old('petani_tempatlahir', $petani->petani_tempatlahir) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_tempatlahir'])) : ?>
                                                <?= session('errors')['petani_tempatlahir'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="date" class="form-control <?= (isset(session('errors')['petani_tgllahir'])) ? 'is-invalid' : '' ?>" id="petani_tgllahir" name="petani_tgllahir" value="<?= old('petani_tgllahir', $petani->petani_tgllahir) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_tgllahir'])) : ?>
                                                <?= session('errors')['petani_tgllahir'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['petani_alamat'])) ? 'is-invalid' : '' ?>" id="petani_alamat" name="petani_alamat" value="<?= old('petani_alamat', $petani->petani_alamat) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_alamat'])) : ?>
                                                <?= session('errors')['petani_alamat'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">No. HP</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="text" class="form-control <?= (isset(session('errors')['petani_hp'])) ? 'is-invalid' : '' ?>" id="petani_hp" name="petani_hp" value="<?= old('petani_hp', $petani->petani_hp) ?>">
                                        <div class="invalid-feedback">
                                            <?php if (isset(session('errors')['petani_hp'])) : ?>
                                                <?= session('errors')['petani_hp'] ?>
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
                                            <h6><?= $petani->user_email ?></h6>
                                        </div>
                                    </div>
                                    <form action="<?= base_url('petani/profil/reset-password') ?>" method="post">
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="hidden" name="user_id" value="<?= $petani->user_id ?>">
                                                <input type="submit" class="btn btn-primary px-4" value="Reset Password" />
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