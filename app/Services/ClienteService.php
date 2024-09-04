<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log; 


class ClienteService {

    public function salvarUsuario(Usuario $user, Endereco $endereco){
        try {
            //Buscando um usuario com o login que deve ser salvo
            $dbUsuario = Usuario::where("login",$user->login)->first();
            if($dbUsuario){
                return ['status' => 'erro', 'message' => 'Login já cadastrado no sistema.'];
            }

            \DB::beginTransaction(); // Inicia uma transação
            $user->save(); // Salva o usuario
            $endereco->usuario_id = $user->id; // Relacionamento das tabelas
            $endereco->save(); // Salva o endereco
            \DB::commit(); // Confirmando a transação

            return ['status' => 'ok', 'message' => 'Usuario cadastrado com sucesso'];

        } catch (\Exception $e) {
            // Tratar o erro
            \Log::error("ERRO", ['file' => 'ClienteService.salvarUsuario.',
                                         'message' => $e->getMessage()]);
            \DB::rollback(); // Cancela a transação
            return ['status' => 'erro', 'message' => 'Não foi possivel cadastrar o usuario.'];

        }
    }

}