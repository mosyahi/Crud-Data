<div class="container d-flex justify-content-center align-items-center">
	<div class="card col-md-7 my-5">
		<div class="card-header">
			<h3>Sign In</h3>
		</div>
		<div class="card-body">
			<?= $this->session->flashdata('pesan'); ?>
			<form action="<?= base_url('auth') ?>" method="post">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email address</label>
					<input type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Password</label>
					<input type="password" class="form-control" name="password" >
				</div>
				<div class="mb-3 form-check">
				</div>
				<button type="submit" class="btn btn-primary">Log in</button>
				<a type="button" href="<?= base_url('auth/register') ?>" class="btn btn-primary">Register</a>
			</form>
		</div>
	</div>
</div>