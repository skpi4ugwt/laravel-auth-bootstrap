<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('title',10)->nullable();
            $table->string('mobile',20)->nullable();
            $table->string('gender',10)->nullable();
            $table->string('university')->nullable();
            $table->string('department')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('pincode',20)->nullable();
            $table->string('profile_image_path')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('user_profiles'); }
};
