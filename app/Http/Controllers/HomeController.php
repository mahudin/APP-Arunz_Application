<?php

namespace App\Http\Controllers;
use App\Payment;
use Auth;
use App\Roads;
use App\User;
use Psy\Util\Json;
use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function get_my_marathons()
    {
        $user = Auth::user();
       
        $card_params2 = array(
            "card_number"       =>   "4200000000000000",
        );

        $card_params3 = array(

                "card_number"       =>   "4200000000000000",
                "expiration_month"  =>   "03",
                "expiration_year"   =>   "2017",
                "name_on_card"      =>   "John Doe",
                "ip"        =>   "127.0.0.1",
        );

	    $my_marathons = Roads::get_marathons_user($user->email);
	    return view('user.marathons',['my_marathons'=>$my_marathons, 'user'=>$user, 'fbscript'=>'js/get_marathons.js', 'css'=>'marathon-page.css']);
    }

    public function get_my_profile()
    {
	    $user = Auth::user();
	    $my_marathons = Roads::get_marathons_user($user->email);
	    return view('user.profile')->with(['user'=>$user, 'css'=>'profile-page.css', 'fbscript'=>'js/profile-page.js']);
    }

    public function demission_account()
    {
        $user = Auth::user();
        User::drop_account($user->id);
        Auth::logout();
        return redirect("/");
    }

    public function is_after_attention_more_information(Request $request)
    {
        return User::is_after_attention_more_information($request->input('email'));
    }

    public function update_profile(Request $request)
    {
        $dane=[];
        $id=$request->input('idu');
        $dane['email'] = $request->input('email');
        $dane['password'] = md5($request->input('haslo'));
        $dane['uname'] = $request->input('uname');
        $dane['surname'] = $request->input('surname');
        $dane['sex'] = $request->input('male')=="male"?1:2;
        $dane['phone'] = $request->input('phone');
        $dane['city'] = $request->input('city');
        $dane['walking_for'] = "";//$request->session()->get('guest.biegam_od')[0];
        $dane['walking_count'] = "";//$request->session()->get('guest.miesiecznie_przebiegam')[0];
        $dane['walking_because'] = "";//$request->session()->get('guest.biegam_poniewaz')[0];
        $dane['nr_card'] = $request->input('nr_card');
        $dane['date_card'] = $request->input('data_waznosci');
        $dane['uname_card'] = $request->input('name_card');
        $dane['surname_card'] = $request->input('surname_card');
  
        if($request->input('haslo') == "") {
            unset($dane['password']);
        }
        
        User::update_profile_user($dane,$id);
        return redirect('home/marathons');
    }

    public function update_profile_additional(Request $request)
    {
        $dane = [];
        $id = $request->input('idu');
        $dane['walking_for'] = $request->input('walking_for');//$request->session()->get('guest.biegam_od')[0];
        $dane['walking_count'] = $request->input('walking_count');//$request->session()->get('guest.miesiecznie_przebiegam')[0];
        $dane['walking_because'] = $request->input('walking_because');//$request->session()->get('guest.biegam_poniewaz')[0];
        $dane['shirt_size'] = $request->input('shirt_size');

        User::update_profile_additional($dane,$id);
        return 1;
    }

    public function change_password(Request $request){
        User::change_password(md5($request->input('haslo')),$request->input('idu'));
        return redirect('/');
    }

    public function set_my_roads(Request $request){
        $maratony = $request->input("dane");
        $trasy = explode("\n",$maratony);
        $roads = Roads::get_marathons_all();
        $user = Auth::user();
        foreach ($trasy as $trasa)
		{
            Roads::add_user_to_road($trasa,$user->id);
        }
		
        return 1;
    }

    public function get_past_roads()
    {
        $roads=Roads::get_past_marathons_all();
        $roads_for_ee = [];
        foreach ($roads as $road)
		{
            $roads_for_ee[]=$road->title;
        }

        return Json::encode($roads_for_ee);
    }

    public function get_available_roads()
    {
        $roads=Roads::get_marathons_all();
        $roads_for_ee = [];
        foreach ($roads as $road)
		{
            $roads_for_ee[] = $road->title;
        }

        return Json::encode($roads_for_ee);
    }
}
