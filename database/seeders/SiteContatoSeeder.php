<?php

namespace Database\Seeders;

use App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11)912345678';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão';
        $contato->save(); */

        \App\Models\SiteContato::factory()->count(100)->create();
    }
}
