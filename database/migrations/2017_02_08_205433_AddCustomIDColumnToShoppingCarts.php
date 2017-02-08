<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomIDColumnToShoppingCarts extends Migration
{
    private $tablename;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tablename="shopping_carts";
    }

    public function up()
    {
        Schema::table($this->tablename,function($table)
        {
            $table->string('customid')->unique()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
