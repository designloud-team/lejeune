<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('is_business');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('phone');
            $table->string('service_address');
            $table->date('service_date');
            $table->time('service_time');
            $table->unsignedSmallInteger('people');
            $table->unsignedSmallInteger('packages');
            $table->string('service')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
