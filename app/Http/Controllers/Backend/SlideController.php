<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //envio de imagem
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validações
        $request->validate([
            'banner' => ['required', 'image', 'max:2048'],
            'title_one' => ['string', 'max:200'],
            'title_two' => ['required', 'max:200'],
            'starting_price' => ['max:200'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);
        //remoção do token do request
        $slider = $request->except('_token');

        //upload da imagem
        $slider['banner'] = $this->uploadImage($request, 'banner', 'uploads/sliders');
        //salvando slider
        Slider::create($slider);

        return redirect()->back()->with('success', 'Senha atualizada!');
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
