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
        Schema::create('transfer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origemId')->constrained(table: 'users', column: 'id')->onDelete('cascade');
            $table->foreignId('destinoId')->constrained(table: 'users', column: 'id')->onDelete('cascade');
            $table->decimal('valor', 10, 2, true);
            $table->string('descricao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer');
    }
};
