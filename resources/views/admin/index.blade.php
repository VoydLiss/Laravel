@extends('admin.layouts.layout')

@section('content')
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	{{-- <section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Blank Page</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section> --}}

	
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="list-ustyled">
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

		@if (session()->has('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div>
		@endif

	<!-- Main content -->
	<section class="content">

		@yield('categories')
		@yield('create')
		@yield('posts')
		@yield('users')
		@yield('org')

		<div class="card-footer">
			{{-- {{ $categories->links() }} --}}
		</div>

	</section>
	<!-- /.content -->
	</div>
@endsection