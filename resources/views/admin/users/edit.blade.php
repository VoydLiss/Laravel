@extends('admin.index')

@section('create')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Пользователь "{{ $user->name }}"</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('register.update', $user->id) }}">
		@csrf
		@method('put')
		<div class="card-body">
			<div class="form-group">
				<label for="name">Имя</label>
				<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}">
			</div>
		</div>

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
</div>

@endsection