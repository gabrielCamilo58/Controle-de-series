<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Series</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    
   
</head>

<body>
    <nav class="navbar navbar-light mb-2 mt-1 ml-3 mr-3" style="background-color: #e3f2fd;">
        <div class="container-fluid mb-2">
            <a class="navbar-brand" href="{{route('listar_series')}}">Home</a>

            @auth
            <a href="/sair" class="text-danger">Sair</a>
            @endauth

            @guest
            <a href="/entrar">Entrar</a>
            @endguest



        </div>
    </nav>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('cabecalho')</h1>
        </div>
        @yield('conteudo')
    </div>
</body>

<footer class=" bg-dark text-center text-white mt-4" style="background-color: #0a4275;">
    <!-- Grid container -->
    @guest
    <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
            
            <p class="d-flex justify-content-center align-items-center">
                <span class="me-4 mr-2">Registe-se gratuitamente </span>
                <a href="/registrar">
                <button  type="button" class="btn btn-outline-light btn-rounded">
                   Registrar-se
                </button>
                </a>
            </p>
        </section>
        <!-- Section: CTA -->
    </div>
    @endguest
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © 2022 Copyright:
        <a class="text-white" >Gabriel Camilo</a>
    </div>
    <!-- Copyright -->
</footer>

</html>