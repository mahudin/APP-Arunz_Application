@extends('index')
@section('content')
		<div style="text-align: center;" style="margin: 0 auto">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 great-button-grey" ><a href="login">Logowanie do usługi</a>
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div id="status"></div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-3 great-button-blue" >
					<div id="root">					
					<fb:login-button 	id="fc-but"			 scope="public_profile,email,user_likes,user_birthday,user_hometown,user_photos,user_videos" 							onclick="checkLoginState();">
							Zarejestruj się za pomocą FB
					</fb:login-button>
					</div>
				</div>
				<div class="col-sm-3 great-button-black" >
					<a href="register">Zarejestruj się za pomocą email</a></div>
				<div class="col-sm-3"></div>
			</div>
			
		<a class="btn" data-popup-open="popup-1" href="#">Open Popup #1</a>
 





</div>
@endsection
