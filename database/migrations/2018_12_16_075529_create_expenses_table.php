<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('note', 200);    
            $table->float('amount');    
            $table->date('date');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('created_by');            
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
