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

    public function index() : JsonResponse
    {
        $categoria = Categoria::orderBy('id', 'DESC')->get();

        return response()->json([
            'status' => true,
            'categorias' => $categoria
        ], 200);
    }

    public function show(Categoria $categoria) : JsonResponse
    {
        return response()->json([
            'status' => true,
            'categoria' => $categoria
        ], 200);
    }

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
