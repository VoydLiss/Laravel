@extends('admin.index')

@section('create')

{{-- <div class="card card-primary"> --}}
<div class="pattern">
	<div class="card-header">
		<h3 class="card-title">Пользователь "{{ $user->name }}"</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->

	<div class="item-title-content-1">

		<form role="form" method="post" action="{{ route('register.update', $user->id) }}">
			@csrf
			@method('put')
			<div class="card-body">

				<div class="input-group mb-3">
					<label for="surname" class="width">Фамилия</label>
					<input type="text" name="surname" class="form-control @error('surname') is-invalid @enderror" placeholder="Фамилия" id="surname" value="{{  $user->surname }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<label for="name" class="width">Имя</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Имя" id="name" value="{{  $user->name }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<label for="patronymic" class="width">Отчество</label>
					<input type="text" name="patronymic" class="form-control @error('patronymic') is-invalid @enderror" placeholder="Отчество" id="patronymic" value="{{  $user->patronymic }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

				<div class="input-group mb-3">
					<label for="phone" class="width">Телефон</label>
					<input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Телефон" id="phone" value="{{  $user->phone }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

				{{-- <div class="input-group mb-3">
					<label for="login" class="width">Логин</label>
					<input type="text" name="login" class="form-control @error('login') is-invalid @enderror" placeholder="Логин" id="login" value="{{  $user->login }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div> --}}
				
				<div class="input-group mb-3">
					<label for="email" class="width">Email</label>
					<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" value="{{  $user->email }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				
				<div class="input-group mb-3">
					<label for="department" class="width">Отдел</label>
					<select name="department" class="form-control @error('department') is-invalid @enderror" id="department">
						@foreach ($categories as $k => $v)
							<option value="{{ $k }}" @if($k == $user->category_id) selected @endif>{{ $v }}</option>
						@endforeach
					</select>
				</div>

				<div class="input-group mb-3">
					<label for="position" class="width">Должность</label>
					<input type="text" name="position" class="form-control @error('position') is-invalid @enderror" placeholder="Должность" id="position" value="{{  $user->position }}">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				
				<div class="input-group mb-3">
					<label for="is_admin" class="width">Роль в системе</label>
					{{-- <input type="text" name="is_admin" class="form-control @error('is_admin') is-invalid @enderror" placeholder="Роль в системе" id="is_admin" value="{{  $user->is_admin }}"> --}}
					
					<select name="is_admin" class="form-control @error('is_admin') is-invalid @enderror"  id="is_admin">
						@foreach ($role as $v => $r)
							<option value="{{ $v }}" @if($v == $user->is_admin) selected @endif> {{ $r }} </option>
						@endforeach
					</select>

					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>

			</div>

			<div class="card-footer">
				<button type="submit" class="btn btn-primary">Сохранить</button>
			</div>
		</form>

	</div>
</div>

@endsection