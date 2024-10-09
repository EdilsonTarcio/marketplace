<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\MarcasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Str;

class MarcaController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(MarcasDataTable $dataTeble)
    {
        return $dataTeble->render('admin.marcas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => ['image', 'required', 'max:2000'],
            'name' => ['required','max:100', 'unique:marcas,name'],
            'destacada' => ['required'],
            'status' => ['required']
        ]);

        $pastaLogo = $this->updateImage($request, 'logo', 'uploads');
        $marca = new Marca();

        $marca->logo = $pastaLogo;
        $marca->name = $request->name;
        $marca->slug = Str::slug($request->name);
        $marca->destacada = $request->destacada;
        $marca->status = $request->status;
        $marca->save();

        return redirect()->route('marcas.index')->with('success', 'Marca criada com sucesso');
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

    public function atualizaStatus(Request $request)
    {
        $atualizaStatus = Marca::find($request->id);
        $atualizaStatus->status = $request->status == 'true' ? 1 : 0;
        $atualizaStatus->save();
        
        return response(['status' => 'success','message' => 'Status Atualizado']);
    }
}
