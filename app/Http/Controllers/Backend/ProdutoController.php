<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProdutosDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProdutosDataTable $dataTable)
    {
        return $dataTable->render('admin.produtos.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categorias'] = Categoria::where('status', 'true')->orderBy('id')->get();
        $data['marcas'] = Marca::where('status', 'true')->orderBy('id')->get();
        return view('admin.produtos.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
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
