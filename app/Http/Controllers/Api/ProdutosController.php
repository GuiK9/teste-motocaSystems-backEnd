<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Cria novo produto com os dados fornecidos na requisição.
     * 
     * @param Illuminate\Http\Request $request O objeto de requisição contendo os dados do produto a ser criado.
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(Request $request) : JsonResponse
    {
        DB::beginTransaction();
            try {
                $produto = Produto::create([
                'nome'=> $request->nome,
                'descricao'=> $request->descricao,
                'preco'=> $request->preco,
                'categoria_id'=> $request->categoria_id
            ]);

            DB::commit();
            return response()->json([
                'status'=> true,
                'id_produto'=> $produto->id
            ], 201);

        } catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message'=> "Produto não cadastrado"
            ],400);
        }
    }


    /**
     * Retorna uma lista de produtos.
     * 
     * Este método recupera uma lista de produtos do banco de dados e retorna como uma 
     * resposta JSON.
     * 
     * @Return \Illuminate\Http\JsonResponse 
     */
       

    public function index() : JsonResponse
    {
        $produto = Produto::orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => true,
            'produtos' => $produto
        ], 200);
    }


     /**
     * Exibe os detalhes de um produto específico.
     * 
     * Este método retorna os detalhes de um produto específico em formato JSON.
     * 
     * @param \App\Models\Produto $produto O objeto do produto a ser exibido
     * @return \Illuminate\Http\JsonResponse 
     */

    public function show(Produto $produto) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'produto' => $produto,
        ], 200);
    }

    /**
     * Atualizar os dados de um produto existente com base nos dados fornecidos na requisição.
     * 
     * @param Illuminate\Http\Request $request O objeto de requisição contendo os dados do produto a ser atualizado.
     * @param \App\Models\Produto $produto O produto a ser atualziado.
     * @return \Illuminate\Http\JsonResponse
     */

    public function update(Request $request, Produto $produto) : JsonResponse
    {   
        DB::beginTransaction();
        try {
            $produto->update([
                'nome'=> $request->nome,
                'descricao'=> $request->descricao,
                'preco'=> $request->preco,
                'categoria_id'=> $request->categoria_id
            ]);

            DB::commit();

            return response()->json([
                "status"=> true,
                "produto"=> $produto,
                "messagem"=> "produto editado com sucesso!"
            ], 200);

        }catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'=> false,
                'message' => "produto não editado"
            ], 400);
        } 
    }


    /**
     * Exclui prduto no banco de dados.
     * 
     * @param \App\Models\Produto
     * @return \Illuminate\Http\JsonResponse
     */

    public function destroy(Produto $produto) : JsonResponse
    {
        try {
            $produto->delete();
            
            return response()->json([
                "status"=> true,
                "produto"=> $produto,
                "messagem"=> "produto apagado com sucesso!"
            ], 200);
        
        } catch (Exception $e) {
            return response()->json([
                'status'=> false,
                'message' => "produto não apagado"
            ], 400);
        }
    }
}
