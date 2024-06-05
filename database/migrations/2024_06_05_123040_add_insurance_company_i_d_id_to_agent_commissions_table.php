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
        Schema::table('agent_commissions', function (Blueprint $table) {
            // add insurance_company_i_d_id column after insurance_company_id
            $table->string('insurance_company_i_d_id')->nullable()->unique()->after('insurance_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_commissions', function (Blueprint $table) {
            $table->dropColumn('insurance_company_i_d_id');
        });
    }
};
