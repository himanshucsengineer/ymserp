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
        Schema::create('gate_ins', function (Blueprint $table) {
            $table->id();
            $table->string('container_no');
            $table->string('container_type');
            $table->string('container_size');
            $table->string('transport_id');
            $table->string('inward_date');
            $table->string('inward_time');
            $table->string('driver_name');
            $table->string('vehicle_number');
            $table->string('contact_number');
            $table->enum('third_party',['yes','no']);
            $table->string('line_id');
            $table->string('arrive_from');
            $table->string('port_name');
            $table->string('driver_photo');
            $table->string('challan');
            $table->string('driver_license');
            $table->string('do_copy');
            $table->string('aadhar');
            $table->string('pan');
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
        Schema::dropIfExists('gate_ins');
    }
};
