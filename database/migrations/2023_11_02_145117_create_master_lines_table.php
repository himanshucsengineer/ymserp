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
        Schema::create('master_lines', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('parking_charges')->nullable();
            $table->string('line_budget')->nullable();
            $table->string('alise')->nullable();
            $table->string('free_days')->nullable();
            $table->string('labour_rate')->nullable();
            $table->longtext('line_address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('gst')->nullable();
            $table->string('pan')->nullable();
            $table->string('gst_state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('top_img')->nullable();
            $table->string('bottom_img')->nullable();
            $table->string('right_img')->nullable();
            $table->string('left_img')->nullable();
            $table->string('front_img')->nullable();
            $table->string('door_img')->nullable();
            $table->string('interior_img')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('containerSize')->nullable();
            $table->string('containerType')->nullable();
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
        Schema::dropIfExists('master_lines');
    }
};
