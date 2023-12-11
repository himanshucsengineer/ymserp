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
        Schema::create('gate_passes', function (Blueprint $table) {
            $table->id();
            $table->string('gate_pass_no')->nullable();
            $table->string('outward_id')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('final_gate_pass_no')->nullable();
            $table->string('amount')->nullable();
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
        Schema::dropIfExists('gate_passes');
    }
};
