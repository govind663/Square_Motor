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
        Schema::table('company_ids', function (Blueprint $table) {
            // add column company_id after insurance_company_id
            $table->string('company_id')->unique()->nullable()->after('insurance_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_ids', function (Blueprint $table) {
            $table->dropColumn('company_id');
        });
    }
};
