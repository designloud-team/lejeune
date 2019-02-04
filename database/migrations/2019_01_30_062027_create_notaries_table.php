<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('notaries', function (Blueprint $table) {
//            $table->increments('id');
//            $table->boolean('local');
//            $table->string('state');
//            $table->string('first_name');
//            $table->string('last_name');
//            $table->string('business_name')->nullable();
//            $table->string('mailing_address');
//            $table->string('delivery_address');
//            $table->string('email')->nullable();
//            $table->string('phone');
//            $table->string('alternate_phone')->nullable();
//            $table->string('fax')->nullable();
//            $table->boolean('e_docs');
//            $table->boolean('insurance');
//            $table->string('insurance_amount')->nullable();
//            $table->string('ssn_or_ein')->nullable();
//            $table->text('notes')->nullable();
//            $table->timestamps();
//            $table->softDeletes();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('notaries');
    }
}
