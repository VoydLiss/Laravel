<div class="pattern">
	<div class="item-title-content-mini">
		<div class="header-item">Пользователи</div>
		<hr>
		<form class="box-usercard">
			<div class="box-wrap">
				@foreach ($form['users'] as $user)
					@if (Auth::user()->login == $user->login) @continue @endif
					<div class="phone-usercard">
						<button class="btn-usercard">
							<i class="fa fa-user-circle-o"></i>
							<div class="card-title"> {{ $user->surname }} {{ mb_substr($user->name,0,1) }}.{{ mb_substr($user->patronymic,0,1) }}.<br>
								<span class="card-title-sub">{{ $user->phone }}</span>
							</div> 
							<div>

								@if(Cache::has('user-is-online-'.$user->id))
									{{-- <i class="fa fa-circle text-success"></i> --}}
									{{-- <br> --}}
										<span class="text-success text">в сети</span>
								@else 
									<i class="fa fa-circle-o"></i>
								@endif

							</div>
						</button>

					</div>
				@endforeach
			</div>
		</form>

		<form action="{{ route('show', ['slug' => 'users']) }}">
			<button class="btn-expendmenu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
		</form>
	</div>
</div>