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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('events_id');
            $table->foreign('events_id')->references('id')->on('events');
            $table->integer('type')->nullable();
            $table->longText('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('items')->nullable();
            $table->longText('contracts_content')->nullable();
            $table->longText('signed_url')->nullable();
            $table->longText('signe_data')->default(null);
            $table->boolean('sent')->default(false);
            $table->timestamp('sent_at')->nullable();
            $table->boolean('opened')->default(false);
            $table->timestamp('open_at')->nullable();
            $table->boolean('signed')->default(false);
            $table->timestamp('signe_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
