<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    private $tablename;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tablename="images";
    }

    public function up()
    {
        Schema::create($this->tablename,function(Blueprint $table){
            $table->increments("id");
            $table->string("name")->nullable();
            $table->string("extension");
            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references("id")->on("products")->onDelete("cascade")->onUpdate("cascade");
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
