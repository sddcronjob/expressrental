<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Model\User;

class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    */


    public function index() {
    	return view('Home.home');
	}

	public function login() {
        $mailuser = '';
        
        if (Auth::check()) {
            return Redirect::to('/');
        }
        

        if (Request::isMethod('post')) {
                $userData = array(
                    'email' => Input::get('email'),
                    'password' => Input::get('password')
                );
                $auth = Auth::attempt($userData);
                if ($auth) {
                    return Redirect::to('/users/list');
                } else {
                    return Redirect::to('/')
                                    ->withErrors('Wrong email address or password.') // send back all errors to the login form
                                    ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                }
        } else {
            return Redirect::to('/');
        }
    }

    public function userList(){
        if (!Auth::check()) {
            return Redirect::to('/');
        }

        $message = '';
        if (Request::isMethod('post')) {
            $data = Input::except('_token');
            $password = Hash::make((Input::get('password')));

            $user = new User();
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->password = $password;
            if ($user->save()) {
                $message = 'Added Successfully';
                return Redirect::to('/users/list')->with('message', $message);
            } else {
                $message = 'Addition not Successfully';
                return Redirect::to('/users/list')->withErrors('message',$message);
            }
        } else {
            $allUserInfo = DB::table('users')
            ->orderBy('users.id', 'DESC')
                ->paginate(5);
            return view('Home.list')->with(compact('allUserInfo'));
        }
    }
}
