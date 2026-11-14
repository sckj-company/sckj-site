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
        Schema::create('site_blocks', function (Blueprint $table) {
                $table->id();
                $table->string('chave', 120)->unique();
                $table->string('pagina', 50)->index();
                $table->string('rotulo', 150);
                $table->string('tipo', 20)->default('texto'); // texto | texto_longo
                $table->text('valor_pt')->nullable();
                $table->text('valor_en')->nullable();
                $table->text('valor_zh')->nullable();
                $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_blocks');
    }
};
