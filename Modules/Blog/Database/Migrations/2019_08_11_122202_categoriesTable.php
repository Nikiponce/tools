<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('description', 150)->nullable();
            $table->string('color')->nullable();
            $table->string('slug', 100)->unique();
            $table->boolean('tags')->nullable()->default(false);
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('taxonomies');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('posts_taxonomies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('taxonomy_id')->nullable();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->foreign('taxonomy_id')->references('id')->on('taxonomies');
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
        Schema::dropIfExists('taxonomies');
    }
}
