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
        Schema::create('master_transports', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->longtext('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('gst')->nullable();
            $table->string('pan')->nullable();
            $table->string('gst_state')->nullable();
            $table->string('state_code')->nullable();
            $table->enum('is_transport',['transport','consignee'])->nullable();
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
        Schema::dropIfExists('master_transports');
    }
};
