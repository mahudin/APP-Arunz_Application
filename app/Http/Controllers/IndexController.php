<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use App\Roads;
use App\User;
use Auth;
use App\Http\Requests;

class IndexController extends Controller
{
    public function all_roads(){ 
		$user = Auth::user();
		$marathons = Roads::get_marathons_user($user->login);
		return view('roads',['fbscript' => 'js/roads.js', 'marathons' => $marathons]); 
    }
	
	public function register_first()
	{
		return view('register1',['css'=>'register1-page.css','fbscript' => 'js/fb-plugin.js','fbscript2' => 'js/register1.js']);
	}

	public function register_second(Request $request)
	{
		$request->session()->push('guest.email', $request->input('email'));
		$request->session()->push('guest.haslo', $request->input('haslo'));
		$request->session()->push('guest.imie', $request->input('imie'));
		$request->session()->push('guest.nazwisko', $request->input('nazwisko'));
		$request->session()->push('guest.sex', $request->input('sex'));
		$request->session()->push('guest.miasto', $request->input('miasto'));
		$request->session()->push('guest.telefon', $request->input('telefon'));
		$request->session()->push('guest.states', $request->input('states'));

		return view('register2',['css'=>'register2-page.css','fbscript' => 'js/register2.js']);
	}

	public function register_third(Request $request)
	{
		$request->session()->push('guest.email', $request->input('email'));
		$request->session()->push('guest.haslo', $request->input('haslo'));
		$request->session()->push('guest.imie', $request->input('imie'));
		$request->session()->push('guest.nazwisko', $request->input('nazwisko'));
		$request->session()->push('guest.sex', $request->input('sex'));
		$request->session()->push('guest.miasto', $request->input('miasto'));
		$request->session()->push('guest.telefon', $request->input('telefon'));
		$request->session()->push('guest.zip_code', $request->input('zip_code'));
		$request->session()->push('guest.states', $request->input('states'));
		$request->session()->push('guest.street', $request->input('street'));
		$request->session()->push('guest.code_country', $request->input('code_country'));
		$user = Auth::user();
		$imie = $request->session()->get("guest.imie")!=""?$request->session()->get("guest.imie"):"";
		$nazwisko = $request->session()->get("guest.nazwisko")!=""?$request->session()->get("guest.nazwisko"):"";
		return view('register3',['user'=>$user,'imie'=>$imie[0],'nazwisko'=>$nazwisko[0],'css'=>'register3-page.css','fbscript' => 'js/register3.js']);
	}

	public function register_done()
	{
		return view('register_done',['css'=>'register-done-page.css']);
	}

	public function about_us()
	{
		return view('about_us',['css'=>'about-us.css']);
	}

	public function show_doc(Request $request){

		$doc=$request->input('doc');

		header("Content-type:application/pdf");

		header("Content-Disposition:attachment;filename='".$doc."'");

		readfile($doc);
	}
}
