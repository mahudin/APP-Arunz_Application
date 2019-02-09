@extends('index')
@section('content')

			<div class="row il kroki_kolka">
				<div class="col-sm-4 col-lg-4"></div>
				<div class="col-sm-4 col-lg-4" style="text-align:center">
					<h2 class="violet_number">Dlaczego</h2><br/>
					<span class="normal_text">to robimy?</span><br/><br/>
					<p>
						Wszystko zaczyna się od pasji. My też jesteśmy zapalonymi biegaczami. Chcieliśmy się skupić na bieganiu - to proste.
						Wielu naszych znajomych Biegaczy podchwyciło myśl i tak powstał ArunZ z pasji do biegania i chęci pomocy przy organizacji
						Twoich startów, małych i dużych, w kraju i za granicą.
					</p>
				</div>
				<div class="col-sm-4 col-lg-4"></div>
			</div>
			<div class="row il  zyskasz2">
				<div class="col-sm-4 col-lg-4"></div>
				<div class="col-sm-4 col-lg-4" style="text-align:center" >
					<h2 class="violet_number">Co zyskasz</h2><br/>
					<span class="normal_text">dzięki nam?</span><br/><br/>
					<p>
						Dziś każdy z Nas jest zabiegany i przez to mamy zbyt mało czasu na ważne rzeczy. Dlatego też zespół ArunZ zadba o to aby Cię zapisać
						na wybrany bieg. Z nami będziesz na bieżąco, przypomnimy Ci o ważnych rzeczach przed startem, dopilnujemy abyś wystartował i udzielimy
						ci wskazówek, tak abyś zadowolony stanął na mecie.
					</p>
				</div>
				<div class="col-sm-4 col-lg-4"></div>
			</div>
			<div class="row il  kroki_kolka">
				<div id="koleczka  col-g-8">
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2"></div>
					<div class="col-g-1"></div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2">
						<img src="/materials/Obrecz_O_Nas_1.png" class="kolko" /><br/>
						<p class="krok_kolko">zapiszemy Cię na wybrany bieg, nie musisz pamiętać o datach - chwyć telefon, napisz do Nas i <b>startuj!</b></p>
					</div>
					<div class="col-md-1 col-sm-1 col-lg-1 col-g-1">
						<div id="wskaznik_brzuch_dolny" >
							<img src="/materials/Arrow_medium.svg"  />
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2">
						<img src="/materials/Obrecz_O_Nas_2.png" class="kolko" /><br/>
						<p class="krok_kolko">udzielimy Ci cennych wskazówek przed biegiem, o miejscu w którym jest bieg, trasie i zawodach, tak aby przygotować Cię na wszystko! </p>
					</div>
					<div class="col-md-1 col-sm-1 col-lg-1 col-g-1">
						<div id="wskaznik_brzuch_gorny">
							<img src="/materials/Arrow_medium_mirror.svg" onerror="this.src='materials/wskaznik_down.png'" />
						</div>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2">
						<img src="/materials/Obrecz_O_Nas_3.png" class="kolko" /><br/>
						<p class="krok_kolko">zapiszemy każdy Twój czas, tak abyś wszystkie swoje dane biegowe miał pod ręką.</p>
					</div>
					<div class="col-g-1"></div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2"></div>
				</div>
			</div>
			<div class="row il  zyskasz">
				<div class="tekst_glowny">
					<h2 class="violet_number">Zespół</h2>
					<span class="normal_text" style="margin-left:10px">  ArunZ</span><br/><br/>
				</div>
				<p>
					Sami jesteśmy zapalonymi biegaczami. Dlatego też ArunZ to projekt zrodzony z pasji.<br/>
					Poznaj Nas bliżej:
				</p>
				<div class="row il " id="portrety">
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2"></div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2 kolko_portret">
						<img src="materials/portrety/Jasiek.png" class="kolko_portret"/>
						<h4>Jasiek</h4>
						<p>sportowiec amator,<br/> student prawa na UJ.
							Pomysłodawca ArunZ

						</p>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2 kolko_portret">
						<img src="materials/portrety/ArunZ_O_nas_Jarek.png" class="kolko_portret"/>
						<h4>Jarek</h4>
						<p>sportowiec amator,<br/> grafik, projektant stron i aplikacji.

						</p>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2 kolko_portret">
						<img src="materials/portrety/ArunZ_O_nas_Tomek.png" class="kolko_portret"/>
						<h4>Tomek</h4>
						<p>sportowiec amator,<br/> Architekt informacji, projektant stron i aplikacji.

						</p>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2 col-g-2 kolko_portret">
						<img src="materials/portrety/ArunZ_O_nas_Michal.png" class="kolko_portret"/>
						<h4>Michał</h4>
						<p>sportowiec amator,<br/> student informatyki na UP,
							programista i administrator
						</p>
					</div>
					<div class="col-md-2 col-sm-2 col-lg-2"></div>
				</div>
			</div>
@endsection
