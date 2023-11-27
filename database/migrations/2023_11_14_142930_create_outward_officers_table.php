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
            

            $table->string('container_no')->nullable();
            $table->string('container_size')->nullable();
            $table->string('container_type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('line_id')->nullable();
            $table->string('repair_completion_date')->nullable();
            $table->string('inward_date')->nullable();
            $table->string('do_date')->nullable();
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
