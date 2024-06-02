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
        Schema::table('company_debit_credit_logs', function (Blueprint $table) {
            // Add policy_type after insurance_company_id
            $table->integer('policy_type')->nullable()->after('insurance_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_debit_credit_logs', function (Blueprint $table) {
            $table->dropColumn('policy_type');
        });
    }
};
