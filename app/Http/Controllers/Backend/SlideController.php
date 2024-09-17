<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    //envio de imagem
    use UploadImageTrait;

    public function index(SliderDataTable $dataTable)
    {
        return $dataTable->render('admin.slider.index');
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SlideRequest $request)
    {
        //remoção do token do request
        $slider = $request->except('_token');

        //upload da imagem
        $slider['banner'] = $this->uploadImage($request, 'banner', 'uploads/sliders');
        //salvando slider
        Slider::create($slider);

        return redirect()->back()->with('success', 'Senha atualizada!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SlideRequest $request, Slider $slider)
    {
          //Atualiza a imagem caso tenha sido enviado se não usa a aintiga
          $imagePath = $this->updateImage($request, 'banner', 'uploads/sliders', $slider->banner);

          $slider->update([
              'banner' => empty(!$imagePath) ? $imagePath : $slider->banner,
              'title_one' => $request->title_one,
              'title_two' => $request->title_two,
              'starting_price' => $request->starting_price,
              'status' => $request->status,
              'link' => $request->link,
              'serial' => $request->serial
            ]);

          return redirect()->route('slider.index')->with('success', 'Slide atualizado com sucesso!');
    }

    public function destroy(Slider $slider)
    {

        $this->deleteImage($slider->banner);
        $slider->delete();
        
        return response(['status' => 'success', 'message' => 'Excluido com sucesso']);
    }
}
