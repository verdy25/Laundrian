<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaunderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('launders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('package_price');
            $table->integer('pcs');
            $table->integer('cost');
            $table->unsignedBigInteger('payment_status_id');
            $table->date('created_at');
            $table->date('updated_at');

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('payment_status_id')->references('id')->on('payment_status')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('launders');
    }
}
