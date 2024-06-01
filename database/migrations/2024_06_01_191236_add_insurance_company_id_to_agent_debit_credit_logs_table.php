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
        Schema::table('agent_debit_credit_logs', function (Blueprint $table) {
            // Add insurance_company_id after agent_id
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->index()->after('agent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_debit_credit_logs', function (Blueprint $table) {
            $table->dropColumn('insurance_company_id');
        });
    }
};
