@extends('admin.index')

@section('org')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Информация об организации</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('org.update', ['org' => $org->id]) }}">
		@csrf
		@method('put')
		<div class="card-body">

			<div class="card-body">
				<div class="form-group">
					<label for="name">Наименование:</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $org->name }}">
				</div>

				{{-- <div class="form-group">
					<label for="logo">Логотип</label>
					<div class="input-group">
						<div class="custom-file">
							<input type="file" name="logo" id="logo" class="custom-file-input">
							<label for="logo" class="custom-file-label">Choose file</label>
						</div>
					</div>
					<div><img src="{{ $org->getImage() }}" alt="" class="img-thumbnail mt-2"></div>
				</div> --}}

			</div>

		</div>
		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
	<!-- /.card-body -->
</div>

@endsection