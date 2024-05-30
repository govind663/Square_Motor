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
        Schema::table('agents', function (Blueprint $table) {
            $table->dropColumn(['comission_type', 'percentage_amt', 'fixed_amt']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agents', function (Blueprint $table) {
            $table->string('comission_type')->nullable();
            $table->string('percentage_amt')->nullable();
            $table->string('fixed_amt')->nullable();
        });
    }
};
