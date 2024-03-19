<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\Pembeli;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function check(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Pembeli::where("username", $username)->where("password", $password);
        if ($data->count() > 0) {
            Session::put("logged_in", true);
            Session::put("pembeli", $data->first());
            return redirect("/");
        } else {
            return redirect("/login")->with("message", "Username/Password tidak cocok!");
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
