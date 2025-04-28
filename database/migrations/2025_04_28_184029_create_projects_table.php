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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama proyek
            $table->text('description')->nullable(); // Deskripsi proyek
            $table->date('start_date')->nullable(); // Tanggal mulai proyek
            $table->date('end_date')->nullable(); // Tanggal selesai proyek
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke tabel users
            $table->enum('status', ['To Do', 'In Progress', 'Done'])->default('To Do'); // Status proyek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
