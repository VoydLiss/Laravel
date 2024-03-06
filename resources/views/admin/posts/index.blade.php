@extends('admin.index')

@section('categories')

<div class="card-body">
	<a href="{{ route('posts.create') }}" class="btn btn-primary md-3">Добавить статью</a>

	@if ($posts->count())
	<table class="table table-bordered">
		<thead>
			<tr>
				<th style="width: 10px">#</th>
				<th>Наименование</th>
				<th>Категория</th>
				<th>Дата</th>
				<th style="width: 40px">Управление</th>
			</tr>
		</thead>
		<tbody>
			
			@foreach ($posts as $post)
			<tr>
				<td>{{ $post->id }}</td>
				<td>{{ $post->title }}</td>
				<td>{{ $post->category->title }}</td>
				<td>{{ $post->created_at }}</td>
				<td>
					<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt"></i></a>
					
					<form action="{{ route('posts.destroy', $post->id) }}" class="float-left" method="POST">
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
			<p>Статей пока нет...</p>
	@endif

</div>

<div class="card-footer">
	{{ $posts->links() }}
</div>

@endsection