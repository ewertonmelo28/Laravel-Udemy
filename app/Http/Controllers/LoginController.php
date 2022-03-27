<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuario e ou senha não existe';
        }
        if($request->get('erro') == 2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }
        return view('site.login', ['title' => 'Login','erro' => $erro]);
    }


    public function autenticar(Request $request)
    {
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //feedback de validação
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
        //Validação
        $request->validate($regras, $feedback);

        //Recuperamos os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //Iniciar o Model Use
        $user = new user();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login',['erro'=>1]);
        };
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');

    }
}
