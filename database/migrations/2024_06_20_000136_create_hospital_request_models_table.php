<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hospital_request_models', function (Blueprint $table) {
            $table->id();

            $table->string('location');
            $table->string('service');
            $table->enum('status', ['new', 'in progress','on hold','rejected','cancelled'])->default('new');
            $table->enum('priority', ['high', 'medium','low'])->default('low');
            $table->string('department');
            $table->string('requested_by');
            $table->string('assigned_by');
            $table->date('created_on')->default(now());

            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_request_models');
    }
};
