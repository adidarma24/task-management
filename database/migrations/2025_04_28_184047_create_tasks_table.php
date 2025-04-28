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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul tugas
            $table->text('description')->nullable(); // Deskripsi tugas
            $table->date('due_date')->nullable(); // Tanggal jatuh tempo tugas
            $table->foreignId('project_id')->constrained()->onDelete('cascade'); // Relasi ke tabel projects
            $table->foreignId('assigned_to')->nullable()->constrained('users')->onDelete('set null'); // Relasi ke tabel users (penanggung jawab)
            $table->enum('status', ['To Do', 'In Progress', 'Done'])->default('To Do'); // Status proyek
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
