<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_contractors', function (Blueprint $table) {
            $table->id();
            $table->string('contractor_code')->nullable();
            $table->string('fullname')->nullable();
            $table->string('company')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact')->nullable()->unique();
            $table->string('license')->nullable();
            $table->string('gst')->nullable()->unique();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
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
        Schema::dropIfExists('master_contractors');
    }
};
