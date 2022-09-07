<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


    public function getPage()
    {
        return view('front.auth.register');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ], [

            'name.required' => 'يرجي ادخال الايميل',
            'name.string' => 'يجب ان يكون حروف',
            'name.max' => 'يجب ان لايتعدي 255',
            'email.required' => 'يرجي ادخال الايميل',
            'email.string' => 'يجب ان يكون حروف',
            'email.email' => 'يجب ان يكون ايميل صحيح',
            'email.max' => 'يجب ان لايتعدي 255',
            'password.required' => 'يرجي ادخال كلمه المرور',
            'password.min' => 'يجب ان تكون 8 احرف',
            'password.confirmed' => 'غير مطابقة',
        ]);
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'Status' => "مفعل",
            'roles_name' => ["user"],
            'password' => Hash::make($request->password),
        ]);
        session()->flash('Add', 'تم التسجيل بنجاح ');
        return redirect('/site');
    }
}
