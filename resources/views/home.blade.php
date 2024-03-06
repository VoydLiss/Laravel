@extends('layouts.layout')

@section('content')

{{-- <h4 class="h-chapter">ПРЕДСТОЯЩИЕ СОБЫТИЯ</h4> --}}
	@foreach ($posts as $post)

		<div class="pattern">
			<div class="item-title-content-news">
				<a href="{{ route('posts.single', ['slug'=>$post->slug]) }}" title="">
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
	<!-- <div class="pattern">
		<div class="item-title-content-news">
			<h5 class="header-item">Заголовок события 2</h5>
			<hr>
			<div class="item-content">
				Это сообщение написано для настройки блока с новостями. В реализации данная область будет использована для публикации информации о соответсвующей заголовку новости
			</div>
			<div class="item-social">
				<span class="date">20/01/18</span>
				<div class="item-comments" title="Количество комментариев">
					<i class="fa fa-comments"></i><a href="#disqus_thread" class="item-comments-count">26</a>
				</div>
			</div>
		</div>
	</div> -->
	{{-- <hr> --}}
	{{-- <h4 class="h-chapter">ПРОШЕДШИЕ СОБЫТИЯ</h4> --}}
	{{-- <div class="pattern">
		<div class="item-title-content-news">
			<h5 class="header-item">Заголовок события 1</h5>
			<hr>
			<div class="item-content">
				Это сообщение написано для настройки блока с новостями. В реализации данная область будет использована для публикации информации о соответсвующей заголовку новости
			</div>
			<div class="item-social">
				<span class="date">20/01/18</span>
				<div class="item-comments" title="Количество комментариев">
					<i class="fa fa-comments"></i><a href="#disqus_thread" class="item-comments-count">26</a>
				</div>
			</div>
		</div>
	</div>
	<div class="pattern">
		<div class="item-title-content-news">
			<h5 class="header-item">Заголовок события 2</h5>
			<hr>
			<div class="item-content">
				Это сообщение написано для настройки блока с новостями. В реализации данная область будет использована для публикации информации о соответсвующей заголовку новости
			</div>
			<div class="item-social">
				<span class="date">20/01/18</span>
				<div class="item-comments" title="Количество комментариев">
					<i class="fa fa-comments"></i><a href="#disqus_thread" class="item-comments-count">26</a>
				</div>
			</div>
		</div>
	</div> --}}

@endsection