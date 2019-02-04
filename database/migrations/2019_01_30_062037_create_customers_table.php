<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('customers', function (Blueprint $table) {
//            $table->increments('id');
//            $table->string('company')->nullable();
//            $table->string('name')->nullable();
//            $table->string('phone_number');
//            $table->string('mobile')->nullable();
//            $table->string('email')->nullable();
//            $table->string('display_name')->nullable();
//            $table->boolean('use_display_name');
//            $table->string('website')->nullable();
//            $table->text('billing_address');
//            $table->text('shipping_address');
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('customers');
    }
}
