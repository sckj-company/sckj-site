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
        Schema::create('contact_messages', function (Blueprint $table) {
                $table->id();
                $table->string('nome', 100);
                $table->string('telefone', 30);
                $table->string('email', 150);
                $table->string('servico', 50);
                $table->text('mensagem');
                $table->string('status', 20)->default('nova')->index();
                $table->foreignId('answered_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamp('answered_at')->nullable();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_messages');
    }
};
