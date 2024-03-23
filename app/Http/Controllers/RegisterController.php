<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
class RegisterController extends Controller
{
    function index(){
        return view('register');
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            session()->flash('modal_message', 'Email sudah digunakan');
            return redirect('register');
        } else {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);
            session()->flash('modal_message', 'Berhasil terdaftar!');
            return redirect('/email/verify');
        }
    }

    public function emailverify()
    {
        return view('auth.verify-email');
    }

    public function verifverify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }
}
