<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    private $tablename;
   
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tablename="orders";
    }

    public function up()
    {
        Schema::create($this->tablename,function(Blueprint $table){

            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned()->index();
            $table->string('line1');
            $table->string('line2')->nullable(true);
            $table->string('city');
            $table->string('postal_code');
            $table->string('state');
            $table->string('recipent_name')->nullable(true);
            $table->string('email');
            $table->string('status')->default("creado");
            $table->string('guide_number')->nullable(true);
            $table->integer("total");
            $table->foreign('shopping_cart_id')->references("id")->on("shopping_carts")->onDelete("no action")->onUpdate("no action");
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
