<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProdutosDataTable;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Produto;
use App\Models\Vendedor;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;

class ProdutoController extends Controller
{
    use UploadImageTrait;
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
        $user = Auth::user();
        $marca = Marca::find($request->marca);
        $vendedor = Vendedor::where('id_usuario', $user->id)->first();
        $upCapa = $this->updateImage($request, 'imagemCapa', 'uploads');

        $produto = new Produto();
        $produto->sku = $request->sku;
        $produto->nome = $request->nome;
        $produto->slug = Str::slug($request->nome);
        $produto->capa = $upCapa;
        $produto->id_vendedor = $vendedor->id;
        $produto->id_usuario_cricao = $user->id;
        $produto->id_marca = $request->marca;
        $produto->fabricante = $marca->name;
        $produto->cor = $request->cor;
        $produto->descricao_curta = $request->descricaoCurta;
        $produto->descricao_longa = $request->descricaoLonga;
        $produto->video = $request->video;
        $produto->codigo_barras = $request->codigo_barra;
        $produto->save();

        //falta adicionar as categorias

        return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
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
