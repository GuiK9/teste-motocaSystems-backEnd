<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
     /**
     * Cria nova categoria com os dados fornecidos na requisição.
     * 
     * @param Illuminate\Http\Request $request O objeto de requisição contendo os dados da categoria a ser criado.
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request) : JsonResponse
    {
        DB::beginTransaction();
            try {
                $categoria = Categoria::create([
                'nome'=> $request->nome,
            ]);

            DB::commit();
            return response()->json([
                'status'=> true,
                'id_categoria'=> $categoria->id
            ], 201);

        } catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message'=> "Categoria não cadastrada"
            ],400);
        }
    }


    /**
     * Retorna uma lista de categorias.
     * 
     * Este método recupera uma lista de categorias do banco de dados e retorna como uma 
     * resposta JSON.
     * 
     * @Return \Illuminate\Http\JsonResponse 
     */

    public function index() : JsonResponse
    {
        $categoria = Categoria::orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => true,
            'categorias' => $categoria
        ], 200);
    }

    /**
     * Exibe os detalhes de uma categoria específica.
     * 
     * Este método retorna os detalhes de uma categoria específica em formato JSON.
     * 
     * @param \App\Models\Categoria $categoria O objeto da categoria a ser exibida
     * @return \Illuminate\Http\JsonResponse 
     */

    public function show(Categoria $categoria) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'categoria' => $categoria
        ], 200);
    }


    /**
     * Atualizar os dados de uma categoria existente com base nos dados fornecidos na requisição.
     * 
     * @param \Illuminate\Http\Request $request O objeto de requisição contendo os dados da categoria a ser atualizada.
     * @param \App\Models\Categoria $cateoria A categoria a ser atualziado.
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, Categoria $categoria) : JsonResponse
    {   
        DB::beginTransaction();
        try {
            $categoria->update([
                'nome'=> $request->nome
            ]);

            DB::commit();

            return response()->json([
                "status"=> true,
                "categoria"=> $categoria,
                "messagem"=> "categoria editada com sucesso!"
            ], 200);

        }catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message' => "categoria não editada"
            ], 400);
        } 
    }


    /**
     * Exclui a categoria no banco de dados.
     * 
     * @param \App\Models\Categoria
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Categoria $categoria) : JsonResponse
    {
        try {
            $categoria->delete();
            
            return response()->json([
                "status"=> true,
                "categoria"=> $categoria,
                "messagem"=> "categoria apagada com sucesso!"
            ], 200);
        
        } catch (Exception $e) {
            return response()->json([
                'status'=> false,
                'message' => "categoria não apagada"
            ], 400);
        }
    }

}
