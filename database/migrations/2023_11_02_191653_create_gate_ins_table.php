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
            $table->string('container_img')->nullable();
            $table->string('vehicle_number')->nullable();
            $table->string('vehicle_img')->nullable();
            $table->string('inward_date')->nullable();
            $table->string('inward_time')->nullable();
            $table->string('survayor_date')->nullable();
            $table->string('survayor_time')->nullable();
            $table->string('container_type')->nullable();
            $table->string('container_size')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('gross_weight')->nullable();
            $table->string('tare_weight')->nullable();
            $table->string('mfg_date')->nullable();
            $table->string('csc_details')->nullable();
            $table->string('line_id')->nullable();
            $table->string('grade')->nullable();
            $table->string('status_name')->nullable();
            $table->string('rftype')->nullable();
            $table->string('make')->nullable();
            $table->string('model_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('machine_mfg_date')->nullable();
            $table->string('device_status')->nullable();
            $table->enum('third_party',['yes','no'])->nullable();
            $table->string('consignee_id')->nullable();
            $table->string('transaction_mode')->nullable();
            $table->string('transaction_ref_no')->nullable();
            $table->string('arrive_from')->nullable();
            $table->string('transport_id')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('vessel_name')->nullable();
            $table->string('voyage')->nullable();
            $table->string('port_name')->nullable();
            $table->string('er_no')->nullable();
            $table->string('empty_latter')->nullable();
            $table->string('challan')->nullable();
            $table->string('empty_repositioning')->nullable();
            $table->string('return')->nullable();
            $table->string('tracking_device')->nullable();
            $table->string('remarks')->nullable();
            $table->string('gateintype')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
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
