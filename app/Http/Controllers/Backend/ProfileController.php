<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'email', 'max:200', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:5048'],
        ]);

        $user = Auth::user();

        if($request->hasFile('image')){
            if(File ::exists(public_path($user->image))){
                File::delete(public_path($user->image));
            }
            $image = $request->image;
            $imageName = rand() . '-talice-' . $image->getClientOriginalName();
            $image->move(public_path('uploads/imageProfile'), $imageName);

            $path = "/uploads/imageProfile/" . $imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Usuario '.$request->name.' atualizado');
    }
}
