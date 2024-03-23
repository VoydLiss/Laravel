<div class="pattern">
	<div class="item-title-content-mini">
		<div class="header-item">Внутренние телефоны</div>
		<hr>
		<form>

			@foreach ($form['offices'] as $office)
				<div class="phone-usercard">
					<button class="btn-usercard">
						<div class="card-title"> {{ $office->office_num }} каб.: {{$office->office}} <br>
							<span class="card-title-sub">{{ $office->phone }}</span>
						</div>
					</button>
				</div>
			@endforeach

		</form>
		
		<form>
			<button class="btn-expendmenu"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></button>
		</form>
	</div>
</div>