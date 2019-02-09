@extends('index')
@section('content')
		@include('common.errors')
		<div style="text-align: center;" style="margin: 0 auto">
			<form action="register3" method="get">
				<input type="hidden" id="danke" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<h2 id="postep_rejestracji">
					O mnie
				</h2><br/>
				<div class="row" id="o_mnie">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<label>Biegam od:<br/>
						<select name="biegam_od" id="biegam_od">
							<option>dopiero zaczynam</option>
							<option>kilku miesięcy</option>
							<option>roku</option>
							<option>2 lat</option>
							<option>odkąd pamiętam</option>
						</select>
					</label><br/>
					<label>Miesięcznie przebiegam:<br/>
						<select name="miesiecznie_przebiegam" id="miesiecznie_przebiegam">
							<option> <19 km</option>
							<option> 20-49 km</option>
							<option> 50-100 km</option>
							<option> 100-200 km</option>
							<option> >200 km</option>
						</select>
					</label><br/>
					<label>Biegam ponieważ:<br/>
						<select name="biegam_poniewaz" id="biegam_poniewaz">
							<option>lubię rywalizację</option>
							<option>dla zdrowia</option>
							<option>uczy mnie to wytrwałości</option>
						</select>
					</label><br/>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<label style="margin-left:5px;">Wydarzenia w których brałem udział:</label><br/>
						<div class="ui-widget">
							<input id="wydarzenia_search" />
						</div><br/>
						<textarea id="udzial_w_wydarzeniach"></textarea>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				</div>
			</div>
			<div class="row" id="dolacz_do_nas"
				 style="
					background-image:url({{ URL::asset('materials/road.jpg') }});
						 min-width:100%;">
				<input type="button" onclick="window.location='register1';" id="wroc" class="przejdz" value="Wróć" />
					<input type="submit"  id="przejdz_dalej" class="przejdz" value="Dalej" />
				<br/>
				<div class="row" id="kroki_rejestracji">
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">1</span></p></div>
					<div class="strzalka_rejestracja">
						<div id="wskaznik_brzuch_dolny" >
							<img src="/materials/Arrow_medium.svg"  />
						</div>
					</div>
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">2</span></p></div>
					<div class="strzalka_rejestracja">
						<div id="wskaznik_brzuch_gorny">
							<img src="/materials/Arrow_medium_mirror.svg" onerror="this.src='materials/wskaznik_down.png'" />
						</div>
					</div>
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">3</span></p></div>
				</div>
			</div>
			</form>
		</div>
@endsection