@extends('layouts.layout')

@section('content')
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Пользователи</th>
				<th>Почта</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($form['users'] as $user)
			@if ($user->name != 'admin')
			<tr>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
			</tr>
			@endif
			@endforeach
	
		</tbody>
	</table>

@endsection