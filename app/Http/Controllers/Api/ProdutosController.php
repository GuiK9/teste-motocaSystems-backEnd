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

    public function index() : JsonResponse
    {
        $produto = Produto::orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => true,
            'produtos' => $produto
        ], 200);
    }

    public function show(Produto $produto) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'produto' => $produto,
        ], 200);
    }

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
