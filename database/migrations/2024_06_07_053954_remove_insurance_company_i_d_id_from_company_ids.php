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
            // remove column insurance_company_i_d_id
            $table->dropColumn('insurance_company_i_d_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_ids', function (Blueprint $table) {
            // add column insurance_company_i_d_id
            $table->unsignedBigInteger('insurance_company_i_d_id');
            $table->foreign('insurance_company_i_d_id')->references('id')->on('insurance_company_i_ds');
        });
    }
};
