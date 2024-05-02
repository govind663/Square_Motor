<?php

use App\Models\Agent;
use App\Models\InsuranceCompany;
use App\Models\RTO;
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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();

            $table->string('policy_no')->unique()->nullable();
            $table->string('policy_type')->nullable();
            $table->foreignIdFor(Agent::class)->nullable()->index();
            $table->string('customer_name')->nullable();
            $table->string('vehicle_reg_no')->nullable();
            $table->foreignIdFor(RTO::class)->nullable()->index();
            $table->foreignIdFor(Vehicle::class)->nullable()->index();
            $table->string('vehicle_config')->nullable();
            $table->string('insurance_type')->nullable();
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->index();
            $table->string('main_price')->nullable();
            $table->string('profit_amt')->nullable();
            $table->string('tds_deduction')->nullable();
            $table->string('actual_profit_amt')->nullable();
            $table->string('commission_percentage')->nullable();
            $table->string('comission_rupees')->nullable();
            $table->string('payable_amount')->nullable();
            $table->date('from_dt')->nullable();
            $table->date('to_dt')->nullable();
            $table->date('issue_dt')->nullable();
            $table->string('payment_by')->nullable();
            $table->string('payment_through')->nullable();
            $table->string('policy_doc')->nullable();
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
        Schema::dropIfExists('policies');
    }
};
