{{-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	
</body>
</html> --}}
@include('includes.header')
	
	<section class="section first-section">
		<div class="container-fluid">

		<div class="row no-gutters g-0">
			<div class="col-md-7">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Пользователь</th>
							<th>Почта</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach ($users as $user)
						@if ($user->name != 'admin')
						<tr>
							<td>{{ $user->name }}</td>
							<td>{{ $user->email }}</td>
						</tr>
						@endif
						@endforeach
				
					</tbody>
				</table>
			
			</div>

			<div class="col-md-4">

@include('includes.internal-phones')
				
@include('includes.user-information-block')
				
			</div>
		</div>

		</div>
	</section>

@include('includes.footer')