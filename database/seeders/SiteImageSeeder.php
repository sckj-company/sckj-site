<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SiteImage;
use Illuminate\Database\Seeder;

class SiteImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [chave, página, rótulo, imagem original (dentro de public/), largura, altura, alt PT, alt EN, alt ZH]
        $imagens = [
            ['home.banner', 'home', 'Banner da página incial', 'assets/img/all-images/about/About1-img001.jpeg', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                 ['home.segunda', 'home', 'Banner da página inicial', 'assets/img/all-images/about/about-img002.jpeg', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                 ['home.terceiro', 'home', 'Banner da página inicial', 'assets/img/all-images/about/about-imagem003.png', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                 ['home.comercio1', 'home', 'Comercio', 'assets/img/all-images/work/work-img1.png', 1920, 800,
                'Na área de comércio geral, a SCKJ abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.',
                'In the general trade sector, SCKJ supplies your company with carefully selected products, rapid logistics, and highly competitive prices.',
                '在一般贸易领域，SCKJ 为贵公司提供精选产品、快捷物流以及极具竞争力的价格。'],
                 
                ['home.comercio2', 'home', 'Comercio', 'assets/img/all-images/work/work-img2.png', 1920, 800,
                'Na área de comércio geral, a SCKJ abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.',
                'In the general trade sector, SCKJ supplies your company with carefully selected products, rapid logistics, and highly competitive prices.',
                '在一般贸易领域，SCKJ 为贵公司提供精选产品、快捷物流以及极具竞争力的价格。'],

                ['home.trabalhos', 'home', 'Como Trabalhamos', 'assets/img/all-images/case/case-img4.png', 1920, 800,
                'Processo Claro, Rápido e Sem Burocracia.',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],

                ['home.falar', 'home', 'Falar com um Consultor', 'assets/img/all-images/cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],

                ['home.atendimento', 'home', 'Linha de Atendimento', 'assets/img/all-images//others/others-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],

                //Sobre Nós
                ['Sobre.Nós', 'sobre', 'Banner da página incial', 'assets/img/all-images/hero/hero-img1.png', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                 ['Sobre.Nós2', 'sobre', 'Banner da página inicial', 'assets/img/all-images/about/about-img2.png', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                 ['Sobre.Nós3', 'sobre', 'Banner da página inicial', 'assets/img/all-images/about/about-img3.png', 1920, 800,
                'Equipa da SCKJ a atender um cliente',
                'SCKJ team assisting a client',
                'SCKJ 团队为客户提供服务'],

                ['Sobre.Nos4', 'sobre', 'Como Trabalhamos', 'assets/img/all-images/case/case-img4.png', 1920, 800,
                'Processo Claro, Rápido e Sem Burocracia.',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],

                ['Sobre.Nós5', 'sobre', 'Falar com um Consultor', 'assets/img/all-images//cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],

                //Serviço
                ['Serviço.fala', 'services', 'Falar com um Consultor', 'assets/img/all-images//cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],
                //Comercio
                ['Comercio.fala', 'services', 'Falar com um Consultor', 'assets/img/all-images//cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],
               //FAQ
                ['FAQ.fala', 'services', 'Falar com um Consultor', 'assets/img/all-images//cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],
                //Contactos
                ['Contactos.fala', 'services', 'Falar com um Consultor', 'assets/img/all-images//cta/cta-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],
                ['Contactos.atendimento', 'home', 'Linha de Atendimento', 'assets/img/all-images//others/others-img2.png', 1920, 800,
                'Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?',
                'A Clear, Fast, and Bureaucracy-Free Process.',
                '清晰、快捷且无官僚作风的流程。'],
               
    
        ];
           

        foreach ($imagens as [$chave, $pagina, $rotulo, $padrao, $largura, $altura, $altPt, $altEn, $altZh]) {
            SiteImage::firstOrCreate(
                ['chave' => $chave],
                [
                    'pagina'      => $pagina,
                    'rotulo'      => $rotulo,
                    'padrao'      => $padrao,
                    'largura_rec' => $largura,
                    'altura_rec'  => $altura,
                    'alt_pt'      => $altPt,
                    'alt_en'      => $altEn,
                    'alt_zh'      => $altZh,
                ]
            );
        }
    }
}
