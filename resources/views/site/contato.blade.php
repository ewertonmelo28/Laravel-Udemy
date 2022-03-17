@extends('site.layouts.basico')
@section('title', $title)


@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="informacao-pagina">
            <div class="contato-principal">
                @component('site.layouts._components.form_contato',['x' => 10])
                    
                @endcomponent
            </div>
        </div>
    </div>

@endsection
