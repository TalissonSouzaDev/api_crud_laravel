<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tbl_crud;
use Illuminate\Http\Request;

class ERSistemasCrudAPIController extends Controller
{

    protected $model;
    public function __construct(tbl_crud $model)
    {
        $this->model = $model;
    }

    public function FindByIdAndAtivo(string $id)
    {
        $result = $this->model->findOrFail($id);
        $response = $result->ativo == 1 ? response()->json($result, 200) : response()->json(['error' => 'Registro inativo'], 404);
        return $response;
    }

    public function create(Request $request)
    {

        
        $data =  [
            "name" => $request->name,
            "phone" => $request->phone,
            "phone2" => !empty($request->phone2) ? $request->phone2 : "00000000000",
            "cpf" => $request->cpf,
            "cep" => $request->cep,
            "opcao" => $request->opcao
        ];

        $this->model->create($data);
        return response()->json(['message' => 'Registro criado com sucesso'], 201);
    }

    public function update(Request $request, string $id)
    {
        $data =  [
            "name" => $request->name,
            "phone" => $request->phone,
            "phone2" => !empty($request->phone2) ? $request->phone2 : 00000000000,
            "cpf" => $request->cpf,
            "cep" => $request->cep,
            "opcao" => $request->opcao
        ];

        $this->model->findOrFail($id)->update($data);
        return response()->json(['message' => 'Registro atualizado com sucesso'], 200);
    }

    public function destroy(string $id)
    {
        $this->model->findOrFail($id)->delete();
        return response()->json(['message' => 'Registro excluído com sucesso'], 204);
    }
}
