<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SubCategoriaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Str;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoriaDataTable $dataTable)
    {
        return $dataTable->render('admin.subcategoria.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.subcategoria.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   //validação entrada de dados
        $request->validate([
            'id_categoria' => ['required'],
            'name' => ['required', 'max:200', 'min:2', 'unique:sub_categorias,name'],
            'status' => ['required']
        ]);

        $subCategoria = new SubCategoria();
        $subCategoria->id_categoria = $request->id_categoria;
        $subCategoria->name = $request->name;
        $subCategoria->status = $request->status;
        $subCategoria->slug = Str::slug($request->name);
        $subCategoria->save();

        return redirect()->route('subcategoria.index')->with('success', 'Subcategoria '.$request->name.' criada com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
