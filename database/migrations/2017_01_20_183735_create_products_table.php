<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    private $tablename;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tablename="products";
    }

    public function up()
    {
        Schema::create($this->tablename,function(Blueprint $tabla){
            $tabla->increments("id");

            $tabla->integer("user_id")->unsigned()->index();
            $tabla->string("title");
            $tabla->text("description");
            $tabla->decimal('pricing', 9,2);

            $tabla->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->tablename);
    }
}
