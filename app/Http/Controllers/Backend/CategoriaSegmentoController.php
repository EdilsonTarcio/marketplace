<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriaSegmentoDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\CategoriaSegmento;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Str;

class CategoriaSegmentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoriaSegmentoDataTable $dataTable)
    {
        return $dataTable->render('admin.segmento.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.segmento.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => ['required'],
            'id_subcategoria' => ['required'],
            'name' => ['required', 'max:20', 'unique:categoria_segmentos,name'],
            'status' => ['required']
        ]);

        $categoriaSegmento = new CategoriaSegmento();
        $categoriaSegmento->id_categoria = $request->id_categoria;
        $categoriaSegmento->id_sub_categoria = $request->id_subcategoria;
        $categoriaSegmento->name = $request->name;
        $categoriaSegmento->slug = Str::slug($request->name);
        $categoriaSegmento->status = $request->status;
        $categoriaSegmento->save();

        return redirect()->route('categoria-segmento.index')->with('success', 'Segmento criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function getSubcategorias(Request $request)
    {
        $subCategorias = SubCategoria::where(['id_categoria' => $request->id_categoria_master, 'status' => 1])->get();
        return $subCategorias;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categorias = Categoria::all();
        $categoriaSegmento = CategoriaSegmento::findOrFail($id);
        $subCategorias = SubCategoria::where('id_categoria', $categoriaSegmento->id_categoria)->get();

        return view('admin.segmento.edit', compact('categorias', 'subCategorias', 'categoriaSegmento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_categoria' => ['required'],
            'id_subcategoria' => ['required'],
            'name' => ['required', 'max:20', 'unique:categoria_segmentos,name,'.$id],
            'status' => ['required']
        ]);

        $categoriaSegmento = new CategoriaSegmento();
        $categoriaSegmento->id_categoria = $request->id_categoria;
        $categoriaSegmento->id_sub_categoria = $request->id_subcategoria;
        $categoriaSegmento->name = $request->name;
        $categoriaSegmento->slug = Str::slug($request->name);
        $categoriaSegmento->status = $request->status;
        $categoriaSegmento->save();

        return redirect()->route('categoria-segmento.index')->with('success', 'Segmento criado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = CategoriaSegmento::find($id);
        $categoria->delete();
        return response(['status' =>'success','message' => 'Excluido com sucesso']);
    }

    public function atualizaStatus(Request $request)
    {
        $categoriaSegmento = CategoriaSegmento::find($request->id);
        $categoriaSegmento->status = $request->status == 'true' ? 1 : 0;
        $categoriaSegmento->save();

        return response(['status' => 'success','message' => 'Status Atualizado']);
    }
}
