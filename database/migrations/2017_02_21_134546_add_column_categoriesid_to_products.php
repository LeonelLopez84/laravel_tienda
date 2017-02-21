<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCategoriesidToProducts extends Migration
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

        Schema::table($this->tablename,function($table)
        {
            $table->integer('categorie_id')->unsigned()->default(1)->index();
            $table->foreign('categorie_id')->references("id")->on("categories")->onDelete("no action")->onUpdate("no action");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    
    }
}
