<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Website\Post;
use App\Modules\Backend\Website\Post\Repositories\PostRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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
    private $view_data, $postRepository;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * LoginController constructor.
     * @param PostRepository $postRepository
     */
    public function __construct( PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm(Request $request)
    {
        $requestData=$request->all();
        $this->view_data['terms']= $this->postRepository->findById(152);
        $authUser=Auth::User();
        return view('auth.login',compact('requestData','authUser'),$this->view_data);
    }
    public function username()
    {
        return 'user_name';
    }


    public function login(Request $request) {
       // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        $username = $request->user_name;
        if(filter_var($username, FILTER_VALIDATE_EMAIL)) {
            //user sent their email
            Auth::attempt(['email' => $username, 'password' => $request->password]);
        } else {
            //they sent their username instead
            Auth::attempt(['user_name' => $username, 'password' => $request->password]);
        }

//was any of those correct ?
        if ( Auth::check() ) {
            if(Auth::user()->active()) {
                    if (Auth::user()->mainRole()->name === 'administrator') {
                        return redirect()->intended('dashboard');
                    } else if (Auth::user()->mainRole()->name === 'customer') {
                        return redirect()->intended('/');
                    } elseif (Auth::user()->mainRole()->name === 'seller') {
                        return redirect()->intended('dashboard');
                    }
            }
            else{
                Auth::logout();
                return redirect()->back()->withErrors([
                    'active' => 'You must be an active user'
                ]);
            }


            //send them where they are going

        }

//Nope, something wrong during authentication
                        return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'))
                    ->withErrors(['credentials' => 'Invalid credentials, Please check them']);


     // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

}
