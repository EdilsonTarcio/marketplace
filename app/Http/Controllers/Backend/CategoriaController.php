<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CategoriaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Str;
class CategoriaController extends Controller
{
    public function index(CategoriaDataTable $dataTable)
    {
        return $dataTable->render('admin.categoria.index');
    }

    public function create()
    {
        return view('admin.categoria.create');
    }

    public function store(CategoriaRequest $request)
    {
        //remoção do token do request
        $categoria = $request->except('_token');
        
        //upload da imagem
        $categoria['slug'] = Str::slug($categoria['name']);

        //salvando slider
        Categoria::create($categoria);
        return redirect()->back()->with('success', 'Categoria Criada!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
