<?php

use App\Models\Vehicle;
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
            // Add vehicle_id after insurance_company_i_d_s
            $table->foreignIdFor(Vehicle::class)->nullable()->index()->after('insurance_company_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('insurance_company_i_d_s', function (Blueprint $table) {
            $table->dropColumn('vehicle_id');
        });
    }
};
