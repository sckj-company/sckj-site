<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->foreignId('categoria_projecto_id')
                ->nullable()
                ->after('category')
                ->constrained('categoria_projectos')
                ->nullOnDelete();
        });

        // Preserva as categorias já usadas pelos portfólios existentes.
        DB::table('portfolios')
            ->whereNotNull('category')
            ->selectRaw('DISTINCT TRIM(category) AS nome')
            ->pluck('nome')
            ->filter()
            ->each(function (string $nome): void {
                $categoriaId = DB::table('categoria_projectos')->insertGetId([
                    'nome' => $nome,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                DB::table('portfolios')
                    ->whereRaw('TRIM(category) = ?', [$nome])
                    ->update(['categoria_projecto_id' => $categoriaId]);
            });
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropForeign(['categoria_projecto_id']);
            $table->dropColumn('categoria_projecto_id');
        });
    }
};
