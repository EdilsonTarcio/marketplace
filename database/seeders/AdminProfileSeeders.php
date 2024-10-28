<?php

namespace Database\Seeders;

use App\Models\Vendedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendedor = new Vendedor();
        $vendedor->banner = 'uploads/capa-loja-talice.jpg';
        $vendedor->fone = '(81) 9 9999-9999';
        $vendedor->email = 'vendedorinicial@talice.com.br';
        $vendedor->descricao = 'Vendedor criado por seeder para inicar o projeto';
        $vendedor->save();
    }
}
