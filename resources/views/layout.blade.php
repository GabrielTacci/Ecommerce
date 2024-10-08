@if(\Auth::check())
    <p>Autenticado como: {{ \Auth::user()->nome }}</p>
@else
    <p>Nenhum usuário autenticado</p>
@endif

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield("scriptjs")
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">My shop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
            <a class="nav-link" href="{{ route('home')}}">HOME</a>
                <a class="nav-link" href="{{ route('categoria')}}">Categorias</a>
                <a class="nav-link" href="{{ route('cadastrar')}}">Cadastrar</a>
                @if(!\Auth::user())
                <a class="nav-link" href="{{ route('logar')}}">Logar</a>
                @else
                <a class="nav-link" href="{{ route('sair')}}">Logout</a>
                @endif

             </div>
        </div>
        <a href="{{ route('ver_carrinho')}}" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
    </nav>

    <div class="container">
        <div class="row">

            @if(\Auth::user())
                <div class="col-12">
                    <p class="text-right">Seja Bem-Vindo, {{ \Auth::user()->nome}}, <a href="{{ route('sair')}}">Sair</a></p>
                </div>
            @endif

            @if($message = Session::get("erro"))
                <div class="col-12">
                        <div class="alert alert-danger">{{ $message }}</div>
                </div>
            @endif

            @if($message = Session::get("ok"))
                <div class="col-12">
                        <div class="alert alert-success">{{ $message }}</div>
                </div>
            @endif
            <!-- Nesta Div terá uma área que os arquivos irão adicionar conteudo -->
             @yield("conteudo")
        </div>
    </div>
    
</body>
</html>