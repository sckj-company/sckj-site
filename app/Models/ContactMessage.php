<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactMessage extends Model
{
    //
 public const SERVICOS = [
        'criacao-empresa'          => 'Criação e Legalização de Empresa',
        'tratamento-documentos'    => 'Tratamento e Gestão de Documentos / Licenças',
        'criacao-sistemas'         => 'Desenvolvimento de Sistema para Empresa (Software / ERP)',
        'website-plataforma'       => 'Criação de Website ou Plataforma Digital',
        'consultoria-empresarial'  => 'Consultoria e Apoio à Gestão',
        'comercio-equipamentos'    => 'Comércio Geral: Equipamentos Informáticos e Escritório',
        'fornecimento-encomenda'   => 'Comércio Geral: Fornecimento sob Encomenda',
        'outro'                    => 'Outra Solicitação / Dúvida',
    ];

    public const ESTADOS = ['nova', 'lida', 'respondida'];

    protected $fillable = [
        'nome', 'telefone', 'email', 'servico', 'mensagem',
        'status', 'answered_by', 'answered_at',
    ];

    protected function casts(): array
    {
        return ['answered_at' => 'datetime'];
    }

    public function respondidaPor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'answered_by');
    }

    public function servicoNome(): string
    {
        return self::SERVICOS[$this->servico] ?? $this->servico;
    }

}
