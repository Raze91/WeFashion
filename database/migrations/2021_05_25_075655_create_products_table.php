<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name", 5, 100);
            $table->text("description");
            $table->float("price", 9, 2);
            $table->enum("size", [
                "XL",
                "L",
                "M",
                "S",
                "XS"
            ]);
            $table->boolean("published")->default(false);
            $table->boolean("discount")->default(false);
            $table->string("ref", 16);
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
        Schema::dropIfExists('products');
    }
}
