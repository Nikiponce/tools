<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 50);
            $table->string('description', 150)->nullable();
            $table->string('src', 250);
            $table->string('class', 150)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('posts', function (Blueprint $table){
            $table->unsignedBigInteger('image_id')->nullable()->after('status');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeign('posts_image_id_foreign');
            $table->dropColumn('image_id');
        });
        Schema::dropIfExists('images');
    }
}
