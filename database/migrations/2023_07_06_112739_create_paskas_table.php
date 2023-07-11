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
        Schema::create('paskas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('marital_status');
            $table->string('number_of_children');
            $table->string('blood_group');

            $table->char('province_id');
            $table->char('regency_id');
            $table->char('district_id');
            $table->char('village_id');
            $table->string('address');
            $table->string('phone_number');
            $table->string('profession');
            $table->string('quran');
            $table->string('join');
            $table->string('year_joined');
            $table->string('educational_history');
            $table->string('position_paskas');
            $table->string('skill');
            $table->string('paskas_education');
            $table->string('organization');
            $table->string('image');
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
        Schema::dropIfExists('paskas');
    }
};
