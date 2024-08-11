<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class VIACEPController extends Controller
{


    public function index() {
        dd("teste");
    }
    public function APIVIACEP(string $cep)
    {
        //dd($cep);
        try {
            $str_cep = str_replace(array('.', '-', '/'), "", $cep);
            $url = "viacep.com.br/ws/$str_cep/json/";
            $response = Http::get($url);
            $responseJson = $response->json();
            return response()->json($responseJson, 200);
        }
        catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
    }
}

}
