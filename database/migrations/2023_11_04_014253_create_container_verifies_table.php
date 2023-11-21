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
        Schema::create('container_verifies', function (Blueprint $table) {
            $table->id();
            $table->string('status_name')->nullable();
            $table->string('survayor_date')->nullable();
            $table->string('survayor_time')->nullable();
            $table->string('mfg_date')->nullable();

            $table->string('job_work_no')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('tare_weight')->nullable();
            $table->string('vessel_name')->nullable();
            $table->string('grade')->nullable();
            $table->string('sub_lease_unity')->nullable();
            $table->string('voyage')->nullable();
            $table->string('consignee')->nullable();
            $table->string('region')->nullable();
            $table->string('destuffung')->nullable();
            $table->string('rftype')->nullable();
            $table->string('empty_repositioning')->nullable();
            $table->string('er_no')->nullable();
            $table->string('remarks')->nullable();
            $table->string('createdby')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('gate_in_id')->nullable();
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
        Schema::dropIfExists('container_verifies');
    }
};
