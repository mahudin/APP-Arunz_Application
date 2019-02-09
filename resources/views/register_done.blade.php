@extends('index')
@section('content')
		@include('common.errors')
		<div style="text-align: center;" style="margin: 0 auto">
			<div class="row">
				<h2 id="postep_rejestracji">
					Co dalej?
				</h2><br/>
				<h4  style="text-align:left;margin:0 auto;width:60%;font-size:16px;margin-left:16%;opacity:0.7">
					Brawo,<br/><br/> Twoje konto jest gotowe. Swoje dane możesz zawsze sprawdzić lub zmienić w zakładce "profil".
				</h4>
				<div style="margin:0 auto;text-align:center">
					<img src="{{ URL::asset('materials/Wektorki gif-01.jpg') }}" style="width:65%;">
				</div>
			</div>
			<div class="row" id="dolacz_do_nas"
				 style="background-image:url({{ URL::asset('materials/road.jpg') }});
						 min-width:100%;">
				<h4 style="text-align:left;margin:0 auto;width:60%;font-size:16px;margin-left:16%;opacity:0.7" ><br/>Korzystając z <u>Facebooka</u>, <u>Messengera</u> lub <u>WhatsApp</u>
					daj nam znać gdzie chcesz wystartować a my zrobimy za Ciebie resztę.</h4><br/>
				<h4 style="text-align:left;margin:0 auto;width:60%;font-size:16px;margin-left:16%;opacity:0.7">Aktualny status zapisu, oraz wydarzenie, na które się zapisałeś możesz śledzić w <u>Moje biegi</u></h4>

				<input type="button" class="przejdz" onclick="$('[data-popup=popup-1]').fadeIn(250);" value="Zaloguj" />
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
		</div>
@endsection