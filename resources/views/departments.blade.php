@extends('layouts.layout')

@section('content')

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Отделы</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($form['categories'] as $category)
			<tr>
				<td>{{ $category->title }}</td>
			</tr>
			@endforeach
	
		</tbody>
	</table>

@endsection
