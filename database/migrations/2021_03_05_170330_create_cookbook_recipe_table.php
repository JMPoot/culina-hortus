<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCookbookRecipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cookbook_recipe', function (Blueprint $table) {
            $table->bigInteger('cookbook_id')->unsigned();
            $table->bigInteger('recipe_id')->unsigned();
            $table->foreign('cookbook_id')->references('id')->on('cookbooks')
                ->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cookbook_recipe');
    }
}
