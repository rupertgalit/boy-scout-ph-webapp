<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Login Template</title>

	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap"
		rel="stylesheet" />

	<link href="/assets/css/dark.css" rel="stylesheet" />
	<link class="js-stylesheet" href="/assets/css/light.css" rel="stylesheet" />
	<script src="/assets/js/loginsettings.js"></script>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
	<main class="d-flex w-100 h-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<img class="img-fluid" src="/assets/images/boyscouts_logofinal.png" width="140">
							<h1 class="h2">Welcome back!</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<?php if ($this->session->flashdata('error')): ?>
								<div class="alert alert-danger alert-dismissible" role="alert">
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									<div class="alert-icon">
										<i data-feather="alert-circle"></i>
									</div>
									<div class="alert-message">
										Invalid username or password
									</div>
								</div>
								 <?php endif; ?>


								<div class="m-sm-3">
									<form method="POST" action="login">
										<div class="mb-3">
											<label class="form-label">Username</label>
											<input class="form-control form-control-lg" type="text" name="username" placeholder="Enter your username" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />

										</div>

										<div class="d-grid gap-2 mt-3">
											<button class='btn btn-lg btn-primary' type="submit" id="submit" value="Login">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="/assets/js/app.js"></script>
</body>

</html>