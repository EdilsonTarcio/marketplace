<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//inclui todos os arquivos de rotas dentro da pasta web
foreach (File::allFiles(__DIR__.'/web') as $fileRoutes) {
    require $fileRoutes->getPathname();
}

require __DIR__.'/auth.php';
