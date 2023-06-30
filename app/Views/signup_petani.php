<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="<?= base_url('assets') ?>/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="<?= base_url('assets') ?>/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="<?= base_url('assets') ?>/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="<?= base_url('assets') ?>/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="<?= base_url('assets') ?>/css/pace.min.css" rel="stylesheet" />
	<script src="<?= base_url('assets') ?>/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="<?= base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/app.css" rel="stylesheet">
	<link href="<?= base_url('assets') ?>/css/icons.css" rel="stylesheet">
	<title>Signup Pelanggan</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Mendaftar Sebagai Petani</h3>
										<p>Sudah ada akun? <a href="<?= base_url('auth') ?>">Log In disini</a>
										</p>
									</div>
									<div class="login-separater text-center mb-4"> <span>DATA DIRI</span>
										<hr />
									</div>
									<div class="form-body">
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
										<form class="row g-3" action="<?= base_url('auth/signup') ?>" method="post">
											<div class="form-group mb-4">
												<label for="petani_nama">Nama petani</label>
												<input type="text" class="form-control <?= (isset(session('errors')['petani_nama'])) ? 'is-invalid' : '' ?>" id="petani_nama" name="petani_nama" value="<?= old('petani_nama') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_nama'])) : ?>
														<?= session('errors')['petani_nama'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_jk">Jenis Kelamin</label>
												<select class="form-select <?= (isset(session('errors')['petani_jk'])) ? 'is-invalid' : '' ?>" id="petani_jk" name="petani_jk" required>
													<option value="">Pilih Jenis Kelamin</option>
													<option value="L" <?= (old('petani_jk') == 'L') ? 'selected' : '' ?>>Laki - Laki</option>
													<option value="P" <?= (old('petani_jk') == 'P') ? 'selected' : '' ?>>Perempuan</option>
												</select>
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_jk'])) : ?>
														<?= session('errors')['petani_jk'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_tempatlahir">Tempat Lahir</label>
												<input type="text" class="form-control <?= (isset(session('errors')['petani_tempatlahir'])) ? 'is-invalid' : '' ?>" id="petani_tempatlahir" name="petani_tempatlahir" value="<?= old('petani_tempatlahir') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_tempatlahir'])) : ?>
														<?= session('errors')['petani_tempatlahir'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_tgllahir">Tanggal Lahir</label>
												<input type="date" class="form-control <?= (isset(session('errors')['petani_tgllahir'])) ? 'is-invalid' : '' ?>" id="petani_tgllahir" name="petani_tgllahir" value="<?= old('petani_tgllahir') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_tgllahir'])) : ?>
														<?= session('errors')['petani_tgllahir'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_alamat">Alamat</label>
												<input type="text" class="form-control <?= (isset(session('errors')['petani_alamat'])) ? 'is-invalid' : '' ?>" id="petani_alamat" name="petani_alamat" value="<?= old('petani_alamat') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_alamat'])) : ?>
														<?= session('errors')['petani_alamat'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_hp">No. HP</label>
												<input type="text" class="form-control <?= (isset(session('errors')['petani_hp'])) ? 'is-invalid' : '' ?>" id="petani_hp" name="petani_hp" value="<?= old('petani_hp') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_hp'])) : ?>
														<?= session('errors')['petani_hp'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="form-group mb-4">
												<label for="petani_foto">Foto</label>
												<input type="file" class="form-control <?= (isset(session('errors')['petani_foto'])) ? 'is-invalid' : '' ?>" id="petani_foto" name="petani_foto">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['petani_foto'])) : ?>
														<?= session('errors')['petani_foto'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="login-separater text-center mb-4"> <span>CREDENTIALS</span>
												<hr />
											</div>
											<div class="col-12">
												<label for="user_email">Email</label>
												<input type="email" class="form-control <?= (isset(session('errors')['user_email'])) ? 'is-invalid' : '' ?>" id="user_email" name="user_email" value="<?= old('user_email') ?>">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['user_email'])) : ?>
														<?= session('errors')['user_email'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="user_password">Password</label>
												<input type="password" class="form-control <?= (isset(session('errors')['user_password'])) ? 'is-invalid' : '' ?>" id="user_password" name="user_password">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['user_password'])) : ?>
														<?= session('errors')['user_password'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<label for="password_confirmation">Konfirmasi Password</label>
												<input type="password" class="form-control <?= (isset(session('errors')['password_confirmation'])) ? 'is-invalid' : '' ?>" id="password_confirmation" name="password_confirmation">
												<div class="invalid-feedback">
													<?php if (isset(session('errors')['password_confirmation'])) : ?>
														<?= session('errors')['password_confirmation'] ?>
													<?php endif; ?>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i>Sign up</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="<?= base_url('assets') ?>/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function() {
			$("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="<?= base_url('assets') ?>/js/app.js"></script>
</body>

</html>