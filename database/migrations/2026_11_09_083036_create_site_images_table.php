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
    Schema::create('site_images', function (Blueprint $table) {
        $table->id();
        $table->string('chave', 120)->unique();
        $table->string('pagina', 50)->index();
        $table->string('rotulo', 150);
        $table->string('padrao', 255);                 // imagem original do template, dentro de public/
        $table->string('caminho', 255)->nullable();    // imagem enviada pelo painel, dentro de public/uploads
        $table->unsignedSmallInteger('largura_rec')->nullable();
        $table->unsignedSmallInteger('altura_rec')->nullable();
        $table->string('alt_pt', 255)->nullable();
        $table->string('alt_en', 255)->nullable();
        $table->string('alt_zh', 255)->nullable();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_images');
    }
};
