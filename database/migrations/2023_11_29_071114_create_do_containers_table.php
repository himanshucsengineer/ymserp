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
        Schema::create('do_containers', function (Blueprint $table) {
            $table->id();
            $table->string('line_id')->nullable();
            $table->string('container_no')->nullable();
            $table->string('container_size')->nullable();
            $table->string('container_type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('vessel_name')->nullable();
            $table->string('voyage')->nullable();
            $table->string('status')->nullable();
            $table->string('do_no')->nullable();
            $table->string('grade')->nullable();
            $table->string('gate_out_date')->nullable();
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
        Schema::dropIfExists('do_containers');
    }
};
