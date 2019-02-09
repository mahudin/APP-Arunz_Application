@extends('index')

@section('content')

			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<ul id="spis_trasy">
							@if (count($marathons) >= 1)
								@foreach ($marathons as $marathon)
									<li class="trasa">
										<div class="info">
											<p class="tytul">{{ $marathon->title_marathon }}</p>
											<p class="termin">{{ $marathon->time_marathon }}</p>
											<p class="czas">{{ $marathon->place_marathon }}</p>
										</div>
									</li>
								@endforeach
							@else
								Brak zapisanych tras dla ciebie !
							@endif
						</ul>
					</div>
				</div>
			</div>
			

@endsection
