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
        Schema::create('pre_advice', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('line_id')->nullable();
            $table->string('do_no')->nullable();
            $table->string('validity_period')->nullable();
            $table->string('validity_date')->nullable();
            $table->string('shipper_name')->nullable();
            $table->string('pod')->nullable();
            $table->string('vessel')->nullable();
            $table->string('voyage')->nullable();
            $table->string('do_date')->nullable();
            $table->string('container_size')->nullable();
            $table->string('container_type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('container_qty')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('pre_advice');
    }
};
