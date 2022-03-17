<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('title')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>

<body>
    @include('site.layouts._partials.topo')
    @yield('conteudo')
    @include('site.layouts._partials.rodape')
</body>

</html>
