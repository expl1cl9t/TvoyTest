<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mockery\Exception;

class AuthController extends Controller
{
    public function regUser(Request $request){

        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'fname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'school' => 'required',
            'role' => 'required',
            'birthday' => 'date'
        ]);


        try {
            $user = User::create([
                'Name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
                'Email' => $request->input('email'),
                'role_id' => $request->input('role'),
                'school_id' => $request->input('school'),
                'Surname' => $request->input('surname'),
                'Patronymic' => $request->input('fname'),
                'Birthday' => $request->input('birthday')
            ]);

            return redirect()->route('register')->with('success', 'Вполне успешно');

        }
        catch(\Exception $ex){
            session()->flash('message','Ошибка при регистрации ' . $ex->getMessage());
            return redirect()->route('register')->with('message',$ex->getMessage());
        }
    }

    public function auth(Request $request){
        if (Auth::check()){
            return 'еблан ты уже в системе';
        }

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $rem = $request->input('remember') == 'on';

        if (Auth::attempt(['Email' => $request->input('email'), 'password' => $request->input('password')], $remember = $rem)){
            $request->session()->regenerate();

            return 'Пользователь был успешно авторзован, пока пусть будет заглушка';
        }
        else{
            return back()->with('message', 'Пользователь с такими данными не обнаружен'. $request->input('password') . $request->input('email'));
        }
    }
}
