<!DOCTYPE html>
<html>
    <head>
        <title>ArunZ</title>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
		<link rel="stylesheet" href="<?php echo URL::asset(!empty($css)?'css/'.$css:''); ?>">
		<link rel="shortcut icon" type="image/png" href="<?php echo URL::asset('materials/favicon.png'); ?>"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="//connect.facebook.net/en_US/all.js"></script>
		<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

		<!-- src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script-->
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
		<script type="text/javascript" src="<?php echo URL::asset('js/jquery.autocomplete.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo URL::asset('js/using_cookies.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo URL::asset('js/gmail-plugin.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo URL::asset('js/fb-plugin-popup.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo URL::asset(!empty($fbscript)?$fbscript:''); ?>"></script>
		<script type="text/javascript" src="<?php echo URL::asset(!empty($fbscript2)?$fbscript2:''); ?>"></script>
		<script type="text/javascript" src="{{ URL::asset('js/main.js') }}"></script>
		<script src="http://maps.googleapis.com/maps/api/js"></script>
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		<script src="https://apis.google.com/js/client.js?onload=checkAuth"></script>

		<link rel="stylesheet"href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    </head>
    <body>
		<div class="panel-body">
			<div>
				<nav class="navbar navbar-default navbar-fixed-top">
				    <div class="container">
					<div class="navbar-header">
      						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
        						<span class="icon-bar"></span>
      						</button>
      						<a class="navbar-brand" href="/"><img id="logo_arunz" src="{{ URL::asset('materials/logo_arunz.png') }}"/></a>
					</div>

					<div class="collapse navbar-collapse" id="myNavbar">
      						<ul class="nav navbar-nav navbar-right">
							<li>
								<div class="kraina" name="/about_us"><div class="pas_m">O nas</div></div>
							</li>
							<li>
								<div class="kraina" name="/home/marathons"><div class="pas_m">Moje biegi</div></div>						
							</li>
        					<li>
								<div name="/home/profile" class="kraina"><div class="pas_m">Profil</div></div>	
							</li>
							<?php if(Auth::check()): ?>
								<li>
									<div name="/logout" class="kraina" ><div class="pas_m" id="twoje_konto" val="off">Wyloguj się</div></div>
								</li>
							<?php else: ?>
        						<li>
									<div name="/home/tournaments" class="kraina">
										<div class="pas_m" id="twoje_konto" val="on">Twoje konto</div>	
									</div>								
								</li>
							<?php endif; ?>
      						</ul>
    					</div>  
				    </div>
				</nav><br/><br/><br/><br/>
         		@yield('content')
		</div>
    </div>

	<div class="popup" style="z-index:10000;" data-popup="popup-1">
    	<div class="popup-inner" id="popek">
			<embed class="header-image" src="{{ URL::asset('materials/logo_ArunZ.svg') }}" type="image/svg+xml" ></embed>
			<p id="zaloz_konto"><a href="register1">Załóż konto</a></p>
			<p style="margin-top:-35px;" id="opis_gorny">Zaloguj się na konto:</p>
			<form action="login_user" id="login_user_form" method="post">
				<div style="margin-bottom:15px;">
					<input id="fmail" name="email" type="text" class="wejscie" placeholder="Mail:"/><br/>
						<div id="fmail_errors"></div>
					<input id="fhaslo" name="password" type="password" class="wejscie"  placeholder="Hasło:"/>
						<div id="fhaslo_errors"></div>
				</div>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input id="flog" type="submit" value="Zaloguj się"/>
			</form>
			<div style="padding-bottom:30px;margin-top:15px;">
				<div id="faceb" class="col-xs-12 col-sm-6 col-md-6  col-lg-6 buttony" id="fc-but"
					scope="public_profile,email,user_likes,user_birthday,user_hometown,user_photos,user_videos"
					onclick="checkLoginStatePopup();">
					<img id="facebook-logo" class="header-image face_icon svg" src="{{ URL::asset('materials/icon_FB_full.svg') }}"/>
					<div style="color:white;margin-top:-3px;font-size:10pt;font-family:Montserrat Light, sans-serif;"> przez Facebook'a</div>
				</div>
				<div id="gmail" onclick="handleAuthClick(event)" class="col-xs-12 col-sm-6 col-md-6  col-lg-6 buttony">
					<img id="gmail-logo" class="header-image gmail_icon svg" src="{{ URL::asset('materials/icon_Gmail_.svg') }}" />
					<div style="color:white;margin-top:-5px;font-size:10pt;font-family:Montserrat Light, sans-serif;"> przez Gmail</div>
				</div> 
			</div><br/><br/>
			<p style="display: inline-block;margin-left:15px;margin-top: -5px;">
				<br/>
				Zapomniałeś hasła? Kliknij tutaj: <div class="remember_pass">Przypomnij hasło</div></p>
			<a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    	</div>
	</div>

		<div class="popup" style="z-index:10000;" data-popup="popup-2">
			<div class="popup-inner" id="popek2">
				<embed class="header-image" src="{{ URL::asset('materials/logo_ArunZ.svg') }}" type="image/svg+xml" ></embed>
				<p id="opis_gorny2">Wprowadź email, na który wyślemy Ci link do zresetowania hasła:</p>
				<form action="remember_pass" id="remember_pass_user_form" method="post">
					<div style="margin-bottom:15px;">
						<input id="fremail" name="remember_email" type="text" class="wejscie" placeholder="Mail:"/><br/>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div style="display:inline-block">
						<div style="width:100%;display:inline-block">
							<div style="width:50%;display:inline-block">
								<!--img src="captcha.php" style="margin-top:-30px;margin-left:40px;" alt="captcha"/-->
								<div class="g-recaptcha"
									 data-sitekey="6LfATCkTAAAAAFMfXpCYadxqzuBK4m3_Z6eVBopN"></div>
							</div>
							<div style="width:40%;display:inline-block">
								<!--input type="button" id="repass_button_new" class="repass_button" value="Nowy"/><br/>
								<input type="button" class="repass_button" value="Czytaj"/-->
							</div>
						</div>
					</div>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input id="flog" type="submit" value="Wyślij"/>
				</form>
				<a class="popup-close" data-popup-close="popup-2" href="#">x</a>
			</div>
		</div>

		<div class="popup" style="z-index:10000;" data-popup="popup-3">
			<div class="popup-inner" id="popek3">
				<h3 id="trzeci_naglowek" style="opacity: 1.0">Usprawnij system podpowiedzi</h3>
				<p id="opis_gorny3">
					Ustaw swoje preferencje i osiągnięcia aby otrzymać lepsze wsparcie
					przy doborze tras i wskazówek
				</p><br/>
				<input type="button" id="ustaw" class="form-control" value="Ustaw"/>
				<a class="popup-close" data-popup-close="popup-3" href="#">x</a>
			</div>
		</div>

		<div class="popup" style="z-index:10000;" data-popup="popup-4">
			<div class="popup-inner" id="popek4">
				<h3 id="czwarty_naglowek" style="opacity: 1.0">O nas:</h3>
				<p id="opis_gorny4">
				<label id="label_walking_for">Biegam od <br/>
					<div class="form-group"  style="min-width:100%;">
						<select id="walking_for"  name="walking_for" value="<?php echo isset($user->walking_for)?$user->walking_for:"";?>"   class="form-control" style="min-width:100%;!important;">
							<option>dopiero zaczynam</option>
							<option>kilku miesięcy</option>
							<option>roku</option>
							<option>2 lat</option>
							<option>odkąd pamiętam</option>
							<select/>
					</div>
				</label>
				<div class="form-group">
					<label id="label_walking_count">Miesięcznie przebiegam <br/>
						<select id="walking_count"  name="walking_count" value="<?php echo isset($user->walking_count)?$user->walking_count:"";?>" class="form-control" style="width:100%;">
							<option> <19 km</option>
							<option> 20-49 km</option>
							<option> 50-100 km</option>
							<option> 100-200 km</option>
							<option> >200 km</option>
							<select/>
					</label>
				</div>
				<div class="form-group" style="min-width:100%;">
					<label id="label_walking_because">Biegam ponieważ <br/>
						<select id="walking_because"  name="walking_because" value="<?php echo isset($user->walking_because)?$user->walking_because:"";?>"  class="form-control" style="width:100%;">
							<option>lubię rywalizację</option>
							<option>dla zdrowia</option>
							<option>uczy mnie to wytrwałości</option>
							<select/>
					</label>
				</div>
				<div class="form-group" style="min-width:100%;">
					<label id="label_my-events">Wydarzenia, w których brałem udział <br/>
						<div class="ui-widget"  style="z-index:1000000;">
							<input id="wydarzenia_search2" class="form-control" style="z-index:1000000;"/>
						</div>
						<textarea class="form-control" id="my-events" style="min-width:100%;height:150px;"></textarea>
					</label>
				</div>
				<input type="button" id="wyslij_preferencje" class="form-control" value="Wyślij"/>
			</div>
				</p><br/>
				<a class="popup-close" data-popup-close="popup-4" href="#">x</a>
			</div>
		</div>





			<footer id="fh5co-footer" style="background-color:#673ab7;vertical-align:middle;">
			<div class="container" style="margin:0 auto; padding:10px;">
				<div class="row row-bottom-padded-md">
					<div class="col-md-2  col-xs-12 animate-box"></div>
					<div class="col-md-4 col-sm-7  animate-box" id="lewa_stopka">
						<div class="fh5co-footer-widget" id="powiekszenie_wyjatkowe">
							<p class="stopkaDesktop" style="margin-left:40px; text-align:left;">bądźmy w kontakcie:</p>
							<ul class="fh5co-links" style="color:white!important;font-size:10pt">
								<li>
										<div style="display:inline;float:left;">
											<img src="{{ URL::asset('materials/ArunZ_Kontakt_Jan_B.png') }}" class="social-icon"/>
										</div>
										<div style="display:inline;float:left;font-family:'Montserrat Hairline',arial;">
												<p class="stopkaDesktop lewa_stopka_przesuniecie" style="color:white!important;margin:0 auto;padding:0;
												text-align:left;text-decoration:none;-moz-text-decoration-style:none;-moz-text-decoration-color:none;
												-webkit-text-decoration-style:none;
												-o-box-text-decoration-style:none;font-family:'Montserrat Hairline',arial;">tel: 530 616 053</p>
												<p class="stopkaDesktop lewa_stopka_przesuniecie" style="color:white!important;margin:0 auto;padding:0;">
												<a class="stopkaDesktop" style="color:white!important;font-family:'Montserrat Hairline',arial;"
												   href="mailto:jan.berdychowski@gmail.com">jan.berdychowski@gmail.com</a></p>
										</div>
										<div style="clear:left"/>
								</li>
								<li>
									<div style="display:inline;float:left;">
											<img src="{{ URL::asset('materials/logo_ArunZ_FB_Profile__1.png') }}" class="social-icon"/>
										</div>
										<div style="display:inline;float:left;">
												<p class="stopkaDesktop lewa_stopka_przesuniecie" style="color:white!important;margin:0 auto;padding:0;margin-left:10px;margin-top:5px;font-family:'Montserrat Hairline',arial;">kontakt@arunz.com</>
												<p class="stopkaDesktop lewa_stopka_przesuniecie" style="color:white!important;margin:0 auto;padding:0;margin-left:10px;text-align:left;font-family:'Montserrat Hairline',arial;">www.arunz.com </p>
										</div>
									<div style="clear:left"/>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-5  animate-box">
						<div id="powiekszenie_wyjatkowe2" class="fh5co-footer-widget "  style="color:white">
							<p class="stopkaDesktop">Wybierz bieg i napisz do nas,<br/>my zrobimy za Ciebie resztę</p>
							<ul class="fh5co-links">
								<li>
									<div id="socialki">
										<img src="{{URL::asset('materials/FB.png') }}" 		 class="social-icon-30s" />
										<img src="{{URL::asset('materials/Messenger.png') }}" 	class="social-icon-30s" />
										<img src="{{URL::asset('materials/WhatsApp.png') }}" 	 class="social-icon-30s" />
										<img src="{{URL::asset('materials/Icon_telephone_simple.png') }}" 	 class="social-icon-30s" />
									</div>
								</li>
								<li>
									<p style="font-family:'Montserrat Hairline',arial;">
									<div style="margin-top:-8px;">
										<div class="stopkaCopyrightDesktop copyright" >Copright © 2006-2016 <b>arunz.eu</b><br/></div>
										<div class="stopkaCopyrightDesktop wszelkie">Wszelkie prawa zastrzeżone</div>
									</div>
									</p>
								</li>	
							</ul>
						</div>
					</div>
					<div class="col-md-1  col-xs-12 animate-box"></div>
				</div>
			</div>
		</footer>
    </body>
</html>