<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;


class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $data = [];
        return view("cadastrar", $data);
    }

    public function cadastrarCliente(Request $request)
    {
        // pega todos os valores do formulário
        $values = $request->all(); 
        $usuario = new Usuario();
        $usuario->fill($values);
        $usuario->login = $request->input("cpf", ""); 

        $senha = $request->input("password", "");
        $usuario->password = \Hash::make($senha); // Criptografia
        
        $endereco = new Endereco($values);
        $endereco->logradouro = $request->input("endereco", "");

        try {
            \DB::beginTransaction(); // Inicia uma transação
            $usuario->save(); // Salva o usuario
            $endereco->usuario_id = $usuario->id; // Relacionamento das tabelas
            $endereco->save(); // Salva o endereco
            \DB::commit(); // Confirmando a transação
        } catch (\Exception $e) {
            // Tratar o erro
            \DB::rollback(); // Cancela a transação
            return redirect()->route("cadastrar")->withErrors(['error' => $e->getMessage()]); // Exibe o erro
        }

        return redirect()->route("cadastrar")->with('success', 'Cliente cadastrado com sucesso!');
    }
}
