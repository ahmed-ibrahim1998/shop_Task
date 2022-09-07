<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function getlogin () {

        return view('front.auth.login');
    }

    public function create (Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8'],
        ], [

            'email.required' => 'يرجي ادخال الايميل',
            'email.string' => 'يجب ان يكون حروف',
            'email.email' => 'يجب ان يكون ايميل صحيح',
            'password.required' => 'يرجي ادخال كلمه المرور',
            'password.min' => 'يجب ان تكون 8 احرف',
        ]);

        $remember_me = $request->has('remember') ? true : false;

        if (auth()->guard('site')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            return redirect('site');
        }
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }

    public function logout() {
        auth()->guard('site')->logout();

        return redirect()->route('login_user');
    }

}
