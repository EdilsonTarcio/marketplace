<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPerfilVendedorController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfil = Vendedor::where('id_usuario', Auth::user()->id)->first();
        return view('admin.perfil-vendedor.index', compact('perfil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'fone' => ['required', 'max:25'],
            'email' => ['required', 'email'],
            'facebook_link' => ['nullable', 'url'],
            'instagram_link' => ['nullable', 'url'],
            'youtube_link' => ['nullable', 'url'],
            'x_link' => ['nullable', 'url'],
            'descricao' => ['required','min:10'],
            'banner' => ['image','nullable','max:3000']
        ]);

        $vendedor = Vendedor::where('id_usuario', Auth::user()->id)->first();
        $pastaBanner = $this->uploadImage($request, 'banner', 'uploads', $vendedor->banner);
        $vendedor->banner = empty(!$pastaBanner) ? $pastaBanner : $vendedor->banner;
        $vendedor->fone = $request->fone;
        $vendedor->email = $request->email;
        $vendedor->descricao = $request->descricao;
        $vendedor->facebook_link = $request->facebook_link;
        $vendedor->instagram_link = $request->instagram_link;
        $vendedor->youtube_link = $request->youtube_link;
        $vendedor->x_link = $request->x_link;
        $vendedor->save();

        return redirect()->back()->with('success', 'Perfil atualizado com sucesso');
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
