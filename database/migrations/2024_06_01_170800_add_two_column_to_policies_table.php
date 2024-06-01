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
        Schema::table('policies', function (Blueprint $table) {
            $table->string('agent_comission_rupees')->nullable()->after('company_commission_percentage');
            $table->string('agent_actual_comission')->nullable()->after('agent_comission_rupees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->dropColumn(['agent_comission_rupees', 'agent_actual_comission']);
        });
    }
};
