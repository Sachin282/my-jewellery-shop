<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code','10')->unique();
            $table->string('name');
            $table->string('email','60')->unique();
            $table->string('phone','10');
            $table->string('password','60');
            $table->string('address');
            $table->string('city','40');
            $table->string('status','10');
            $table->string('referred_by', 10)->nullable();
            $table->boolean('email_verified');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone','10');
            $table->string('email','80')->unique();
            $table->string('password','60');
            $table->string('address');
            $table->string('status','10');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('j_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('uid');
            $table->string('order_id');
            $table->integer('j_type');
            $table->integer('j_id');
            $table->double('price');
            $table->integer('weight');
            $table->string('tenure');
            $table->integer('down_payment');
            $table->integer('paid_installment');
            $table->integer('pending_installment');
            $table->string('status','10');
            $table->timestamps();
        });

        Schema::create('installments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('uid');
            $table->double('oid');
            $table->integer('inst_no');
            $table->date('inst_date');
            $table->double('amount');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('installment_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tenure','10');
            $table->string('locking_period','10');
            $table->integer('down_payment');
            $table->string('status');
            $table->timestamps();
        });

        Schema::create('jewelleries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('type');
            $table->string('image');
            $table->string('status','10');
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('uid');
            $table->double('amount');
            $table->string('OrderId','15')->unique();
            $table->string('paymentId');
            $table->string('status','10');
            $table->timestamps();
        });

        Schema::create('temp', function (Blueprint $table) {
            $table->bigIncrements('uid');
            $table->string('uname');
            $table->string('phone','10');
            $table->string('email','60')->unique();
            $table->string('password','60');
            $table->string('address');
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
        Schema::dropIfExists('temp');
        Schema::dropIfExists('users');
        Schema::dropIfExists('admin');
        Schema::dropIfExists('j_type');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('jewelleries');
        Schema::dropIfExists('installments');
        Schema::dropIfExists('installment_detail');
    }
}