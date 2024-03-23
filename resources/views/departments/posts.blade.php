@extends('departments.index')

@section('content')

	@foreach ($posts as $post)
	<div class="pattern">
		<div class="item-title-content-news">
			<a href="{{ route('board.post', ['slug'=>$post->slug, 'board'=>$category->slug]) }}" title="">
				<h5 class="header-item">{{ $post->title }}</h5>
				<hr>
				
				<div class="item-content">
					{{ $post->description }}
				</div>
				<div class="item-social">
					<span class="date">{{ $post->created_at->format('Y-m-d') }}</span>
					{{-- <div class="item-comments" title="Количество комментариев">
						<i class="fa fa-comments"></i><a href="#disqus_thread" class="item-comments-count">26</a>
					</div> --}}
				</div>
			</a>
		</div>
	</div>
	@endforeach

@endsection