<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;


class ProdutoController extends Controller
{
    public function index(Request $request){
        $data = [];
        //Buscar todos os produtos
        //Select * from produtos;
        $listaProdutos = Produto::all();
        $data["lista"] = $listaProdutos;

        return view("home", $data);
    }

    public function categoria(Request $request, $idcategoria = null)
{
    $data = [];

    // Busca todas as categorias
    $listaCategorias = Categoria::all();

    // Configura a consulta para buscar produtos, limitado a 4
    $queryProduto = Produto::limit(4);

    // Verifica se um id de categoria foi fornecido
    if ($idcategoria) {
        // Filtra os produtos pela categoria fornecida
        $queryProduto->where("categoria_id", $idcategoria);
    }

    $listaProdutos = $queryProduto->get();

    $data["lista"] = $listaProdutos;
    $data["listaCategoria"] = $listaCategorias;
    $data["idcategoria"] = $idcategoria;

    return view("categoria", $data);
}

public function adicionarCarrinho($idProduto = 0, Request $request){

    //Buscar produto pelo ID
    $prod = Produto::find($idProduto);

    if($prod){
        //Encontrou um produto
        //Buscar da sessão o carrinho atual
        $carrinho = session('cart', []);

        array_push($carrinho, $prod);
        session(['cart'=>$carrinho]);
    }
    return redirect()->route("home");
}

    public function verCarrinho(Request $request){
        $carrinho = session('cart',[]);
        $data = ['cart' => $carrinho];

        return view("carrinho",$data);
    }

    


    
}
