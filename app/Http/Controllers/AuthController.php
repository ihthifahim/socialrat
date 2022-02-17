<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users;
use Hash;
use Session;

class AuthController extends Controller
{
    //


    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        
        
        $user = Users::where([
            'username' => $username,
            
        ])->first();

        

        if($user != null){
            if(Hash::check($password, $user->password) == true){
                session([
                    'user_email' => $user->email,
                    'user_firstName' => $user->firstName,
                    'user_lastName' => $user->lastName,
                    'user_role' => $user->userId,
                    'user_id' => $user->user_id
                ]);
                
                return redirect('/dashboard');
                
            } else {
                return redirect('/login')->with('mssg', 'wrongpassword');
            }
        } else {
            return redirect('/login')->with('mssg', 'wronguser');
        }
    }
    

    public function signout(){
        Session::flush();
        return redirect('/login');
    }

    public function allUsers(){
        $users = Users::all();
        return view('users.allusers', [
            'users' => $users
        ]);
    }

    public function newUser(){
        return view('users.newuser');
    }

    public function createUser(Request $request){

        $user = New Users;
        $user->firstName = $request->firstname;
        $user->lastName = $request->lastname;
        $user->email = $request->email;
        $user->userId = $request->userlevel;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/users');
    }

    public function viewUser($id){
        $user = Users::where('user_id', '=', $id)->first();
        return view('users.viewuser', [
            'user' => $user
        ]);
    }

    public function updateUser(Request $request){
        Users::where('user_id', '=', $request->userid)->update([
            'username' => $request->username,
            'firstName' => $request->firstname,
            'lastName' => $request->lastname,
            'email' => $request->email,
            'userId' => $request->userlevel,
            
        ]);

       
        if($request->password != ""){
            
            Users::where('user_id', '=', $request->userid)->update([
                'password' => Hash::make($request->password)
            ]);
        }

        return redirect('/users')->with('status', 'updated');
    }
}
