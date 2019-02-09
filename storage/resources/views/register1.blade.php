@extends('index')
@section('content')
		@include('common.errors')
		<div style="text-align: center;" style="margin: 0 auto">
			<form action="register2" id="dane_podstawowe" method="post">
			<div class="row">
				<h2 id="postep_rejestracji">
					Rejestracja
				</h2><br/>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="button" scope="public_profile,email,user_likes,user_photos,user_videos"
					   onclick="checkLoginState();" value="Uzupełnij przez Facebook" id="complete_by_fb"
					   class="form-control"
				/>
				<br/><br/>
				<div class="row" id="form1p1">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<label>Email:<br/><div id="error_email"></div><input type="text" name="email" id="email" class="form-control"/>
						</label><br/>
					<label style="margin-bottom: 0px;!important;">Hasło:<br/><div id="error_pass"></div><input class="form-control" required type="text" name="haslo" id="haslo"/></label>
					<label style="margin-bottom: 0px;!important;"><input type="password" class="form-control" required name="powtorz_haslo" id="powtorz_haslo"/></label><br/>
					<div id="haslo_stan">
						<input type="button" class="form-control" id="generuj_haslo" value="Generuj"/>
						<div id="jakosc_hasla"></div>
						<img id="oko" src="/materials/oko.png"/>
						<input type="button" id="widocznosc_haslo" class="form-control" value="Pokaż"/>
					</div><br/><br/>
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
					<label>Imie:<br/><input class="form-control"  type="text" required name="imie" id="imie"/></label><br/>
					<label>Nazwisko:<br/><input class="form-control"  type="text" required name="nazwisko" id="nazwisko"/></label><br/>
					<div id="wybor_plci">
						<input type="radio" required id="kobieta" 	name="sex" class="sexc" value="male"/> Kobieta <div class="mobile_br"></div>
						<input type="radio" required id="mezczyzna"  name="sex" class="sexc" value="female"/> Mężczyzna
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				</div>
			</div>
			<div class="row" id="dolacz_do_nas" style="
					background-image:url({{ URL::asset('materials/road.jpg') }});
					min-width:100%;">
				<div  id="czesc_formularza">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<label>Miasto:<br/><input type="text" class="form-control"  required name="miasto" id="miasto"/></label><br/>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<label>Telefon:<br/><input required type="text" class="form-control"  name="telefon" id="telefon"/></label><br/>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
				</div>
				<div style="position:absolute;left:10%;margin-top:75px;width:150px;!important;display: inline-block;">
					<input type="checkbox" class="form-control" style="width: 100px; " required="required" name="regulamin"/>
					<span style="margin-top: -28px;position: absolute">
						<u onclick="window.location='../docs/regulamin.pdf'" style="cursor:pointer;">Regulamin</u></span></div>
				<br/><br/><br/>
				<div style="width:250px;margin:0 auto;">
					<input type="button"
						   class="form-control" id="przejdz_dalej" value="Dalej" />
				</div>
				<br/>

				<div class="row" id="kroki_rejestracji">
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">1</span></p></div>
					<div class="strzalka_rejestracja">
						<div id="wskaznik_brzuch_dolny" >
							<img src="/materials/Arrow_medium.svg" style="opacity:0.7" />
						</div>
					</div>
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">2</span></p></div>
					<div class="strzalka_rejestracja">
						<div id="wskaznik_brzuch_gorny">
							<img src="/materials/Arrow_medium_mirror.svg" style="opacity:0.7"  onerror="this.src='materials/wskaznik_down.png'" />
						</div>
					</div>
					<div class="krok_rejestracja"><p><div>krok</div> <span class="violet_number">3</span></p></div>
				</div>

			</div>
			</form>
		</div>
@endsection