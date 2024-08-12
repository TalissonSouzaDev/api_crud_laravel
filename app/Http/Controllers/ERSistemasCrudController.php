<?php

namespace App\Http\Controllers;

use App\Models\tbl_crud;
use Carbon\Carbon;
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
        $data = Carbon::now();
        $atendimento_diarios = 0;
        $atendimento_semanal = 0;
        $atendimento_mensal = 0;

        foreach ($cruds as $crud) {
            $created_at = Carbon::parse($crud->created_at);
        
            // Contar atendimentos do dia
            if ($created_at->isToday()) {
                $atendimento_diarios++;
            }
        
            // Contar atendimentos da semana
            if ($created_at->isSameWeek($data)) {
                $atendimento_semanal++;
            }
        
            // Contar atendimentos do mês
            if ($created_at->isSameMonth($data)) {
                $atendimento_mensal++;
            }
        }
        return view("pages.home.index",compact('cruds','atendimento_diarios','atendimento_semanal','atendimento_mensal'));
    }

}
