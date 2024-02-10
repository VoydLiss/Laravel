@include('includes.header')
	
	<section class="section first-section">
		@if (session()->has('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif
		<div class="container-fluid">

		<div class="row no-gutters g-0">
			<div class="col-md-7">
				<h4 class="h-chapter">ПРЕДСТОЯЩИЕ СОБЫТИЯ</h1>

@include('includes.item-news')

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
				<hr>
				<h4 class="h-chapter">ПРОШЕДШИЕ СОБЫТИЯ</h1>
				<div class="pattern">
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
				</div>
			</div>

			<div class="col-md-4">

@include('includes.internal-phones')
				
@include('includes.user-information-block')
				
			</div>
		</div>

		</div>
	</section>

@include('includes.footer')