<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Log;
use Auth;

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
    // use AuthenticatesAndRegistersUsers, ThrottlesLogins {
    //         AuthenticatesAndRegistersUsers::postLogin as laravelPostLogin;
    //     }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/products';


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
        //注册时校验数据库是否已存在
        return Validator::make($data, [
            'name' => 'required|alpha_dash|max:255|min:3|unique:users',
            'email' => 'required|email|max:255|unique:users',
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
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    protected function getCredentials(Request $request)
    {
        Log::info($request);
        $loginInput = $request->get('email');
        $password = $request->get('password');
        Log::info($loginInput);
        $fieldName = 'email';
        if(filter_var($loginInput, FILTER_VALIDATE_EMAIL))
        {
          //是Email地址
          $fieldName = 'email';
        }
        elseif(preg_match("/1[3458]{1}\d{9}$/",$loginInput) &&
            strlen($loginInput)=='11')
        {
          //是手机号
          $fieldName = 'mobileNumber';
          if(Auth::attempt([$fieldName => $loginInput,'mobileVerified' => 0]))
          {
            return [
              $fieldName => $loginInput,
              'password' => '',
            ];
          }
        }
        else
        {
          //是用户名
          $fieldName = 'name';
        }
        Log::info($fieldName);

        if (Auth::attempt([$fieldName => $loginInput,
            'password' => $password ,'active' => 1]))
        {
            Log::info('active is true');
        }
        else {
            Log::info('active is false');
            return [
                $fieldName => $loginInput,
                'password' => '',
            ];
        }
        return [
            $fieldName => $loginInput,
            'password' => $password,
        ];
    }
}
