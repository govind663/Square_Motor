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
            // add column commission_type after tds_in_percentage
            $table->string('commission_type')->nullable()->after('tds_in_percentage')->comment('1 => percentage, 2 => fixed amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_ids', function (Blueprint $table) {
            $table->dropColumn('commission_type');
        });
    }
};
