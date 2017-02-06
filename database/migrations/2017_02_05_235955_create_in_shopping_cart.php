<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInShoppingCart extends Migration
{
    private $tablename;
   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tablename="in_shopping_carts";
    }

    public function up()
    {
        Schema::create($this->tablename,function(Blueprint $table){

            $table->increments("id");
            $table->integer('product_id')->unsigned()->index();
            $table->integer('shopping_cart_id')->unsigned()->index();
            $table->foreign('product_id')->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign('shopping_cart_id')->references("id")->on("shopping_carts")->onDelete("cascade")->onUpdate("cascade");

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
