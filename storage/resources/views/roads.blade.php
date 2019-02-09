@extends('index')

@section('content')

   
   
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-2" >
						<div id="parametry_trasy">
							<h3>Dystans</h3><br/>
							<p>0-10km</p>
							<h3>Termin</h3><br/>
							<p>od: 01.01.2017</p>
							<p>do: 29.01.2017</p>
							<h3>Rejon</h3><br/>
							<p>Warszawa: ~10km</p>
							<p>Poznań: ~5km</p>
						</div>
					</div>
					<div class="col-sm-9">
						<div class="row">
						<div class="row">
							<div class="col-sm-9">
					<input type="text" class="form-control" size="35" placeholder="poszukiwana nazwa, miejsce, czas"/>	
							</div>	
							<div class="col-sm-3">	
					<button type="button" size="35" class="btn btn-default">Wyszukaj</button>				
							</div>	
						</div>					
						</div>
						<br/>
						<div class="row">
							<div class="col-sm-6">
								<div id="filer_trasy">
									<div class="row">
										<div class="col-sm-2"></div>
										<div class="col-sm-3">Nazwa</div>
										<div class="col-sm-3">Data</div>
										<div class="col-sm-3">Dystans</div>
										<div class="col-sm-1"></div>
									</div>
								</div>
								<br/>
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
							<div class="col-sm-6">
								<div id="googleMap" style="width:100%;height:380px;"></div>	
							</div>
						</div>
					</div>
				</div>
			</div>
			

@endsection
