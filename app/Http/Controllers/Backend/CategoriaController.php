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
        $categoria = Categoria::find($id);
        return view('admin.categoria.edit', compact('categoria'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon' => ['required', 'not_in:empty'],
            'name' => ['required', 'max:200','unique:categorias,name,'.$id], //obrigatório o id para permitir atualizar
            'status' => ['required'],
        ]);

        $categoria = Categoria::find($id);

        $categoria->update([
            'icone' => $request->icon,
            'name' => $request->name,
            'status' => $request->status,
            'slug' => STR::slug($request->name),
            'status' => $request->status
          ]);

        return redirect()->route('categoria.index')->with('success', 'Categoria Atualizada!');
    }

    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return response(['status' =>'success','message' => 'Excluido com sucesso']);
    }

    public function atualizaStatus(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->status = $request->status == 'true' ? 1 : 0;
        $categoria->save();

        return response(['status' => 'success','message' => 'Status Atualizado']);
    }
}
