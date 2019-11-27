<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('year_publication', 4);
            $table->text('abstract')->nullable();
            $table->bigInteger('authors_id')->unsigned();
            $table->bigInteger('categories_id')->unsigned();
            $table->string('cover')->nullable();
            
            $table->foreign('authors_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('categories_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
        Schema::dropIfExists('books');
    }
}
