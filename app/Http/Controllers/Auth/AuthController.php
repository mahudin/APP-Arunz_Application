<?php

namespace App\Http\Controllers\Auth;
use App\Roads;
use Auth;
use DB;
use App\User;
use Psy\Util\Json;
use Validator;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\Route;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'login' => 'required|min:25',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'login' => $data['login'],
			'password' => bcrypt($data['password']),
            'first_name' => $data['first_name'],
       	    'last_name' => $data['last_name'],
			'email' => $data['email'],
			'birth_date' => $data['birth_date'],
			'sex' => $data['sex'],
			'age' => $data['age'],
			'city' => $data['city'],
			'telephone' => $data['telephone'],
			'join_date' => $data['date'],
			'is_online' => $data['is_online']
        ]);
    }

	public function remember_pass(Request $request)
	{
		echo $request->input('email');
	}

    public function enter_by_facebook($fn, $ln, $g, $a, $em, $brt, $hm, $url)
    {
		$id = User::check_by_login($fn);
		if(!empty($id)) 
		{
			Auth::loginUsingId($id);
            return redirect('marathons');
        }
		else
		{
			$data = explode(',',$brt);
			$dane = [];
			$dane['login'] = $fn;
			$dane['password'] = 'dupa';
			$dane['first_name'] = $fn;
			$dane['last_name'] = $ln;
			$dane['email'] = $em;
			$dane['birth_date'] = $data[2].'-'.$data[0].'-'.$data[1];
			$dane['sex'] = $g == 'male' ? 1:0;
			$dane['age'] = $a;
			$dane['city'] = $hm;
			$dane['telephone'] = '000000000';
			$dane['join_date'] = date('Y-m-d');

			$wyn=User::add_user($dane);
			$wynik=User::get_user_by_login($dane['login']);

			return redirect('home/marathons');
		}
    }

    public function check_and_login(Request $request)
    {
		$name = $request->input('email');
		$password = $request->input('password');
		$credentials=['email' => $name, 'password' => md5($password),'_token'=>$request->all()['_token']];

		$wynik=Validator::make($credentials, [
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ]);

		if($wynik->fails()) 
		{
        	return redirect('login')
            	->withInput()
            	->withErrors($wynik);
    	}
		$id = User::authenticate_user($credentials);
	
		if(!empty($id))
		{
			Auth::loginUsingId($id);
			return redirect('home/marathons');
		}
		else
		{
			return redirect('login')->with(['message'=>'błąd zalogowania']);
		}
    }

    public function register_and_login(Request $request)
    {
		$wynik=Validator::make($request->all(), [
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ]);
		if($wynik->fails()) {
        	return redirect('register')
            	->withInput()
            	->withErrors($wynik);
    	}
		$dane=[];
		$dane['login'] = $request->input('login');
		$dane['password'] = md5($request->input('password'));
		$dane['first_name'] = $request->input('first_name');
		$dane['last_name'] = $request->input('last_name');
		$dane['email'] = $request->input('email');
		$dane['birth_date'] = '2010-01-01';
		$dane['sex'] = $request->input('sex');
		$dane['age'] = 18;
		$dane['city'] = $request->input('city');
		$dane['telephone'] = $request->input('telephone');
		$dane['join_date'] = $request->input('join_date');

		$wyn = User::add_user($dane);
		$wynik = User::get_user_by_login($dane['login']);
		
		Auth::loginUsingId($wynik[0]->id);
		return redirect('home/marathons');
    }

    public function logout()
    {
		Auth::logout();
		return redirect("/");
    }

	public function check_compatibility(Request $request){
		$dane = User::get_user_by_email($request->input('email'));
		
		if($dane[0]->password == md5($request->input('pass')))
		{
			return $dane[0]->id;
		}
		else
		{
			return 0;
		}
	}

	public function fb_check_email(Request $request)
	{
		$email = $request->input('email');
		$wynik = User::get_user_by_email($email);
		if(isset($wynik[0]->id))
		{
			Auth::loginUsingId($wynik[0]->id);
			echo $wynik[0]->id;
		}
		else
		{
			echo 0;
		}
	}
	
	public function register_and_login_3_steps(Request $request)
    {
		$dane=[];
		$dane['email']=$request->session()->get('guest.email')[0];
		$dane['password']=md5($request->session()->get('guest.haslo')[0]);
		$dane['uname']=$request->session()->get('guest.imie')[0];
		$dane['surname']=$request->session()->get('guest.nazwisko')[0];
		$dane['sex']=$request->session()->get('guest.sex')[0]=="male"?1:2;
		$dane['phone']=$request->session()->get('guest.telefon')[0];
		$dane['city']=$request->session()->get('guest.miasto')[0];

		$dane['zip_code']=$request->session()->get('guest.zip_code')[0];
		$dane['state']=$request->session()->get('guest.states')[0];
		$dane['street']=$request->session()->get('guest.street')[0];
		$dane['code_country']=$request->session()->get('guest.code_country')[0];

		$dane['walking_for']="";//$request->session()->get('guest.biegam_od')[0];
		$dane['walking_count']="";//$request->session()->get('guest.miesiecznie_przebiegam')[0];
		$dane['walking_because']="";//$request->session()->get('guest.biegam_poniewaz')[0];
		$dane['nr_card']=$request->input('numer_karty');
		$dane['date_card']=$request->input('data_waznosci');
		$dane['uname_card']=$request->input('uname_card');
		$dane['surname_card']=$request->input('surname_card');
		$dane['cvv_cvc']=$request->input('cvv/cvc');
		$dane['ip_adress']=$_SERVER['REMOTE_ADDR'];
		$dane['join_date']=date('Y-m-d H:i:s');
		$dane['is_online']=0;
		$request->session()->flush();
		User::add_user($dane);
		return redirect('register_done');
    }

	public function check_email(Request $request)
	{
		$dane = User::get_user_by_email($request->input('email'));
		if(isset($dane[0]->id))
		{
			return $dane[0]->id;
		}
		else
		{
			return 0;
		}
	}

	public function check_email_and_password(Request $request)
	{
		$dane = User::get_user_by_email_and_password($request->input('email'), md5($request->input('pass')));
		if(isset($dane[0]->id))
		{
			return $dane[0]->id;
		}
		else
		{
			return 0;
		}
	}

	public function get_available_roads(Request $request)
	{
		$roads = Roads::get_marathons_all();
		$roads_for_ee = [];
		foreach($roads as $road) $roads_for_ee[] = $road->title;

		return Json::encode($roads_for_ee);
	}

	public function change_password(Request $request){
		User::change_password(md5($request->input('haslo')), $request->input('idu'));
		return redirect('/');
	}

	public function getAuthIdentifierName()
	{}
	public function getAuthIdentifier()
	{}
	public function getAuthPassword()
	{}
	public function getRememberToken()
	{}
	public function setRememberToken($value)
	{}
	public function getRememberTokenName()
	{}
}
