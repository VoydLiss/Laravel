@extends('admin.index')

@section('categories')

<div class="card-body">
	<a href="{{ route('categories.create') }}" class="btn btn-primary md-3">Добавить категорию</a>

	@if ($categories->count())
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 10px">#</th>
				<th>Наименование</th>
				<th>Slug</th>
				<th style="width: 40px">Управление</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->title }}</td>
				<td>{{ $category->slug }}</td>
				<td>
					<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
					
					<form action="{{ route('categories.destroy', $category->id) }}" class="float-left" method="POST">
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
			<p>Категорий пока нет...</p>
	@endif

</div>

<div class="card-footer">
	{{ $categories->links() }}
</div>

@endsection