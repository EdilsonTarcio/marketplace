<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;
use App\Models\SubCategoria;

class CategoriaSegmento extends Model
{
    //Relação com categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    //Relação com subcategoria
    public function subcategoria()
    {
        return $this->belongsTo(SubCategoria::class, 'id_sub_categoria');
    }

}
