@extends('admin.index')

@section('create')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Добавить кабинет</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('offices.store') }}">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="office_num">Номер кабинета</label>
				<input type="text" name="office_num" class="form-control @error('office_num') is-invalid @enderror" id="office_num" placeholder="Номер кабинета">
			</div>
			<div class="form-group">
				<label for="office">Название</label>
				<input type="text" name="office" class="form-control @error('office') is-invalid @enderror" id="office" placeholder="Название">
			</div>
			<div class="form-group">
				<label for="phone">Номер телефона</label>
				<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Номер телефона">
			</div>
		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
</div>
@endsection