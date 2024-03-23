<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ЛИС | Управление</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

	<style>
		.ck-editor__editable_inline {
			min-height: 200px
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">

	@include('includes.header')

<!-- Site wrapper -->
<div class="wrapper"  style="top: 20px">
  <!-- Navbar -->
  {{-- <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
    </ul>
  </nav> --}}
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="{{ url('/') }}" target="blank" class="brand-link">
      <img src="{{ asset('assets/admin/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ЛИС</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/admin/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">root</a>
        </div>
      </div> --}}

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
						<a href="{{ route( $form['BtnUser']) }}" class="nav-link">
							<i class="nav-icon fas fa-home"></i>
              <p>Карточка пользователя</p>
            </a>
          </li>

					@if(Auth::user()->is_admin == '1')
          <li class="nav-item">
						<a href="#" class="nav-link">
							<i class="nav-icon fas fa-users"></i>
              <p>
								Пользователи
								<i class="right fas fa-angle-left"></i>
							</p>
            </a>
						<ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('register.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Список пользователей</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('register.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить пользователя</p>
                </a>
              </li>
            </ul>
          </li>
					
					<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Отделы
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Список отделов</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('categories.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Добавить отдел</p>
                </a>
              </li>
            </ul>
          </li>

					@endif

					<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Статьи
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('posts.index', ['prefix' => $form['UserInfo']['role']]) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Список статей</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('posts.create', ['prefix' => $form['UserInfo']['role']]) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Новая статья</p>
                </a>
              </li>
            </ul>
          </li>

					@if(Auth::user()->is_admin == '1')

					<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>
                Об организации
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="{{ route('offices.index') }}" class="nav-link">
									<i class="far fa-circle nav-icon"></i>
									<p>Кабинеты</p>
								</a>
							</li>
              <li class="nav-item">
                <a href="{{ route('org.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Информация</p>
                </a>
              </li>
            </ul>
          </li>

					@endif

					{{-- <li class="nav-item">
						<a href="{{ route('org.index') }}" class="nav-link">
							<i class="nav-icon fas fa-id-card"></i>
              <p>Об организации</p>
            </a>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->

		@yield('content')

  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>

<script>

	$('.nav-sidebar a').each(function() {

		let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
		let link = this.href;
		if(link == location) {
			$(this).addClass('active');
			$(this).closest('.nav-treeview').closest('.nav-item').addClass('menu-open menu-is-opening');
		}
	})

</script>

<script src="{{ asset('assets/admin/ckeditor5/build/ckeditor.js') }}"></script>
<script src="{{ asset('assets/admin/ckfinder/ckfinder.js') }}"></script>

<script>
	ClassicEditor
		.create( document.querySelector( '#content' ), {
				ckfinder: {
						uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
				}, // !НЕ ПОДКЛЮЧАЕТСЯ
				toolbar: [ 'ckfinder', 'imageUpload', '|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
		} )
		.catch( function( error ) {
				console.error( error );
		} );

	ClassicEditor
		.create( document.querySelector( '#description' ), {
				toolbar: ['heading', '|', 'bold', 'italic', '|', 'undo', 'redo' ]
		} )
		.catch( function( error ) {
				console.error( error );
		} );
</script>

</body>
</html>
