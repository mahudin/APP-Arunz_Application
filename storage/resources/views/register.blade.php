@extends('index')
@section('content')
	
		@include('common.errors')

		<div style="text-align: center;" style="margin: 0 auto">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-3 little-button-blue" >
					<div id="root">					
					<fb:login-button scope="public_profile,email,user_likes,user_photos,user_videos" onlogin="checkLoginState();">
							Zarejestruj się za pomocą FB
					</fb:login-button>
					</div>
				</div>
				<div class="col-sm-3 little-button-grey" ><a href="login">Logowanie do usługi</a>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 little-button-black">Zarejestruj się za pomocą email</div><br/><br/><br/><br/>
					<form action="{{ url('add_user') }}" method="POST" style="text-align: center;" style="margin: 0 auto">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="join_date" value="{{ date('Y-m-d') }}">
						<input type="hidden" name="age" value="18">
						<input type="text" name="login" placeholder="login"/><br/>
						<input type="text" name="password" placeholder="hasło"/><br/>
						<input type="text" name="repassword" placeholder="powtórz hasło"/><br/>
						<input type="text" name="first_name" placeholder="imie"/><br/>
						<input type="text" name="last_name" placeholder="nazwisko"/><br/>
						<input type="text" name="email" placeholder="email"/><br/>
						Mężczyzna <input type="radio" value="1" selected="selected" name="sex" />
						Kobieta <input type="radio" value="2" name="sex" /><br/>
						<input type="text" name="city" placeholder="miasto"/><br/>
						<input type="text" name="telephone" placeholder="telefon kontaktowy"/><br/>
						<input type="checkbox"/> Regulamin<br/>
						<input type="submit" value="Rejestruj"/>
					</form>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>	
	
@endsection
