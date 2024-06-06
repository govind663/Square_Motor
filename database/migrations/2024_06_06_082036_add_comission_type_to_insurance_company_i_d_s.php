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
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            // Add column comission_type after r_t_o_id
            $table->string('comission_type')->nullable()->after('r_t_o_id')->comment('1 - Percentage, 2 - Fixed Amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            $table->dropColumn('comission_type');
        });
    }
};
