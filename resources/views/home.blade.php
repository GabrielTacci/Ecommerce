<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <nav class="navbar navbar-light navbar-expand-md bg-light pl-5 pr-5 mb-5">
    <a href="#" class="navbar-brand">My shop</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
            <a class="nav-link" href="{{ route('home')}}">HOME</a>
                <a class="nav-link" href="{{ route('categoria')}}">Categorias</a>
                <a class="nav-link" href="{{ route('cadastrar')}}">Cadastrar</a>
             </div>
        </div>
        <a href="#" class="btn btn-sm"><i class="fa fa-shopping-cart"></i></a>
    </nav>

    <div class="container">
        <div class="row">
            @if(isset($lista))
                @foreach($lista as $prod)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <img src="{{ asset($prod->foto) }}" class="card-img-top"/>
                            <div class="card-body">
                                <h6 class="cart-title">{{ $prod->nome}} - R${{ $prod->valor}}</h6>
                                <a href="#" class="btn btn-secondary">Adicionar Item</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    
</body>
</html>