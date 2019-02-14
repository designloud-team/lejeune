<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('total')->nullable();
            $table->string('notary_fee')->nullable();
            $table->string('balance_due')->nullable();
            $table->date('due_date')->nullable();
            $table->date('date_paid')->nullable();
            $table->string('status')->nullable();
            $table->boolean('billed')->nullable()->default(0);
            $table->date('date_billed')->nullable();
            $table->integer('notary_id')->unsigned()->index()->nullable();
            $table->integer('customer_id')->unsigned()->index()->nullable();
            $table->integer('job_id')->unsigned()->index()->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers')
                ->onUpdate('cascade');
            $table->foreign('notary_id')->references('id')->on('notaries')
                ->onUpdate('cascade');
            $table->foreign('job_id')->references('id')->on('jobs')
                ->onUpdate('cascade');
        });

        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
