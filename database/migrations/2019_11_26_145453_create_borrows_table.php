<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->binary('status');
            $table->bigInteger('books_id')->unsigned();;
            $table->bigInteger('clients_id')->unsigned();;
            $table->bigInteger('categories_id')->unsigned();;
            
            $table->foreign('books_id')
                ->references('id')
                ->on('books')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->foreign('clients_id')
                ->references('id')
                ->on('clients')
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
        Schema::dropIfExists('borrows');
    }
}
