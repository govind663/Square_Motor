<?php

use App\Models\Agent;
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
        Schema::table('agent_debit_credit_logs', function (Blueprint $table) {
            // === Agent
            $table->foreignIdFor(Agent::class)->nullable()->index()->after('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_debit_credit_logs', function (Blueprint $table) {
            $table->dropColumn('agent_id');
        });
    }
};
