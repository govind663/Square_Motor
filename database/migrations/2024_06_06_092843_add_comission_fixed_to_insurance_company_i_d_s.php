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
            // Add column comission_fixed after commision_percentage
            $table->decimal('comission_fixed', 10, 2)->nullable()->after('commision_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            $table->dropColumn('comission_fixed');
        });
    }
};
