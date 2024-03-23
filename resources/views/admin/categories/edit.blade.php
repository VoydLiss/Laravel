@extends('admin.index')

@section('create')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Отдел "{{ $category->title }}"</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('categories.update', ['category' => $category->id]) }}">
		@csrf
		@method('put')
		<div class="card-body">
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $category->title }}">
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
</div>
@endsection