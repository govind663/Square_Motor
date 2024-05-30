<?php

use App\Models\Agent;
use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
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
        Schema::create('agent_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agent::class)->nullable()->index();
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->index();
            $table->foreignIdFor(InsuranceCompanyID::class)->nullable()->index();
            $table->foreignIdFor(Vehicle::class)->nullable()->index();
            $table->integer('comission_type')->nullable();
            $table->integer('percentage_amt')->nullable();
            $table->integer('fixed_amt')->nullable();
            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agent_commissions');
    }
};
