@extends('admin.index')

@section('create')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Статья "{{ $post->title }}"</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" enctype="multipart/form-data" method="post" action="{{ route('posts.update', ['post' => $post->id]) }}">
		@csrf
		@method('PUT')
		<div class="card-body">
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ $post->title }}">

			</div>
			<div class="form-group">
				<label for="title">Цитата</label>
				<textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3">{{ $post->description }} </textarea>
			</div>
			<div class="form-group">
				<label for="title">Контент</label>
				<textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7">{{ $post->content }} </textarea>
			</div>
			<div class="form-group">
				<label for="category_id">Категория</label>
				<select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id" rows="7">
					@foreach ($categories as $k => $v)
						<option value="{{ $k }}" @if($k == $post->category_id) selected @endif>{{ $v }}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="thumbnail">Изображение</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
						<label for="thumbnail" class="custom-file-label">Choose file</label>
					</div>
				</div>
				<div><img src="{{ $post->getImage() }}" alt="" class="img-thumbnail mt-2"></div>
			</div>

		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
</div>
@endsection