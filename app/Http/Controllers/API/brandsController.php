<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brands;

class brandsController extends Controller
{
    public function get()
    {
        // ... (Otras declaraciones de clases y espacios de nombres)

        // Método para obtener todas las marcas
        try {
            $data = brands::get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    // Método para crear una nueva marca
    public function create(Request $request)
    {
        // ... (Código para crear una nueva marca)
        $brands = brands::create([
            'name' => $request->name
        ]);

        $brands->save();

        return Response()->json([
            'status' => true,
            'data' => $brands ?? []
        ], 200);
    }

    // Método para obtener una marca por su ID
    public function getById($id){
        // ... (Código para obtener una marca por su ID)
        try {
            $data = brands::find($id);
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    // Método para actualizar una marca
    public function update(Request $request, $id){
        // ... (Código para actualizar una marca)
        try {
            $data['name'] = $request['name'];
            brands::find($id)->update($data);
            $res = brands::find($id);
            return response()->json($res, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    // Método para eliminar una marca
    public function delete($id){
         // ... (Código para eliminar una marca)
        try {
            $res = brands::find($id)->delete();
            return response()->json(["deleted" => $res], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

}
