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
            // remove company_id
            $table->dropColumn('company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            // add company_id
            $table->string('company_id')->nullable()->unique()->after('insurance_company_id');
        });
    }
};
