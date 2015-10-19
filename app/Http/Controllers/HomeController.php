<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;
use Mail;
use Auth;
use App\Model\User;
use App\Model\BlogPost;

class HomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    */

    /**
    Method to show the home page
    @param void
    @return view
    */
    public function index() {
    	return view('Home.home');
	}

    /**
    Method to login the user and show appropriate page
    @param void
    @return view
    */
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

    /**
    Method to get information about the logged in user
    @param void
    @return view
    */
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
            $username = Input::get('name');
            $userEmail = Input::get('email');

            if ($user->save()) {
                 try {
                    Mail::send('emails.welcome', ['userEmail' => $username], function ($m) use ($userEmail,$username) {
                    $m->to($userEmail, $username)->subject('Express Rental');
                });
            }catch(Exception $ex){

         }
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

    /**
    Method to reset the password
    @param void
    @return int
    */
    public function resetPassword(){
        $userID = Input::get('id');
        $pass = Input::get('password');
        $userEmail = Input::get('resetemail');
        if(!empty($userID)) {
            $user = new User();
            $user = User::find($userID);
            $user->id = $userID;
            $user->password = Hash::make(($pass));
            if ($user->save()) {
                try {
                    Mail::send('emails.resetpassd', ['newpass' => $pass ], function ($m) use ($userEmail) {
                    $m->to($userEmail)->subject('Express Rental');
                });
            }catch(Exception $ex){

         }
                echo 1;
            } else {
                echo 0;
            }
        }
         exit;
    }

    /**
    Method to view the relationships for blog posts added by user
    @param void
    @return view
    */
    public function viewRelationship(){
        if (!Auth::check()) {
            return Redirect::to('/');
        }
        $arrBlogPostInfo = BlogPost::with(array('blog_images','users','blog_location'))->where('blog_posts.user_id',Auth::id())->get();
        return view('Home.relationship')->with(compact('arrBlogPostInfo'));
    }
}
