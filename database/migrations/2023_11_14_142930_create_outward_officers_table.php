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
        Schema::create('outward_officers', function (Blueprint $table) {
            $table->id();
            

            $table->string('gate_in_id')->nullable();
            $table->string('pre_advice_id')->nullable();
            $table->string('transport_id')->nullable();
            $table->string('vhicle_no')->nullable();
            $table->string('destination')->nullable();
            $table->string('seal_no')->nullable();
            $table->string('third_party')->nullable();
            $table->string('port_name')->nullable();
            $table->string('temprature')->nullable();
            $table->string('vent_seal_no')->nullable();
            $table->string('ventilation')->nullable();
            $table->string('humadity')->nullable();
            $table->string('device_status')->nullable();
            $table->string('amount')->nullable();
            $table->string('driver_contact')->nullable();
            $table->string('do_copy')->nullable();
            $table->string('challan_copy')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('driver_copy')->nullable();
            $table->string('consignee_id')->nullable();
            $table->string('licence_no')->nullable();
            $table->string('licence_copy')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('aadhar_copy')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('pan_copy')->nullable();

            $table->string('depo_id')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
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
        Schema::dropIfExists('outward_officers');
    }
};
