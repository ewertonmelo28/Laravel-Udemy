<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato',['title' => 'Contato','motivo_contatos'=>$motivo_contatos]);
    }
    public function salvar(Request $request){
    //Realizar a validação dos dados do formulário recebidos no request

    $regras = [
        'nome'=>'required|min:3|max:40|unique:site_contatos',  //nomes com no mínimo 3 caracteres e no maximo 40
        'telefone'=>'required',
        'email'=>'required|email',
        'motivo_contatos_id'=>'required',
        'mensagem'=>'required|max:2000',
    ];
    $feedback = [
        'nome.min' => 'O nome precisa ter mais de 3 caracteres',
        'nome.max' => 'O nome precisa ter menos de 40 caracteres',
        'nome.unique' => 'Já existe o nome cadastrado',
        'email' => 'Email invalido',
        'motivo_contatos_id.required' => 'O campo motivo do contato é obrigatório',
        'mensagem.max'=> 'A mensagem deve ter no maximo 2000 caracteres',
        'required' => 'O campo :attribute é obrigatório'
    ];
        $request->validate($regras, $feedback);

    SiteContato::create($request->all());
    return redirect()->route('site.index');
    }
}
