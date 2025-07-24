<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('withdrawals', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Campaign creator
        $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->string('status')->default('PENDING'); // PENDING, APPROVED, REJECTED, PAID
        $table->text('note')->nullable(); // Optional: message or rejection reason
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('withdrawals');
    }
};
