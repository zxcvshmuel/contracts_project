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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('password');
            $table->integer('user_type')->default(1);
            $table->dateTime('active_until')->default('2023-02-19 18:08:59')->nullable();
            $table->longText('logo_url')->nullable();
            $table->string('comp_id')->nullable();
            $table->string('comp_name')->nullable();
            $table->longText('signature')->nullable();
            $table->string('comp_email')->nullable();
            $table->string('comp_phone')->nullable();
            $table->string('comp_address')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
