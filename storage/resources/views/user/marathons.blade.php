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
						@foreach ($my_marathons as $marathon)
						<div id="marathon{{@$marathon->id}}">
							<div class="marathon_tlo" style="width:100%;display:inline-block;height:220px;padding-bottom:20px;margin-bottom:20px;" >
								<br/>
								<div class=" col-sm-2 col-md-4 col-lg-4"></div>
								<div class="col-xs-11 col-sm-9 col-md-7 col-lg-7" style="border-left-style:solid;border-width: 1px;border-color:inherit  ;">
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
												@else
													Błąd
												@endif</b> <br/>
											</p>
											<input type="button" class="szczegoly"
												style="width:90px;height:30px;"   value="Szczegóły"/>
										</div>
								</div>
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
								<br/>
							</div>

							<div id="marathon{{@$marathon->id}}extended" style="margin-left:3%;width:97%;display:none">
								<div class="bordered" style="display:inline-block;width:85%">
									<br/>
									Start rejestracji: {{ $marathon->start_register }}<br/>
									Zakończenie rejestracji: {{ $marathon->end_register }}<br/>
									Profil trasy: {{ $marathon->road_type }}<br/>
									Limit czasu na trasie: {{ $marathon->limit_time_on_road }} h <br/>
									Dostępnych miejsc: {{ $marathon->available }}<br/>
									<br/>
								</div>
								<div style="display:inline-block">
									<p style="margin-left:5%;display:inline-block">
										{{ $marathon->attention }}
									</p>
								</div>
								<div style="width:10%;display:inline-block;margin-top:-110px;!important;">
									<input name="{{$marathon->id}}"  type="button" style="margin-left:35%;" class="rolling_marathon"  value="Mniej"/>
								</div>
							</div>
						</div>
						@endforeach

					</div>

				</div>

				@else
					Brak zapisanych tras dla ciebie !
				@endif

	</div>



@endsection
