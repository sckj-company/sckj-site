<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         $servicos = [
            ['Criação de Empresas',           'Company Registration', '公司注册'],
            ['Tratamento de Documentos',      'Document Processing',  '文件办理'],
            ['Sistemas para Empresas',        'Business Systems',     '企业系统'],
            ['Websites Corporativos',         'Corporate Websites',   '企业网站'],
            ['Equipamentos de Informática',   'IT Equipment',         '信息技术设备'],
            ['Fornecimento Institucional',    'Institutional Supply', '机构供应'],
        ];

        foreach ($servicos as $i => [$pt, $en, $zh]) {
            Service::firstOrCreate(['titulo_pt' => $pt], [
                'titulo_en'    => $en,
                'titulo_zh'    => $zh,
                'descricao_pt' => 'Descrição do serviço.',
                'descricao_en' => 'Service description.',
                'descricao_zh' => '服务说明。',
                'ordem'        => $i + 1,
                'status'       => 'publicado',
                'approved_at'  => now(),
            ]);
        }

    }
}
