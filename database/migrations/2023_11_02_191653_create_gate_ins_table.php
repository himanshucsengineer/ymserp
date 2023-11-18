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
        Schema::create('gate_ins', function (Blueprint $table) {
            $table->id();
            $table->string('inward_no')->nullable();
            $table->string('container_no')->nullable();
            $table->string('container_type')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('container_size')->nullable();
            $table->string('transport_id')->nullable();
            $table->string('inward_date')->nullable();
            $table->string('inward_time')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('contact_number')->nullable();
            $table->enum('third_party',['yes','no'])->nullable();
            $table->string('line_id')->nullable();
            $table->string('arrive_from')->nullable();
            $table->string('port_name')->nullable();
            $table->string('driver_photo')->nullable();
            $table->string('challan')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('do_copy')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('pan')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('container_img')->nullable();
            $table->string('vehicle_img')->nullable();
            $table->string('gateintype')->nullable();
            $table->enum('is_approve',[1,0])->nullable();
            $table->enum('is_repaired',[1,0])->nullable();
            $table->enum('is_estimate_done',[1,0])->nullable();
            $table->string('estimate_updatedby')->nullable();
            $table->string('estimate_updated_at')->nullable();
            $table->string('repair_updatedby')->nullable();
            $table->string('repair_updatedat')->nullable();
            $table->string('approve_updatedby')->nullable();
            $table->string('approve_updatedat')->nullable();

            $table->string('status_updatedat')->nullable();
            $table->string('status_updatedby')->nullable();
            $table->enum('status',['In','Out','Ready']);
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
        Schema::dropIfExists('gate_ins');
    }
};
