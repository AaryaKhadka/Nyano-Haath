<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Donor
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade'); // Campaign
            $table->decimal('amount', 10, 2);
            $table->string('status')->default('pending'); // pending, success, failed
            $table->string('product_name')->nullable();
            $table->string('pidx')->nullable(); // From Khalti
            $table->json('initiate_response')->nullable();
            $table->json('verified_response')->nullable(); // Added for final verification data
            $table->boolean('anonymous')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
