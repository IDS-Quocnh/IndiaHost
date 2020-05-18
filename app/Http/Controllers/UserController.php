<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\User;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
        $userList = User::orderBy('username','asc')->get();
        if(isset($request->addUser)){
            return view('user.list')->with('susscessMessage', 'User registered successfully')->with('userList', $userList);
        }
        return view('user.list')->with('userList', $userList);
    }

    public function edit(Request $request)
    {
        if ($request->isMethod('post')) {
            $user = User::find($request->id);
            $name = $user->username;
            $user->username = $request->username;
            if($request->password != null && $request->password != ''){
                $user->password = bcrypt($request->password);
            }
            $user->is_admin = $request->is_admin;
            $user->country_code = $request->countryCode;
            $user->phone = $request->phone;
            $user->save();

            $userList = User::orderBy('username','asc')->get();
            return view('user.list')->with('susscessMessage','username "' . $name . '" edit successfully')->with('userList', $userList);
        }else{
            if (!isset($request->id)) {
                return redirect()->route('home');
            }
            $user = User::find($request->id);
            return view('user.edit')->with('user', $user);
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $name = $user->username;
        $user->delete();
        $userList = User::orderBy('username','asc')->get();
        return view('user.list')->with('susscessMessage', 'username "' . $name . '" deleted successfully')->with('userList', $userList);
    }
}
