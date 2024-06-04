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
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            // Add rto_id after vehicle_id
            $table->foreignIdFor(RTO::class)->nullable()->index()->after('vehicle_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            $table->dropColumn('r_t_o_id');
        });
    }
};
