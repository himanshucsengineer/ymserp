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
        Schema::create('p_t_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('party_name')->nullable();
            $table->string('container_no')->nullable();
            $table->string('size_type')->nullable();
            $table->string('transporter_name')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('survey_place')->nullable();
            $table->string('survey_date')->nullable();
            $table->string('pti_date')->nullable();
            $table->string('set_temprature')->nullable();
            $table->string('partlow')->nullable();
            $table->string('length_460_cable')->nullable();
            $table->string('machine_checking')->nullable();
            $table->string('supply_temp')->nullable();
            $table->string('return_temp')->nullable();
            $table->string('iso_plug')->nullable();
            $table->string('container_fit')->nullable();
            $table->string('washing_carrid')->nullable();
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
        Schema::dropIfExists('p_t_i_s');
    }
};
