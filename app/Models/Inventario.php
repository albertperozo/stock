<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    public function empresa()
    {
        return $this->belongsTo(Empresas::class, 'id_empresa', 'id');
    }
}
