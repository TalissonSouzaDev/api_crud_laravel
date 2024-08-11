<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_crud extends Model
{
    use HasFactory;
    protected $table = "tbl_crud";
    protected $fillable = [ "name","phone","phone2","cpf","cep","opcao" ];
}
