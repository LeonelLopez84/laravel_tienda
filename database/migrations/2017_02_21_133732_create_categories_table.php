<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    private $tablename;
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function __construct()
    {
        $this->tablename="categories";
    }

    public function up()
    {
        Schema::create($this->tablename,function(Blueprint $table){

            $table->increments("id");
            $table->integer("categorie_id")->unsigned()->default(0)->index();
            $table->string("name")->unique();
            $table->text("description");

            $table->timestamps();
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
