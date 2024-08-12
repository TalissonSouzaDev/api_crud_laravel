<?php

use App\Http\Controllers\API\{
    ERSistemasCrudAPIController,
    VIACEPController
};
use Illuminate\Support\Facades\Route;

    /**
     * Routa ERSISTEMASCrudAPIController
     */

Route::prefix("ersistemas")->middleware(['cors'])->group(function(){
 Route::post("/create",[ERSistemasCrudAPIController::class,"create"]);
 Route::get("/{id}",[ERSistemasCrudAPIController::class,"FindByIdAndAtivo"]);
 Route::put("/update/{id}",[ERSistemasCrudAPIController::class,"update"]);
 Route::delete("/delete/{id}",[ERSistemasCrudAPIController::class,"destroy"]);
 /**
  * Routa VIACEPINTERNA
  */
Route::match(['get','post'],"/viacep/{cep}",[VIACEPController::class,"APIVIACEP"]);

});

