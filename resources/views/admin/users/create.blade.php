@extends('admin.index')

@section('create')

<div class="pattern">
  {{-- <div class="card card-outline card-primary"> --}}
	<h5 class="header-item">Добавление пользователя</h5>

	<div class="item-title-content-1">
	
    <div class="card-body">

      <form action="{{ route('register.store') }}" method="post">
				@csrf

        <div class="input-group mb-3">
          <input type="text" name="surname" class="form-control" placeholder="Фамилия" value="{{ old('surname') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Имя" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="patronymic" class="form-control" placeholder="Отчество" value="{{ old('patronymic') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="phone" class="form-control" placeholder="Телефон" value="{{ old('phone') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="login" class="form-control" placeholder="Логин" value="{{ old('login') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
				<div class="input-group mb-3">
					<select name="department" class="form-control @error('department') is-invalid @enderror" id="department">
						<option>Выбрать отдел</option>
						@foreach($categories as $k => $v)
							<option value="{{ $k }}">{{ $v }}</option>
						@endforeach
					</select>
				</div>
        <div class="input-group mb-3">
          <input type="text" name="position" class="form-control" placeholder="Должность" value="{{ old('position') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          {{-- <input type="text" name="is_admin" class="form-control" placeholder="Роль в системе" value="{{ old('is_admin') }}"> --}}

					<select name="is_admin" class="form-control @error('is_admin') is-invalid @enderror"  id="is_admin">
						<option value="">Роль в системе</option>
						@foreach ($role as $v => $r)
							<option value="{{ $v }}"> {{ $r }} </option>
						@endforeach
					</select>

					<div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password_confirmation" class="form-control" placeholder="Повторить пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
				
        <div class="row">
          
          <!-- /.col -->
          <div class="col-4 offset-8">
            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

@endsection

