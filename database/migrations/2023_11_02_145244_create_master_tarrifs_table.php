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
        Schema::create('master_tarrifs', function (Blueprint $table) {
            $table->id();
            $table->string('line_id')->nullable();
            $table->string('damade_id')->nullable();
            $table->string('repair_id')->nullable();
            $table->string('material_id')->nullable();
            $table->string('repai_location_code')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->string('dimension_l')->nullable();
            $table->string('dimension_w')->nullable();
            $table->string('dimension_h')->nullable();
            $table->string('labour_hour')->nullable();
            $table->string('labour_cost')->nullable();
            $table->string('material_cost')->nullable();
            $table->string('tax')->nullable();
            $table->string('tax_cost')->nullable();
            $table->string('total_cost')->nullable();
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
        Schema::dropIfExists('master_tarrifs');
    }
};
