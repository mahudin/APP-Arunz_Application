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
							<h4>Dane uczestnika</h4>
							<hr/>
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
					<!--div class="col-sm-6" id="o_mnie">
						<h4>O mnie</h4>
						<hr/>
						<label>Biegam od <br/>
  						<div class="form-group"  style="min-width:100%;">
	    							<select name="walking_for" value="{{$user->walking_for}}"   class="form-control" style="min-width:100%;">
										<option>dopiero zaczynam</option>
										<option>kilku miesięcy</option>
										<option>roku</option>
										<option>2 lat</option>
										<option>odkąd pamiętam</option>
									<select/>
						</div>
						</label>
  						<div class="form-group">
    							<label>Miesięcznie przebiegam <br/>
	    							<select name="walking_count" value="{{$user->walking_count}}" class="form-control" style="width:100%;">
										<option> <19 km</option>
										<option> 20-49 km</option>
										<option> 50-100 km</option>
										<option> 100-200 km</option>
										<option> >200 km</option>
								<select/>
							</label>
  						</div>
  						<div class="form-group" style="min-width:100%;">
							<label>Biegam ponieważ <br/>
								<select name="walking_because" value="{{$user->walking_because}}"  class="form-control" style="width:100%;">
									<option>lubię rywalizację</option>
									<option>dla zdrowia</option>
									<option>uczy mnie to wytrwałości</option>
								<select/>
							</label>
  						</div><br/>
						<div class="form-group" style="min-width:100%;">
    							<label>Wydarzenia, w których brałem udział <br/>
	    							<textarea class="form-control" style="min-width:100%;height:150px;"></textarea>
							</label>
  						</div>
					</div>
				</div-->
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
								<input required  style="font-weight:normal"  class="form-control" type="text" value="{{$user->surname_card}}" name="surname_card" id="surname_card"/></label><br/><br/>
							</div>
						</div>
						<div class="col-sm-3 col-lg-3 col-md-3"></div>
					</div>

					<div class="row" id="dolacz_do_nas"
						 style="background-image:url({{ URL::asset('materials/road.jpg') }});margin-left: -28px;min-width:105%;height:360px!important;padding-bottom:0px">
					<!--input type="button" onclick="window.location='register1';" id="wroc" class="przejdz" value="Wróć" />
					<input type="submit"  id="przejdz_dalej" class="przejdz" value="Dalej" -->
						<div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="row" id="buttony">
							<div class="col-sm-2 col-lg-4 col-md-4 "></div>
                            <div class="col-sm-4 col-lg-2 col-md-2 col-xs-6">
                                <input class="profil_button"  type="button" value="Anuluj"/>
                                <a class="profil_button"  type="button" value=""  href="demission_account">Zrezygnuj z konta</a>
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
