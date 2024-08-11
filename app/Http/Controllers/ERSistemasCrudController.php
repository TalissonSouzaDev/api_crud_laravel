<?php

namespace App\Http\Controllers;

use App\Models\tbl_crud;
use Illuminate\Http\Request;

class ERSistemasCrudController extends Controller
{
    protected $model;
    public function __construct(tbl_crud $model)
    {
        $this->model = $model;
    }

    public function index() {
        $cruds = $this->model->all();
        return view("pages.home.index",compact('cruds'));
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
        return redirect()->route("home");
    }
}
