<?php

use App\Models\InsuranceCompany;
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
        Schema::create('insurance_company_i_d_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(InsuranceCompany::class)->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade')->comment('Insurance company id');
            $table->string('company_id')->nullable()->unique();
            $table->integer('commision_percentage')->nullable()->comment('commision amount in percentage');
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
        Schema::dropIfExists('insurance_company_i_d_s');
    }
};
