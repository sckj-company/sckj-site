
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
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->string('motivo_rejeicao', 500)->nullable();

            $table->string('approval_status', 20)
                ->default('pendente');
        });

        // Os portfólios que já estavam publicados continuam publicados.
        DB::table('portfolios')
            ->where('status', true)
            ->update(['approval_status' => 'aprovado']);
    }

    public function down(): void
    {
        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropForeign(['approved_by']);

            $table->dropColumn([
                'created_by',
                'approved_by',
                'approved_at',
                'motivo_rejeicao',
                'approval_status',
            ]);
        });
    }
};
