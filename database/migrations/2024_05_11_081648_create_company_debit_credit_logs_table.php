<?php

use App\Models\InsuranceCompany;
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
        Schema::create('company_debit_credit_logs', function (Blueprint $table) {
            $table->id();
            $table->date('tranx_dt')->nullable();
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('policy_id')->unique()->nullable();
            $table->integer('debit_tranx')->nullable();
            $table->integer('credit_tranx')->nullable();
            $table->integer('balance')->nullable();
            $table->integer('tranx_type')->nullable()->default(null)->comment('1 - Credit, 2 - Debit');
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
        Schema::dropIfExists('company_debit_credit_logs');
    }
};
