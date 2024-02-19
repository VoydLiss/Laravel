@extends('admin.index')

@section('org')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Информация об организации</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->

	<div class="card-body">
		<div class="form-group">
			<label for="name">Наименование:</label>
			<h5 for="name">{{ $org->name }}</h5>
		</div>

		{{-- <div class="form-group">
			<label for="logo">Логотип</label>
		</div> --}}

	</div>

	<a href="{{ route('org.edit', $org->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i> Редактировать</a>

	<!-- /.card-body -->
</div>

@endsection