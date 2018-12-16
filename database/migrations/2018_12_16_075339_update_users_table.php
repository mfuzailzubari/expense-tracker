<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function($table) {

            $table->string('username', 50);
            $table->date('date_of_birth');
            $table->string('gender', 1);
            $table->string('last_name', 50);
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
        Schema::table('users', function($table) {
            $table->dropColumn('username');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropColumn('last_name');
        });
    }
}
