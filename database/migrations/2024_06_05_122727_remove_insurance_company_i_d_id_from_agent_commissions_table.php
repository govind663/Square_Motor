<?php

use App\Models\InsuranceCompanyID;
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
        Schema::table('agent_commissions', function (Blueprint $table) {
            // remove insurance_company_i_d_id column
            $table->dropColumn('insurance_company_i_d_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_commissions', function (Blueprint $table) {
            // add insurance_company_i_d_id column
            $table->foreignIdFor(InsuranceCompanyID::class)->nullable()->index()->after('insurance_company_id');
        });
    }
};
