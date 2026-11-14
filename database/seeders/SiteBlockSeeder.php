<?php

namespace Database\Seeders;

use App\Models\SiteBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // [chave, página, rótulo no painel, tipo, PT, EN, ZH]
        $blocos = [

                    ['home.banner.titulo', 'home', 'Banner: título', 'texto',
                        'Soluções completas para a sua empresa',
                        'Complete solutions for your business',
                        '为您的企业提供完整解决方案'],

                    ['home.banner.subtitulo', 'home', 'Banner: subtítulo', 'texto_longo',
                        'Legalização, documentos, sistemas e consultoria num só lugar.',
                        'Company registration, documents, software and consulting in one place.',
                        '公司注册、文件办理、软件系统与咨询服务，一站式完成。'],

                    ['Horário.horario', 'horario', 'Horário: horario', 'texto',
                        'Seg - Sex: 8h às 17h | Sáb: 8h às 13h.',
                        'Mon – Fri: 8 am – 5 pm | Sat: 8 am – 1 pm',
                        '周一至周五：上午 8 点至下午 5 点 | 周六：上午 8 点至下午 1 点'],

                    
                    //Footer
                    
                    ['geral.rodape.descricao', 'geral', 'Rodapé: descrição da empresa', 'texto_longo',
                            'A SCKJ é uma empresa especializada em prestação de serviços e comércio geral: legalização e criação de empresas, tratamento documental, criação de sistemas empresariais e fornecimento corporativo.',
                            'SCKJ is a company specializing in the provision of services and general commerce: business incorporation and legalization, document processing, the development of business systems, and corporate supply.',
                            'SCKJ 是一家专门提供各类服务及从事综合贸易的公司，业务涵盖：企业注册与合规化、文件处理、商业系统开发，以及企业物资供应。'],

                    ['Contactos.telefone', 'geral', 'Rodapé: telefone', 'texto',
                            '+244 923 000 000',
                            '+244 923 000 000',
                            '+244 923 000 000'],

                    ['Email.email', 'geral', 'Rodapé: email', 'texto',
                            'geral@sckj.co.ao',
                            'geral@sckj.co.ao',
                            'geral@sckj.co.ao'],

                    ['Localização.localizacao', 'geral', 'Rodapé: localização', 'texto',
                            'Luanda, Angola',
                            'Luanda, Angola',
                            'Luanda, Angola'],

                
                ];

        

        foreach ($blocos as [$chave, $pagina, $rotulo, $tipo, $pt, $en, $zh]) {
            SiteBlock::firstOrCreate(
                ['chave' => $chave],
                compact('pagina', 'rotulo', 'tipo') + [
                    'valor_pt' => $pt,
                    'valor_en' => $en,
                    'valor_zh' => $zh,
                ]
            );
        }
    }
}
