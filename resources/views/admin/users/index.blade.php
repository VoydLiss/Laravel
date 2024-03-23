@extends('admin.index')

@section('users')

<div class="card-body">
	<a href="{{ route('register.create') }}" class="btn btn-primary md-3">Добавить пользователя</a>

	@if ($users->count())
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 10px">#</th>
				<th>Пользователь</th>
				<th>Почта</th>
				<th style="width: 40px">Управление</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($users as $user)
			@if ($user->login == 'admin') @continue @endif
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
					<a href="{{ route('register.edit', $user->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
					
					<form action="{{ route('register.destroy', $user->id) }}" class="float-left" method="POST">
						@csrf
						@method('delete')
						<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Подтвердите удаление')">
							<i class="fas fa-trash-alt"></i>
						</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	
	@else
			<p>Пользователей пока нет...</p>
	@endif

</div>

<div class="card-footer">
	{{ $users->links() }}
</div>

@endsection