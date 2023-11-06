<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title; ?></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class="container d-flex justify-content-center align-items-center">
		<div class="card col-md-7 my-5">
			<div class="card-header">
				<h3>Register</h3>
			</div>
			<div class="card-body">
				<form action="<?= base_url('auth/register') ?>" method="post">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
						<input type="text" class="form-control" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>">
						<?= form_error('nama_lengkap', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Email address</label>
						<input type="text" class="form-control" name="email" value="<?= set_value('email') ?>">
						<?= form_error('email', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" class="form-control" name="password1" >
						<?= form_error('password1', '<small class="text-danger">', '</small>') ?>
					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Konfirmasi Password</label>
						<input type="password" class="form-control" name="password2" >
					</div>
					<div class="mb-3 form-check">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
					<a type="button" href="<?= base_url() ?>auth" class="btn btn-primary">Back to Login</a>
				</form>
			</div>
		</div>
	</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>