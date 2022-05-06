<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Dishes', function (Blueprint $table) {
            
            $table->foreignId('user_id')->after('category')->nullable()
            ->constrained()->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Dishes', function (Blueprint $table) {
            
            $table->dropForeign('dishes_user_id_foreign'); 
            $table->dropColumn('user_id');
            
        });
    }
}
