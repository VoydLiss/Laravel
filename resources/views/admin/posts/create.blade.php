@extends('admin.index')

@section('posts')

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title">Новая статья</h3>
	</div>
	<!-- /.card-header -->
	<!-- form start -->
	<form role="form" method="post" action="{{ route('posts.store', ['prefix' => $form['UserInfo']['role']]) }}" enctype="multipart/form-data">
		@csrf
		<div class="card-body">
			<div class="form-group">
				<label for="title">Название</label>
				<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название">
			</div>

			<div class="form-group">
				<label for="description">Цитата</label>
				<textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="3" placeholder="Цитата..."></textarea>
			</div>
			
			<div class="form-group">
				<label for="content">Контент</label>
				<textarea name="content" class="form-control @error('content') is-invalid @enderror" id="content" rows="7" placeholder="Контент..."></textarea>
			</div>

			<div class="form-group">
				<label for="category_id">Отдел</label>
				@if ($form['UserInfo']['user']->is_admin == 2) 

					@foreach ($categories as $k => $v)
						@if($k == $form['UserInfo']['user']->department)
							<div name="content" class="form-control" id="content" rows="7">{{ $v }}</div>
						@endif
					@endforeach

				@else
					<select name="category_id" class="form-control @error('category_id') is-invalid @enderror" id="category_id">

						<option>...</option>
						{{-- <option style=" font-style: italic">Указать отдел</option> --}}
						@foreach($categories as $k => $v)
							<option value="{{ $k }}">{{ $v }}</option>
						@endforeach

					</select>
				@endif

			</div>

			<div class="form-group">
				<label for="thumbnail">Изображение</label>
				<div class="input-group">
					<div class="custom-file">
						<input type="file" name="thumbnail" class="custom-file-input" id="thumbnail">
						<label class="custom-file-label" for="thumbnail">Выбрать изображение...</label>
					</div>
				</div>
			</div>

		</div>
		<!-- /.card-body -->

		<div class="card-footer">
			<button type="submit" class="btn btn-primary">Сохранить</button>
		</div>
	</form>
</div>
@endsection