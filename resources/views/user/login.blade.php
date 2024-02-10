<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ЛИС | Вход в систему</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#202222">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/app.css">
</head>
<body style="overflow: hidden">

	@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="list-unstyled">
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	@if (session()->has('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif

	<div class="container" id="auth-form">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<div id="auth-form-title">
					<div href="/" class="name-s">локальная информационная система</div>
					<div class="name-org"> <img src="{{ $logo }}" alt="" class="img-logo">{{ $nameOrg }}</div>
					<div class="org-title">	Общий заголовок организации</div>
				</div>
				<button id="auth-form-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-sign-in"></i></button>
			</div>
		</div>
		<div id="auth-form-circle"></div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-7" id="exampleModalLabel">Вход</h1>
				</div>

				<form action="{{ route('login') }}" method="post">
					@csrf
					<div class="modal-body">
						<label for="user_login" class="form-label">Логин</label>
						{{-- <input type="text" class="form-control mb-3" id="user_login" maxlength="40"> --}}
						<input type="text" name="name" class="form-control mb-3" placeholder="Имя" id="user_login" value="{{ old('name') }}">

						<label for="user_password" class="form-label">Пароль</label>
						{{-- <input type="password" class="form-control mb-3" id="user_password"> --}}
						<input type="password" name="password" class="form-control mb-3" id="user_password" placeholder="Пароль">
						
						<button type="submit" class="btn btn-primary btn-block">Войти</button>
					</div>
				</form>

			</div>
		</div>
	</div>

	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>