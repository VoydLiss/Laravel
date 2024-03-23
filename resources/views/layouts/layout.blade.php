@include('includes.head')

<body>

@include('includes.header')

@yield('header')

	<section class="section first-section" @if (Request::is('/')) @endif>
		
		@if (session()->has('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
		@endif

		<div class="container-fluid">

		<div class="row no-gutters g-0">

			<div class="col-md-7">
				
				@yield('content')

			</div>

			<aside class="col-md-4">

				@include('includes.internal-phones')				
				@include('includes.user-information-block')
				
			</aside>
		</div>

		</div>
	</section>

@include('includes.footer')