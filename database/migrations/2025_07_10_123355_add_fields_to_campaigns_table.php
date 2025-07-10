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
        Schema::table('campaigns', function (Blueprint $table) {
            $table->string('country')->nullable()->change();
            $table->string('category')->nullable()->change();
            $table->string('campaign_image')->nullable()->change();
            $table->string('verification_document')->nullable()->change();
        });
    }  // <-- Added this closing brace for up()

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('campaigns', function (Blueprint $table) {
            // Reverse to NOT nullable (optional, you can adjust as needed)
            $table->string('country')->nullable(false)->change();
            $table->string('category')->nullable(false)->change();
            $table->string('campaign_image')->nullable(false)->change();
            $table->string('verification_document')->nullable(false)->change();
        });
    }
};
