<?php

use App\Models\RTO;
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
        Schema::table('agent_commissions', function (Blueprint $table) {
            // Add rto_id after insurance_company_i_d_id
            $table->foreignIdFor(RTO::class)->nullable()->index()->after('insurance_company_i_d_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('agent_commissions', function (Blueprint $table) {
            $table->dropColumn('r_t_o_id');
        });
    }
};
