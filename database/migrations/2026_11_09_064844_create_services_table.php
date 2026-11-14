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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
                $table->string('titulo_pt', 150);
                $table->string('titulo_en', 150)->nullable();
                $table->string('titulo_zh', 150)->nullable();
                $table->text('descricao_pt');
                $table->text('descricao_en')->nullable();
                $table->text('descricao_zh')->nullable();
                $table->unsignedInteger('ordem')->default(0);
                $table->string('status', 20)->default('pendente')->index(); // pendente | publicado | rejeitado
                $table->text('motivo_rejeicao')->nullable();
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
                $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');

    }
};
