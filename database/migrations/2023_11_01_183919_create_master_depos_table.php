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
        Schema::create('master_depos', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->enum('status',[0,1])->default(1);
            $table->string('phone')->nullable()->unique();
            $table->string('email')->nullable()->unique();
            $table->string('tan')->nullable()->unique();
            $table->string('pan')->nullable()->unique();
            $table->string('service_tax')->nullable();
            $table->string('vattin')->nullable();
            $table->string('gst')->nullable()->unique();
            $table->string('state')->nullable();
            $table->string('state_code')->nullable();
            $table->string('billing_name')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->string('depo_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_address')->nullable();
            $table->string('company_phone')->nullable();
            $table->string('company_email')->nullable();
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
        Schema::dropIfExists('master_depos');
    }
};
