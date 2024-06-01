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
            $table->string('agent_tp_premimum')->nullable()->after('main_price');
            $table->string('agent_net_premium')->nullable()->after('agent_tp_premimum');
            $table->string('agent_gross')->nullable()->after('agent_net_premium');
            $table->string('agent_gst')->nullable()->after('agent_gross');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('policies', function (Blueprint $table) {
            $table->dropColumn(['agent_tp_premimum', 'agent_net_premium', 'agent_gross', 'agent_gst']);
        });
    }
};
