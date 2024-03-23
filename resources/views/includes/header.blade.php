
	<header class="top-line" id="header">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-md-6 col-xl-3 text-md-left">
					<div class="logo">
						<img src="{{ $form['OrgInfo']->logo }}" alt="" class="img-logo">
						<a href="/">
							<div class="name-s">локальная информационная система</div>
							<div class="name-org"> {{ $form['OrgInfo']->name }}</div>
						</a>
					</div>
				</div>

				<div class="col-12 col-md-6 col-xl-6 d-sm-flex">
					<nav class="main-menu top-menu">
						<ul>
							<li class="active"><a href="/">Главная</a></li>
							<li><a href="{{ route('show', ['slug' => 'users']) }}">Сотрудники</a></li>
							<li><a href="{{ route('show', ['slug' => 'about']) }}">Об организации</a></li>
							<li><a href="{{ route('show', ['slug' => 'departments']) }}"><i class="fa fa-bars"></i> Отделы</a>
								<ul class="submenu">

									@foreach ($form['categories'] as $category)
										<li><a href="{{ route('board', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
									@endforeach
									
								</ul>
							</li>
						</ul>
					</nav>
				</div>
				
				<div class="col-12 col-md-3 col-xl-2 d-sm-flex">
					<form action="{{ route( $form['BtnUser'] ) }}" id="link-adm" class="top-usercard">
						<div class="btn-usercard">
							<i class="fa fa-user-circle-o"></i>
							<button class="btn-adm" type="submit" form="link-adm"> 
								<span class="card-title">{{ $form['UserInfo']['initials'] }} 
									<span class="card-title-sub{{ $form['UserInfo']['srole'] }}">{{ $form['UserInfo']['rights'] }}</span>
								</span>
							</button>
							<a href={{ route('logout') }}> <i class="fa fa-sign-out"></i> </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</header>