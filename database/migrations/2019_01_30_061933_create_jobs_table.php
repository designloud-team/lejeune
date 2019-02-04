<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company')->nullable();
            $table->string('name')->nullable();
            $table->string('phone_number');
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('display_name')->nullable();
            $table->boolean('use_display_name');
            $table->string('website')->nullable();
            $table->text('billing_address');
            $table->text('shipping_address');
            $table->unsignedInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('notaries', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('local');
            $table->string('state');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('business_name')->nullable();
            $table->string('mailing_address');
            $table->string('delivery_address');
            $table->string('email')->nullable();
            $table->string('phone');
            $table->string('alternate_phone')->nullable();
            $table->string('fax')->nullable();
            $table->boolean('e_docs');
            $table->boolean('insurance');
            $table->string('insurance_amount')->nullable();
            $table->string('ssn_or_ein')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('jobs', function (Blueprint $table) {
           $table->increments('id');
           $table->string('registered_id');
           $table->string('borrower');
           $table->string('daytime_phone')->nullable();
           $table->string('evening_phone')->nullable();
           $table->string('signing_address');
           $table->string('property_address');
           $table->date('date');
           $table->time('time');
           $table->unsignedSmallInteger('packages');
           $table->boolean('local');
           $table->string('notary_fee');
           $table->integer('customer_id')->unsigned()->index()->nullable();
           $table->integer('notary_id')->unsigned()->index()->nullable();
           $table->unsignedInteger('user_id')->nullable();
           $table->timestamps();
           $table->softDeletes();
        });
        Schema::table('jobs', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('notary_id')->references('id')->on('notaries')
                ->onUpdate('cascade')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('notaries');
        Schema::dropIfExists('customers');

    }
}
