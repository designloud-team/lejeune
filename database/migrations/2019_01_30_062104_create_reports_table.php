<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_completed');
            $table->string('tracking')->nullable();
            $table->string('carrier')->nullable();
            $table->string('completion_date')->nullable();
            $table->string('shipping_date')->nullable();
            $table->text('explanation')->nullable();
            $table->integer('job_id')->unsigned()->index()->nullable();
            $table->integer('customer_id')->unsigned()->index()->nullable();
            $table->integer('notary_id')->unsigned()->index()->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
        Schema::table('reports', function (Blueprint $table) {
            $table->foreign('job_id')->references('id')->on('jobs')
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
        Schema::dropIfExists('reports');
    }
}
