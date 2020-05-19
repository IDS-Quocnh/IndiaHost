<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Model\User;
use App\Model\SystemOption;
use App\Model\UserOption;

class UserController extends Controller
{
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

    public function saveConfig(Request $request){
        if(auth()->user()->is_admin == 1){
            $systemOption = SystemOption::query()->where("key", "=" , $request->key)->first();
            if(isset($systemOption)){
                $systemOption->value = $request->value;
            }else{
                $systemOption = new SystemOption;
                $systemOption->key = $request->key;
                $systemOption->value = $request->value;
            }
            $systemOption->save();
        }else{
            $userOption = UserOption::query()->where("key", "=" , $request->key)->where("user_id", "=", auth()->user()->id)->first();
            if(isset($userOption)){
                $userOption->value = $request->value;
            }else{
                $userOption = new UserOption;
                $userOption->key = $request->key;
                $userOption->id = auth()->user()->id;
                $userOption->value = $request->value;
            }
            $userOption->save();
        }
    }
}
