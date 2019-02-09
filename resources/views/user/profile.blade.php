@extends('index')
@section('content')

			<div class="panel-body">
				<form role="form" id="upprofile" action="update_profile_data" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"/>
					<input type="hidden" id="_old_password" name="_old_password" value="{{$user->password}}"/>
					<input type="hidden" value="{{$user->id}}" name="idu" id="idu"/>
					<div class="row">
						<div class="col-sm-3"></div>
						<div class="col-sm-6">
							<br/>
							<h3 style="display: inline-block">Chcesz się zapisać na bieg? Napisz do nas </h3>
							<div id="socialki" style="display: inline-block">
								<img src="{{URL::asset('materials/FB.png') }}" 		 class="social-icon-25s" />
								<img src="{{URL::asset('materials/Messenger.png') }}" 	class="social-icon-25s" />
								<img src="{{URL::asset('materials/WhatsApp.png') }}" 	 class="social-icon-25s" />
								<img src="{{URL::asset('materials/Icon_telephone_simple.png') }}" 	 class="social-icon-25s" />
							</div>
							<br/>
							<h4>Dane uczestnika</h4>
							<hr/>
							<?php if($user->is_online==0): ?>
								<input type="button" class="form-control" style="padding:5px;margin:0 auto" id="usprawnij_system_podpowiedzi" value="Usprawnij system podpowiedzi"/>
								<br/>
							<?php endif?>
  							<div class="form-group">
								<b>Email</b><br/>
    							<input type="email" placeholder="Email" name="email" value="{{$user->email}}" class="form-control" id="email"/>
							</div>
  							<div class="form-group">
							<div id="error_pass"></div>
							<b>Stare hasło</b><br/>
    							<input type="password"  name="stare_haslo" id="stare_haslo"  class="form-control" id="pwd"/>
							<b>Nowe hasło</b><br/>
								<input type="password" id="haslo" name="haslo" class="form-control" />
							<div id="haslo_stan">
								<input type="button" class="form-control" id="generuj_haslo" value="Generuj"/>
								<div id="jakosc_hasla"></div>
								<img id="oko" src="/materials/oko.png"/>
								<input type="button" id="widocznosc_haslo" class="form-control" value="Pokaż"/>
							</div><br/><br/>
  							</div><br/><br/>
							<div class="form-group">
								<b>Miasto</b><br/>
    							<input type="text" placeholder="Miasto" value="{{$user->city}}" name="city"  class="form-control" id="city">
  							</div>
							<div class="form-group">
								<b>Telefon</b><br/>
    							<input type="text" placeholder="Telefon kontaktowy" value="{{$user->phone}}" name="phone" class="form-control" id="phone">
  							</div><br/>
							<div class="form-group">
								<b>Imię</b><br/>
    							<input type="text" placeholder="Imię" value="{{$user->uname}}" name="uname"  class="form-control" id="name">
  							</div>
							<div class="form-group">
								<b>Nazwisko</b><br/>
    							<input type="text" placeholder="Nazwisko" value="{{$user->surname}}" name="surname" class="form-control" id="surname">
  							</div>
						</div>
						<div class="col-sm-3"></div>
					</div>
				
					<div class="row">
						<div class="col-sm-3 col-lg-3 col-md-3"></div>
						<div class="col-sm-6 col-lg-6 col-md-6">
						<h4>Karta</h4>
							<hr/>
							<div class="form-group">
								<label id="nr_card">Numer karty:<br/>
									<input type="text"
									   style="font-weight:normal" class="form-control"
									   value="{{$user->nr_card}}" name="nr_card" />
								</label><br/>
							</div>
							<div class="form-group">
								<div class="row">
									<div class="col-sm-6 col-lg-6 col-md-6">
								<label id="nr_imie" style="font-weight:normal" ><b>Imię:</b><br/>
								<input type="text" style="font-weight:normal"  class="form-control" value="{{$user->uname_card}}" name="name_card" id="name_card"/></label>
									</div>
									<div class="col-sm-6 col-lg-6 col-md-6">
								<label id="date_card_label">Data ważności:<br/>
									<input value="{{$user->date_card}}"  style="font-weight:normal"
										   type="text" name="date_card"
										   class="datepicker_profil form-control" id="date_card"/>
								</label><br/>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label id="nr_nazwisko">Nazwisko:<br/>
								<input required style="font-weight:normal"  class="form-control" type="text" value="{{$user->surname_card}}" name="surname_card" id="surname_card"/></label><br/><br/>
							</div>

						</div>
						<div class="col-sm-3 col-lg-3 col-md-3"></div>
					</div>

					<div class="row" id="dolacz_do_nas"
						 style="background-image:url({{ URL::asset('materials/road.jpg') }});height:360px!important;padding-bottom:0px">
					
						<div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row" id="buttony">
							<div class="col-sm-2 col-lg-4 col-md-4 "></div>
                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-6">
                                <input class="profil_button"  type="button" value="Anuluj"/>
                                <a class="profil_button"  type="button" value=""  href="demission_account">Usuń konto</a>
                            </div>
                            <div class="col-sm-4 col-lg-2 col-md-2  col-xs-6">
                                <input class="profil_button" id="profil_submiter" type="button" value="Zapisz"/>
                                <a class="profil_button"  type="button" value="" href="../docs/regulamin.pdf">Regulamin usługi</a>
                            </div>
							<div class="col-sm-2 col-lg-4 col-md-4  "></div>
                        </div>
                    	</div>
					</div>
				</form>
			</div>
			
@endsection
