 
@extends('admin.layouts.layout')

@section('content')
	<div class="content-wrapper">
	
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

		@yield('../admin/posts')

		<div class="card-footer">
			{{-- {{ $categories->links() }} --}}
		</div>

	</section>
	<!-- /.content -->
	</div>
@endsection 