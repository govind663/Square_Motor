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
        Schema::create('agent_to_companies', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Agent::class)->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('amount')->nullable();
            $table->integer('payment_mode')->nullable()->comment('1 => Cash, 2 => Cheque, 3 => Online Transfer, 4 => GooglePay, 5 => PhonePay');
            $table->text('notes')->nullable();
            $table->date('payment_dt')->nullable();
            $table->integer('payment_status')->default(1)->comment('1 => Pending, 2 => Paid, 3 => Cancelled');
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
        Schema::dropIfExists('agent_to_companies');
    }
};
