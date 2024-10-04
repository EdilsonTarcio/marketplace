<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class SubCategoria extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'icon',
        'status'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
