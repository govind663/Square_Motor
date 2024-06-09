<?php

use App\Models\CompanyId;
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
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            // Add column company_id  after insurance_company_id
            $table->foreignIdFor(CompanyId::class)->nullable()->index()->after('insurance_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            // Drop column company_id after insurance_company_id
            $table->dropColumn('company_id_id');
        });
    }
};
