<?php

use App\Models\InsuranceCompany;
use App\Models\InsuranceCompanyID;
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
        Schema::create('company_ids', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->index();
            $table->foreignIdFor(InsuranceCompanyID::class)->nullable()->index();
            $table->integer('tds_in_percentage')->nullable();
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
        Schema::dropIfExists('company_ids');
    }
};
