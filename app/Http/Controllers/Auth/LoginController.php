<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Authy\AuthyApi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        $user = User::where('username', '=', $request->username)->first();
        $isDuoSercurity = env('DUO_SECURITY','');
        $authyApi = New AuthyApi(env('API_KEY',''));

        if(isset($isDuoSercurity) && $isDuoSercurity == 'true' && null !== env('API_KEY','') && env('API_KEY','') != '' && isset($user) && $request->verify == "verify" && $user->username != "superadmin"){
            $authyApi->phoneVerificationStart($user->phone, $user->country_code, "sms");
            return view('auth.verify')->with('username', $request->username)->with('password', $request->password)->with('number_phone', $user->country_code . $user->phone);
        }else{
            if(isset($isDuoSercurity) && $isDuoSercurity == 'true' && isset($user) && $user->username != "superadmin") {
                try {
                    $result = $authyApi->phoneVerificationCheck($user->phone, $user->country_code, $request->code);
                    if ($result->ok()) {
                        if ($this->attemptLogin($request)) {
                            return $this->sendLoginResponse($request);
                        }
                        $this->incrementLoginAttempts($request);
                        return $this->sendFailedLoginResponse($request);
                    } else {
                        return view('auth.login')->with('errorMessage', 'Wrong token code');
                    }
                } catch (Exception $e) {
                    $response = [];
                    $response['exception'] = get_class($e);
                    $response['message'] = $e->getMessage();
                    $response['trace'] = $e->getTrace();
                    return $this->sendFailedLoginResponse($request);
                }
            }else{
                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }
                $this->incrementLoginAttempts($request);
                return $this->sendFailedLoginResponse($request);
            }
        }
    }
}
