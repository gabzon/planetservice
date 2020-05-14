<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create(['nombre'=> 'Automatriz']);
        Categoria::create(['nombre'=> 'Industria']);
        Categoria::create(['nombre'=> 'Comercios']);
        Categoria::create(['nombre'=> 'Alimentos y Bebidas']);
        Categoria::create(['nombre'=> 'Farmaceuticos']);
        Categoria::create(['nombre'=> 'Deporte']);
        Categoria::create(['nombre'=> 'Motos']);
        Categoria::create(['nombre'=> 'Bicicletas']);
        Categoria::create(['nombre'=> 'Navieros']);
        Categoria::create(['nombre'=> 'Cosmeticos y articulos de belleza']);
        Categoria::create(['nombre'=> 'Libros y papelerias']);
        Categoria::create(['nombre'=> 'Ferreteria']);
        Categoria::create(['nombre'=> 'Agricultura y ganaderia']);       
        Categoria::create(['nombre'=> 'Electronicos']);       
        Categoria::create(['nombre'=> 'Electrodomesticos']);       
        Categoria::create(['nombre'=> 'Computadoras y Smartphones']);
        Categoria::create(['nombre'=> 'Salud']);
    }
}