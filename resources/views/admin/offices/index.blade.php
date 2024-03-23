@extends('admin.index')

@section('categories')

<div class="card-body">
	<a href="{{ route('offices.create') }}" class="btn btn-primary md-3">Добавить</a>

	@if ($offices->count())
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Номер</th>
				<th>Название</th>
				<th>Телефон</th>
				<th style="width: 40px">Управление</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($offices as $office)
			<tr>
				<td>{{ $office->office_num }}</td>
				<td>{{ $office->office }}</td>
				<td>{{ $office->phone }}</td>
				<td>
					<a href="{{ route('offices.edit', $office->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
					
					<form action="{{ route('offices.destroy', $office->id) }}" class="float-left" method="POST">
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
			<p>Информация не добавлена...</p>
	@endif

</div>

<div class="card-footer">
	{{ $offices->links() }}
</div>

@endsection