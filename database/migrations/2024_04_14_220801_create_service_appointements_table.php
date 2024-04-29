<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('service_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->foreignId('depanneur_id')->constrained('depanneurs')->onDelete('cascade');
            $table->string('service_type');
            $table->dateTime('appointment_date');
            $table->enum('status', ['pending', 'ongoing', 'paid'])->default('pending');
            $table->tinyInteger('stars')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_appointements');
    }
};
