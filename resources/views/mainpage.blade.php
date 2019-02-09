@extends('index')
@section('content')
	<div class="row" id="zapiszemy_cie_na_twoj_bieg" style="margin-right: 15px!important;">
		<div class=" col-sm-1 col-md-3 col-lg-3 col-g-4"></div>
		<div class="col-sm-5 col-md-3 col-lg-3 col-g-2">
					<h1 class="to_az"> <span class="violet_text">To aż tak</span> <span class="normal_text">proste!</span></h1>
					<p>Zapiszemy Cię na twój bieg!</p>
					<button type="button" id="create_account" onclick="window.location='register1';" class="btn btn-default">Załóż konto</button>
					<p>Następnie wybierz bieg i napisz do nas</p>
					<p>My zrobimy za ciebie resztę!</p>
					<div class="row" style="margin-left:1px;margin-top:15px;margin-top:35px;padding-bottom:20px;" >
						   <img src="{{URL::asset('materials/FB.png') }}" 		style="display:inline;" class="social-icon-30s" />
						   <img src="{{URL::asset('materials/Messenger.png') }}" 	style="display:inline;" class="social-icon-30s" />
						   <img src="{{URL::asset('materials/WhatsApp.png') }}" 	style="display:inline;" class="social-icon-30s" />
						   <img src="{{URL::asset('materials/Icon_telephone_simple.png') }}" 	style="display:inline;" class="social-icon-30s" /> 
					</div>
		</div>
		<div class=" col-sm-5 col-md-3 col-lg-3 col-g-3" id="wersja_desktopowa">
			<img src="materials/arunz_gifek.gif" style="width:290px"/>
		</div>
		<div class=" col-sm-1 col-md-3 col-lg-3 col-g-6"></div>
		</div>
	</div>
	<div class="row" id="kroki" style=" margin-right: 0px;margin-left: 0px; ">
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-3 col-g-3"></div>
		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-6 col-g-6">
			<div class="row" id="kroczki" >
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-g-4" >
					<div class="row odstep_na_tekst">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 krok">krok</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 numer"><span class="violet_number">1</span></div>
					</div><br/>
					<p>utwórz konto na ArunZ, wybierz bieg, w którym chcesz wystartować</p>
					<div id="wskaznik_brzuch_dolny" >
						<img src="/materials/Arrow_short.svg" class="img-responsive" />
					</div>
					<div id="wskaznik_brzuch_dolny_mobilny" >
						<img src="/materials/Arrow_medium.svg" class="img-responsive" />
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-g-4" >
					<div class="row odstep_na_tekst">
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 krok">krok</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 numer"><span class="violet_number">2</span></div>
					</div><br/>
					<p>Napisz do nas za pomocą aplikacji społecznościowych, w którym biegu chcesz wziąć udział</p>
					<div id="wskaznik_brzuch_gorny">
						<img src="/materials/Arrow_short_mirror.svg" onerror="this.src='materials/wskaznik_down.png'" class="img-responsive"/>
					</div>
					<div id="wskaznik_brzuch_gorny_mobilny">
						<img src="/materials/Arrow_medium_mirror.svg" onerror="this.src='materials/wskaznik_down.png'" class="img-responsive"/>
					</div>
				</div>
				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 col-g-4" >
					<div class="row odstep_na_tekst" >
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 krok">krok</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 numer"><span class="violet_number">3</span></div>
					</div><br/>
					<p> My zapiszemy Cię na bieg, przekażemy Ci wszystkie informacje ważne przed startem i zadbamy aby to był Twój Bieg</p>
					<div id="wskaznik_poziomy">
						<img src="{{ URL::asset('materials/wskaznik.png') }}"/>
					</div>
					<div id="wskaznik_pionowy">
						<img src="{{ URL::asset('materials/Arrow_medium.svg') }}"/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-3 col-g-3"></div>
	</div>
	<div class="row" id="rozwiazujemy_za_ciebie" style="">
		<div class="col-xs-1 col-sm-3 col-md-3 col-lg-2 col-g-2"></div>
		<div class="col-xs-9 col-sm-5 col-md-4 col-lg-3 col-g-4">
			<div id="tekst_rozwiazujemy_za_ciebie" >
				<div style="margin-top:6%;">
					<span class="violet_text">Rozwiązujemy</span>
					<span class="normal_text">za ciebie:</span>
				</div>
				<p style="margin-top:3%;">
					problem czasochłonnych przygotowań do biegu.
					Zapomnij o zapisach, rezerwacjach i terminach.<br/>
					Będąc z Nami skupisz się na swoim biegu, my<br/> zajmiemy się resztą.
					Wszystko po to, abyś<br/> czerpał większą radość z Biegania.
				</p>
			</div>
		</div>
		<div class="col-xs-2 col-sm-2 col-md-5 col-lg-7 col-g-6"></div>
	</div>
	<div  id="dolacz_do_nas" style="background-image:url({{ URL::asset('materials/road.jpg') }});">
		<div style="margin:0 auto;padding-top:60px">
			<div style="text-align:center">
				<div style="margin-bottom:30px;">
					<h1 class="violet_text" >Dołącz</h1>
					<span class="normal_text" style="margin-left:7px"> już dziś</span>
				</div>
				<p>Aby nie przegapić startu!</p>
				<button type="button" onclick="window.location='register1';" id="second_create_account" class="btn btn-default">Załóż konto</button>
			</div>
		</div>
	</div>
@endsection
