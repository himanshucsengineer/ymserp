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
        Schema::create('invoice_management', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->nullable();
            $table->string('gate_in_id')->nullable();
            $table->string('invoice_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('createdby')->nullable();
            $table->string('updatedby')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('year')->nullable();
            $table->string('month')->nullable();
            $table->string('third_party')->nullable();
            $table->string('is_manual')->nullable();
            $table->string('final_invoice_no')->nullable();
            $table->string('amount')->nullable();

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
        Schema::dropIfExists('invoice_management');
    }
};
