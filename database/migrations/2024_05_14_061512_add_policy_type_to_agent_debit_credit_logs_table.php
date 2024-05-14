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
        Schema::table('retailer_debit_credit_logs', function (Blueprint $table) {
            $table->integer('policy_type')->nullable()->default('2')->comment('1: Agent, 2: Retailer')->after('retailer_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('retailer_debit_credit_logs', function (Blueprint $table) {
            $table->dropColumn('policy_type');
        });
    }
};
