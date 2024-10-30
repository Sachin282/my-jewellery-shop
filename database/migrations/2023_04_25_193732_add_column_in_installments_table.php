<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('installments', function (Blueprint $table) {
            $table->string("discount");
            $table->string("delay_fine");
            $table->string("discount_type");
            $table->string("reference_discount");
            $table->string("reference_discount_type");
            $table->string("gcash_redeemed");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('installments', function (Blueprint $table) {
            $table->dropColumn("discount");
            $table->dropColumn("delay_fine");
            $table->dropColumn("discount_type");
            $table->dropColumn("reference_discount");
            $table->dropColumn("reference_discount_type");
            $table->dropColumn("gcash_redeemed");
        });
    }
}
