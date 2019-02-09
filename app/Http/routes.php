<?php

Route::get('/', function (){ return view('mainpage',['css'=>'main-page.css']); });

Route::get('authenticate', function (){ return view('auth',['fbscript' => 'js/fb-plugin.js']); });

Route::get('register', function (){ return view('register'); });

Route::get('login', function (){ return view('login'); });

Route::get('enter', function (){ return view('login'); });

Route::post('add_user', ['before' => 'csrf','uses' => 'Auth\AuthController@register_and_login'] );

Route::post('login_user', ['before' => 'csrf','uses'=>'Auth\AuthController@check_and_login'] );

Route::get('login_fb/{fn}/{ln}/{g}/{a}/{em}/{brt}/{hm}/{url}', 'Auth\AuthController@enter_by_facebook')->where(
['fn'=>'[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+',
 'ln'=>'[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ]+',
 'g'=>'[a-m]+',
 'a'=>'[0-9]+',
 'em'=>'[a-zA-Z0-9]+\@[a-zA-Z]+\.[a-z]{1,3}',
 'brt'=>'[0-9]{2}\,[0-9]{2}\,[0-9]{4}',
 'hm'=>'[a-zA-ZąćęłńóśźżĄĘŁŃÓŚŹŻ\,\ ]+',
 'url'=>'[a-zA-Z0-9\=\.\:\?\_\/\&\- .]+']);

Route::post('user/store','UserController@store');

Route::get('user/{id}','UserController@show')->where(['id'=>'[0-9]+']);

Route::get('home/../docs/{doc}','IndexController@show_doc')->where(['doc'=>'[a-z\.]+']);

Route::resource('user', 'UserController');

Route::get('logout', 'Auth\AuthController@logout' );

Route::get('roads', 'IndexController@all_roads');

Route::get('register1', 'IndexController@register_first');

Route::get('register3', 'IndexController@register_second');

Route::post('register2', 'IndexController@register_third');

Route::post('register_action','Auth\AuthController@register_and_login_3_steps');

Route::post('fb_check_email','Auth\AuthController@fb_check_email');

Route::get('register_done', 'IndexController@register_done');

Route::post('remember_pass','Auth\AuthController@remember_pass');

Route::get('remind_password/{id}','MailController@check_token_remind_pass')->where(['id'=>'[0-9\-]+']);

Route::post('check_compatibility','Auth\AuthController@check_compatibility');

Route::post('check_email','Auth\AuthController@check_email');

Route::post('check_email_and_password','Auth\AuthController@check_email_and_password');

Route::post('send_email','MailController@send_email');

Route::get('/contact',function (){ return view('contact'); });

Route::get('/about_us','IndexController@about_us');

Route::get('get_available_roads','Auth\AuthController@get_available_roads');

Route::get('getdata', function()
{
	$term = Str::lower(Input::get('term'));
	$data = array(
			'R' => 'Red',
			'O' => 'Orange',
			'Y' => 'Yellow',
			'G' => 'Green',
			'B' => 'Blue',
			'I' => 'Indigo',
			'V' => 'Violet',
	);
	$return_array = array();

	foreach ($data as $k => $v) {
		if (strpos(Str::lower($v), $term) !== FALSE) {
			$return_array[] = array('value' => $v, 'id' =>$k);
		}
	}
	return Response::json($return_array);
});

Route::post('update_profile_data_reminder','Auth\AuthController@change_password');

Route::get('home_get_past_roads','HomeController@get_past_roads');

//Route::post('is_after_attention_more_information','Auth\AuthController@is_after_attention_more_information');

Route::group(['middleware' => 'auth'], function () {

	//Route::get('home/get_available_roads','Auth\AuthController@get_available_roads');

	Route::get('home/home_get_past_roads','HomeController@get_past_roads');

	Route::get('home/marathons', 'HomeController@get_my_marathons' );

	Route::get('home/demission_account','HomeController@demission_account');

	Route::post('home/update_profile_data','HomeController@update_profile');

	Route::post('home/update_profile_additional','HomeController@update_profile_additional');

	Route::post('home/set_my_roads','HomeController@set_my_roads');

	Route::post('home/is_after_attention_more_information','HomeController@is_after_attention_more_information');

	Route::get('home/profile', 'HomeController@get_my_profile');

});
