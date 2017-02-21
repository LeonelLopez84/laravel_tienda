<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
	private $tablename;
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function __construct()
    {
    	$this->tablename="categories";
    }

    public function run()
    {
        DB::table($this->tablename)->insert([
            'name' =>'Sin Categoría',
            'categorie_id' => 0,
            'description' => 'Productos nuevos sin categorizar',
        ]);

        DB::table($this->tablename)->insert([
            'name' =>'Peces',
            'categorie_id' => 0,
            'description' => 'Todos los productos para acuario',
        ]);

        DB::table($this->tablename)->insert([
            'name' =>'Marinos',
            'categorie_id' => 2,
            'description' => 'Productos para peces marinos',
        ]);
    }
}
