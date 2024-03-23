<header class="second-line">

	<a href="{{ route('board', ['slug' => $category->slug]) }}"> 
		<div class="container-fluid"> 
			<div class="row row-center">
				<div class="col-12 col-md-6 col-xl-3 text-md-left">
					<div class="title">

						{{ $category->title }}

					</div>
				</div>
			</div>
		</div>
	</a>
</header>