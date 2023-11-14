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
        Schema::create('gateouts', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('vehicle_img')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('in_date')->nullable();
            $table->string('in_time')->nullable();
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
        Schema::dropIfExists('gateouts');
    }
};
