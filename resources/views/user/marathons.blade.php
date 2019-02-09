@extends('index')

@section('content')

	<div class="panel-body">
		<input type="hidden" id="fmail" value="<?php echo isset($user->email)? $user->email:""; ?>"/>
				@if (count($my_marathons) >= 1)
				<div id="tabela">
					<h2 id="naglowek" style="text-align:center;">
						<span class="violet_text">Moje</span>
						<span class="normal_text">biegi</span>
					</h2>

					<div id="wydarzenia">
						<?php $licznik=1; ?>
						@foreach ($my_marathons as $marathon)
						<div id="marathon{{@$marathon->id}}" class="bieg{{$licznik}}">
							<div class="marathon_tlo" style="width:100%;display:inline-block;padding-bottom:20px;margin-bottom:20px;" >
								<br/>
								<div class=" col-sm-2 col-md-4 col-lg-4"></div>
								<div class="col-xs-11 col-sm-9 col-md-7 col-lg-7 pasek" style="border-left-style:solid;border-width: 1px;border-color:inherit  ;">
										<div style="margin-left:15px;text-align:center;width:80px;vertical-align: top;display:inline-block;color:inherit">
											<?php $data=explode("-",$marathon->date_term);?>
											<br/>
											<h3><?php echo $data[1]; ?></h3>
											<p style="font-size:12px;margin-top:-5px;">
											<?php
												switch($data[2])
												{
													case "01": echo "St."; break;
													case "02": echo "Lt."; break;
													case "03": echo "Mrz."; break;
													case "04": echo "Kw."; break;
													case "05": echo "Maj."; break;
													case "06": echo "Czw."; break;
													case "07": echo "Lip."; break;
													case "08": echo "Sie."; break;
													case "09": echo "Wrz."; break;
													case "10": echo "Paź."; break;
													case "11": echo "Lis."; break;
													case "12": echo "Gru."; break;
												}
												?>
											<br/>
											<?php echo $data[0].".r"; ?>
											<br/><br/>
											Godz.:<br/>{{ $marathon->time_term }}</p>
										</div>
										<div style="display:inline-block;width:60%;">
											<h4>{{ $marathon->title }}</h4>
											<br/>
											<p style="font-size:13px;color:inherit">
												Dystans: {{$marathon->distance}} km<br/>
												Miejsce: {{ $marathon->place }}  <br/>
												Status: <b>
												@if($marathon->status==1)
													W trakcie rejestracji
												@elseif($marathon->status==2)
													Weryfikacja zlecenia
												@elseif($marathon->status==3)
													Opłacono
												@elseif($marathon->status==4)
													Bierzesz udział
												@elseif($marathon->status==5)
													Odbył się
												@else
													Błąd
												@endif</b> <br/>
											</p>

										</div>
									<input type="hidden" id="biegacz{{$licznik}}" value="{{$licznik}}"/>
									<div class="szczegoly" bieg="{{$licznik}}">
										<img class="expend_marathon" id="expand{{$licznik}}"  src="{{ URL::asset('materials/rozwin3.png') }}"
											 onmouseout="this.src='{{ URL::asset('materials/rozwin3.png') }}'"
											 onmousemove="this.src='{{ URL::asset('materials/rozwin2.png') }}'">
									</div>
									<div id="marathon{{@$marathon->id}}extended"  class="biegextended{{$licznik}} biegaczek" style="display:none">
										<br/><div class="row">
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Start rejestracji:<br/><b> {{ $marathon->start_register }}</b>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Koniec rejestracji:<br/><b> {{ $marathon->end_register }}</b>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Dostępnych miejsc: <br/> <b>{{ $marathon->available }}</b>
											</div>
										</div><br/>
										<div class="row">
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Wpisowe:<br/> <b>{{ $marathon->buy }}</b>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Profil trasy:<br/> <b>{{ $marathon->road_type }}</b>
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												Limit czasu:<br/> <b>{{ $marathon->limit_time_on_road }} h</b>
											</div>
										</div><br/>
										@if($marathon->attention!="")
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div style="display:inline-block">
													<p class="uwaga{{$licznik}}" style="margin-left:2%;display:inline-block">
														{{ $marathon->attention }}
													</p>
												</div>
											</div>
										</div><br/>
										@endif
										<div class="row">
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
												@if($marathon->link!="")
												<br/><input type="button" onclick="window.location='{{$marathon->link}}';" class="szczegoly"
															style="width:90px;height:30px;margin:0 auto!important;" value="Szczegóły"/><br/>
												@endif
												<img style="
												-ms-transform: rotate(6deg); /* IE 9 */
												-webkit-transform: rotate(6deg); /* Safari */
												transform: rotate(180deg);"
												name="{{$licznik}}" class="rolling_marathon" src="{{ URL::asset('materials/rozwin3.png') }}"
													 onmouseout="this.src='{{ URL::asset('materials/rozwin3.png') }}'"
													 onmousemove="this.src='{{ URL::asset('materials/rozwin2.png') }}'">
											</div>
											<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"></div>
										</div>

									</div>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
								<br/>
							</div><br/>
						</div>
								<?php $licznik++; ?>
						@endforeach

					</div>

				</div>

				@else
					Brak zapisanych tras dla ciebie !
				@endif

	</div>



@endsection
