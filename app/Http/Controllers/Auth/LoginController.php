<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\user;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
    public function username(){
        return 'username';
    }
    public function login(Request $req){
        if(Auth::attempt([
            'username'=> $req->username,
            'password'=> $req->password,
            'active'=>'1'
        ])){
            return redirect()->intended('home');
        }
        $user=User::where('username',$req->username)->first();
        if($user->active=='0'){
            $error=['username'=>'Anda Sudah Tidak aktif'];
        }
            $error=['username'=>'Custome Username Dan Password Salah'];
            return redirect()->intended('login')->withErrors($error);
    }
    public function showAdminLoginForm(){
        return view('auth.login',['url'=>'admin']);
    }
    
    public function adminLogin (Request $req){
        if(Auth::guard('admin')->attempt([
            'username'=> $req->username,
            'password'=> $req->password,
        ])){
        
        return redirect()->intended(route('admin.home'));
    }
    $error=['username'=>'Admin Username Dan Password Salah'];
 return redirect()->intended(route('admin.login')) ->withErrors($error);
}
public function logout(Request $req){
    if($req->guard=='admin'){
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }else{
        Auth::guard()->logout();
        return redirect(route('login'));
    }

}
}