@extends('index')

@section('content')

			@include('common.errors')
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6 great-button-grey" ><a href="login">Logowanie do usługi</a>
				</div>
				<div class="col-sm-3"></div>
			</div>
				<div class="row"><br/>
					<?php if(!empty($message)) echo $message; ?>
					<form action="login_user"  id="login_user" method="POST" style="text-align: center;" style="margin: 0 auto">
						<div class="col-sm-12">Logowanie do usługi</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="text" name="login" placeholder="Login" /><br/>
						<input type="password" name="password" placeholder="Hasło" /><br/>
						<input type="submit" id="logen" value="Zaloguj się"/>
					</form>
				<br/>
				</div>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-3 little-button-blue" >
					<div id="root">					
						<fb:login-button scope="public_profile,email,user_likes,user_photos,user_videos" 							onlogin="checkLoginState();">
							Zarejestruj się za pomocą FB
						</fb:login-button>
					</div>
					</div>
					<div class="col-sm-3 little-button-black" >
					<a href="register">Zarejestruj się za pomocą email</a></div>
					<div class="col-sm-3"></div>
				</div>
@endsection
