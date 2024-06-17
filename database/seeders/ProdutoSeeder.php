<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   

        $altaCCCategoriaId = Categoria::where('descricao', 'Alta cilindrada')->first()->id;
        $baixaCCCategoriaId = Categoria::where('descricao', 'Baixa cilindrada')->first()->id;

        
        if(!Produto::Where('nome', 'CB 650R')->first()){
            Produto::create([
                'nome' => 'CB 650R',
                'descricao' => 'Esportiva com estilo Neo Sports Café e motor de quatro cilindros em linha.',
                'preco' => 52590,
                'categoria_id' => $altaCCCategoriaId
            ]);
        };

        if(!Produto::Where('nome', 'CB 1000R')->first()){
            Produto::create([
                'nome' => 'CB 1000R',
                'descricao' => 'Naked de alto desempenho da Honda, com motor de quatro cilindros e estilo agressivo.',
                'preco' => 78870,
                'categoria_id' => $altaCCCategoriaId
            ]);
        };

        if(!Produto::Where('nome', 'CB 1000R Black edition')->first()){
            Produto::create([
                'nome' => 'CB 1000R Black edition',
                'descricao' => 'Versão especial da naked CB 1000R com acabamento em preto e detalhes exclusivos.',
                'preco' => 87730,
                'categoria_id' => $altaCCCategoriaId
            ]);
        };


        if(!Produto::Where('nome', 'XRE 190')->first()){
            Produto::create([
                'nome' => 'XRE 190',
                'descricao' => 'Versátil motocicleta de uso misto, ideal para cidade e trilhas leves.',
                'preco' => 20770,
                'categoria_id' => $baixaCCCategoriaId
            ]);
        };


        if(!Produto::Where('nome', 'CBR 650R')->first()){
            Produto::create([
                'nome' => 'CBR 650R',
                'descricao' => 'Motocicleta esportiva de alta performance com design aerodinâmico e motor de quatro cilindros.',
                'preco' => 55360,
                'categoria_id' => $altaCCCategoriaId
            ]);
        };
    }
}
