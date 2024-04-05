<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $r){
        // dd(Auth::user()); Quando faz uma validação com o Auth::attempt, cria um usuario no Auth

        if(Auth::check()){ // Verificar se o usuário já está logado e poder ir direto para home
            return redirect(route('home'));
        }
        return view('login');
    }

    public function login_action(Request $request){
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt($validator)){  // Validando se existe esse usuário no banco de dados
            return redirect(route('home'));
        }
    }

    public function register(Request $r){

        if(Auth::User()){  // Diferença para o Auth::check() é que o User() vai retornar o todos os dados do usuario e o check() só vai checar, consome mais tempo
            return redirect(route('home'));
        }
        return view('register');
    }

    public function register_action(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $data = $request->only('name', 'email', 'password');

        $data['password'] = Hash::make($data['password']); // Está encriptografando a senha

        User::create($data);
        return redirect(route('login'));
    }

    public function logout() {
        Auth::logout();
        return redirect(route('login'));
    }
}
