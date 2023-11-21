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
            $table->string('do_no')->nullable();
            $table->string('challan_no')->nullable();
            $table->string('line_id')->nullable();
            $table->string('transport_id')->nullable();
            $table->string('container_type')->nullable();
            $table->string('container_size')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('grade')->nullable();
            $table->string('status_name')->nullable();
            $table->string('driver_name')->nullable();
            $table->string('vehicle_no')->nullable();
            $table->string('container_no')->nullable();
            $table->string('do_copy')->nullable();
            $table->string('challan_copy')->nullable();
            $table->string('driver_copy')->nullable();
            $table->string('consignee_id')->nullable();
            $table->string('shippers')->nullable();
            $table->string('licence_no')->nullable();
            $table->string('licence_copy')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->string('aadhar_copy')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('pan_copy')->nullable();
            $table->string('line_id_2')->nullable();
            $table->string('seal_no')->nullable();
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
