<?php

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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->decimal('goal_amount', 10, 2);
            $table->decimal('raised_amount', 10, 2)->default(0);
            $table->enum('status', ['pending', 'active', 'featured', 'rejected'])->default('pending');
            $table->string('district');                 
            $table->string('category');              
            $table->string('campaign_image');          
            $table->string('verification_document');  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
