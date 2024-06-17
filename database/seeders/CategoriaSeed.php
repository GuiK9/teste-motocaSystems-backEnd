<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!Categoria::where('nome', 'Alta cilindrada')->first()) {
            Categoria::create([
                'nome' => 'Alta cilindrada'
            ])->id;
        }

        if (!Categoria::where('nome', 'Baixa cilindrada')->first()) {
            Categoria::create([
                'nome' => 'Baixa cilindrada'
            ])->id;
        }
    }
}
