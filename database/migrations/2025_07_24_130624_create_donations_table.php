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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->default(null); // Donor
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade'); // Campaign donated to
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('INITIATED'); // INITIATED, COMPLETED, FAILED
            $table->string('product_name')->nullable();
            $table->string('pidx')->nullable(); // From Khalti
            $table->json('initiate_response')->nullable(); // Full Khalti init response
            $table->timestamps();
        });
}

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
