<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ЛИС</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="theme-color" content="#202222">
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/app.css">

</head>
<body>

	<header class="top-line" id="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-6 col-xl-3 text-md-left">
					<div class="logo">
						<img src="{{ $OrgInfo->logo }}" alt="" class="img-logo">
						<a href="/">
							<div href="/" class="name-s">локальная информационная система</div>
							<div class="name-org"> {{ $OrgInfo->name }}</div>
						</a>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6 d-sm-flex">
					<nav class="main-menu top-menu">
						<ul>
							<li class="active"><a href="#">Главная</a></li>
							<li><a href="{{ route('posts.show', ['post' => 1])}}">Сотрудники</a></li>
							<li><a href="#">Об организации</a></li> 
							<li><a href="{{ route('show', ['slug' => 'department']) }}"><i class="fa fa-bars"></i> Отделы</a>
								<ul class="submenu">
									<li><a href="">Отдел административно-хозяйственной деятельности</a></li>
									<li><a href="">Отдел информационных услуг</a></li>
								</ul>
							</li>								
						</ul>
					</nav>
				</div>
				<div class="col-12 col-md-3 col-xl-2 d-sm-flex">
					<div class="top-usercard">
						<button class="btn-usercard">
							<i class="fa fa-user-circle-o"></i>
							<div class="card-title">{{ $UserInfo['name'] }} <span class="card-title-sub-editor">{{ $UserInfo['rights'] }}</span></div>
							<a href={{ route('logout') }}> <i class="fa fa-sign-out"></i> </a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</header>