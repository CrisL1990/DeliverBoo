<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoFieldToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('vat')->unique();
            $table->string('restaurant_name');
            $table->string('restaurant_address');
            $table->string('category');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('vat');
            $table->dropColumn('restaurant_name');
            $table->dropColumn('restaurant_address');
            $table->dropColumn('category');
        });
    }
}
