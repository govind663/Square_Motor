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
        Schema::create('agent_debit_credit_logs', function (Blueprint $table) {
            $table->id();
            $table->date('tranx_dt')->nullable();
            $table->string('policy_id')->unique()->nullable();
            $table->integer('debit_tranx')->nullable();
            $table->integer('credit_tranx')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_debit_credit_logs');
    }
};
