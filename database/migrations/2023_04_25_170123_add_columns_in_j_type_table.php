<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInJTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('j_type', function (Blueprint $table) {
            $table->double('price');
            $table->double('making_charge');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('j_type', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('making_charge');
        });
    }
}
