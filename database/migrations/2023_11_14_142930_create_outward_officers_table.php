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
            $table->string('gate_out_id')->nullable();
            $table->string('Transporter_name')->nullable();
            $table->string('destination')->nullable();
            $table->string('shippers')->nullable();
            $table->string('vessel')->nullable();
            $table->string('port_name')->nullable();
            $table->string('seal_no')->nullable();
            $table->string('vent_seal_no')->nullable();
            $table->string('temprature')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('cash')->nullable();
            $table->string('remark')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->enum('status',[0,1]);
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
