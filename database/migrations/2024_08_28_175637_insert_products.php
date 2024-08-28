<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $cat = new \App\Models\Categoria(['categoria' => 'Geral']);
        $cat->save();

        $cat2 = new \App\Models\Categoria(['categoria' => 'Informatica']);
        $cat2->save();

        $cat3 = new \App\Models\Categoria(['categoria' => 'Eletronico']);
        $cat3->save();

        $prod = new \App\Models\Produto(['nome' => 'Produto 1', 'valor' => 10, 'foto' => 'images/produto1.jpg', 
        'descricao' => '', 'categoria_id' => $cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome' => 'Produto 2', 'valor' => 10, 'foto' => 'images/produto1.jpg', 
        'descricao' => '', 'categoria_id' => $cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome' => 'Produto 3', 'valor' => 10, 'foto' => 'images/produto1.jpg', 
        'descricao' => '', 'categoria_id' => $cat->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome' => 'Produto 4', 'valor' => 10, 'foto' => 'images/produto1.jpg', 
        'descricao' => '', 'categoria_id' => $cat->id]);
        $prod4->save();

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
