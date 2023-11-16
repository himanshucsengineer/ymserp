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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('gatein_id')->nullable();
            $table->string('location_code')->nullable();
            $table->string('tarrif_id')->nullable();
            $table->string('labour_hr')->nullable();
            $table->string('qty')->nullable();
            $table->string('labour_cost')->nullable();
            $table->string('material_cost')->nullable();
            $table->string('sab_total')->nullable();
            $table->string('gst')->nullable();
            $table->string('total')->nullable();
            $table->string('tax_cost')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('before_file1')->nullable();
            $table->string('before_file2')->nullable();
            $table->string('after_file1')->nullable();
            $table->string('after_file2')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
