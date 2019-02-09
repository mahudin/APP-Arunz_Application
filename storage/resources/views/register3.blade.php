@extends('index')
@section('content')
		@include('common.errors')
		<div style="text-align: center;" style="margin: 0 auto">
			<form id="dane_do_karty" action="register_action" method="post">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<h2 id="postep_rejestracji">
					Dodaj kartę
				</h2><br/>
				<h4 style="text-align:left;margin:0 auto;width:60%;font-size:16px;margin-left:16%;opacity:0.7">
					Aby zapewnić ci łatwą i szybszą obsługę umożliwiliśmy wprowadzanie danych swojej karty. Wierzymy że dzięki
					takiemu rozwiązaniu zapiszesz się na bieg szybciej niż kiedykolwiek wcześniej.
				</h4>
				<div class="row" id="o_mnie">
					<div class="col-xs-3 col-sm-4 col-md-4 col-lg-4"></div>
					<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4" >
						<!--img src="materials/card.png" id="karta_kredytowa"-->
					<div class="form-group">
						<label>Numer karty:<br/><div id="error_nrcard"></div>
							<input placeholder="xxxx-xxxx-xxxx-xxxx" type="text" class="form-control"
							required id="numer_karty"  name="numer_karty"/>
						</label>
					</div>
					<div class="form-group">
						<label>Data ważności:<br/>
							<input type="text" class="datepicker form-control" id="data_waznosci" name="data_waznosci" />
						</label>
					</div>
					<div class="form-group">
						<label>Imie:<br/>
							<input type="text" class="form-control" value="{{$imie}}" name="uname_card" />
						</label>
					</div>
					<div class="form-group">
						<label>Nazwisko:<br/>
							<input type="text" class="form-control" value="{{$nazwisko}}" name="surname_card"  />
						</label>
					</div>
					</div>
					<div class="col-xs-3 col-sm-4 col-md-4 col-lg-4"></div>
				</div>
			</div>
			<div class="row" id="dolacz_do_nas" style="
					background-image:url({{ URL::asset('materials/road.jpg') }});
					min-width:100%;">
				<div class="row" id="przyciski">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<input type="button" onclick="window.location='register1';"
						   class="przejdz form-control" value="Wróć" />
					<input type="button"  class="przejdz form-control"
						   id="przejdz_dalej" value="Zapisz" />
					</div>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
				</div>
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