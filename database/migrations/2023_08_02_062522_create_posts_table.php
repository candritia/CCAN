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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('perbaikan_id');
            $table->foreignId('petugasan_id');
            $table->foreignId('user_id');
            $table->string('area_id');
            $table->string('statusa_id');
            // $table->string('ticket');
            $table->string('slug')->unique();
            $table->string('nama_costemer');
            $table->string('nama_pic');
            $table->date('tgl');
            // $table->string('service_id');        
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
