@extends('layouts.app')

@section('title', 'services')

@section('content')
    

<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    @include('portals.hero-gallery')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="nav_services">Nossos Serviços</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_services">Serviços</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== SERVICE AREA STARTS =======-->
<div class="service1-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="service-header text-center heading2 space-margin60">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="services_badge">Prestação de Serviços Especializados</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="services_title">Soluções Documentais, Jurídico-Administrativas e Tecnológicas</h2>
          <div class="space16"></div>
          <p data-i18n="services_desc">Conheça os nossos principais serviços desenvolvidos para simplificar trâmites administrativos, legalizar operações e potenciar o seu negócio com tecnologia moderna.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- 01 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="800">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon1.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv1_title">Criação e Legalização de Empresas</a>
          <div class="space16"></div>
          <p data-i18n="srv1_desc">Processo completo de abertura de empresas: redacção de estatutos, registo comercial (Guichet Único), obtenção de NIF empresarial, alvarás e publicação formal.</p>
          <div class="space24"></div>
          <h5>01</h5>
        </div>
      </div>

      <!-- 02 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="900">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon2.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv2_title">Tratamento e Gestão de Documentos</a>
          <div class="space16"></div>
          <p data-i18n="srv2_desc">Assessoria na obtenção e renovação de licenças comerciais, certidões fiscais e judiciais, conformidade legal, homologações e regularização de expedientes.</p>
          <div class="space24"></div>
          <h5>02</h5>
        </div>
      </div>

      <!-- 03 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon6.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv3_title">Criação de Sistemas para Empresas</a>
          <div class="space16"></div>
          <p data-i18n="srv3_desc">Desenvolvimento de softwares e sistemas de gestão à medida (ERP, faturação, controle de stock, fluxo de caixa e gestão de clientes) para otimizar os seus processos.</p>
          <div class="space24"></div>
          <h5>03</h5>
        </div>
      </div>

      <!-- 04 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon5.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv4_title">Websites & Plataformas Digitais</a>
          <div class="space16"></div>
          <p data-i18n="srv4_desc">Criação de websites profissionais, portais corporativos e plataformas digitais interativas para dar máxima visibilidade e credibilidade à sua marca.</p>
          <div class="space24"></div>
          <h5>04</h5>
        </div>
      </div>

      <!-- 05 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1200">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon3.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv5_title">Consultoria & Apoio à Gestão</a>
          <div class="space16"></div>
          <p data-i18n="srv5_desc">Aconselhamento técnico para estruturação corporativa, organização documental de arquivos, assessoria tributária preliminar e planeamento operacional.</p>
          <div class="space24"></div>
          <h5>05</h5>
        </div>
      </div>

      <!-- 06 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1300">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon4.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv6_title">Comércio: Equipamentos de Informática</a>
          <div class="space16"></div>
          <p data-i18n="srv6_desc">Venda e fornecimento institucional de computadores, servidores, periféricos, consumíveis e mercadorias sob encomenda para a sua organização.</p>
          <div class="space24"></div>
          <h5>06</h5>
        </div>
      </div>

      <!-- 07 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1400">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon7.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv7_title">Comércio: Materiais de Escritório</a>
          <div class="space16"></div>
          <p data-i18n="srv7_desc">Fornecimento regular de consumíveis de escritório, toners, papelaria em geral e artigos administrativos para manter a sua empresa sempre abastecida.</p>
          <div class="space24"></div>
          <h5>07</h5>
        </div>
      </div>

      <!-- 08 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1500">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon8.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv8_title">Fornecimento sob Encomenda</a>
          <div class="space16"></div>
          <p data-i18n="srv8_desc">Aquisição e logística especializada de bens diversos solicitados pela sua organização, garantindo rapidez na entrega e os melhores preços do mercado.</p>
          <div class="space24"></div>
          <h5>08</h5>
        </div>
      </div>

      <!-- 09 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1600">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon9.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="srv9_title">Suporte Técnico & Manutenção</a>
          <div class="space16"></div>
          <p data-i18n="srv9_desc">Apoio técnico pós-implementação de sistemas, manutenção de equipamentos, backups regulares e assistência dedicada para garantir a continuidade do seu negócio.</p>
          <div class="space24"></div>
          <h5>09</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== SERVICE AREA ENDS =======-->

<!--===== CTA AREA STARTS =======-->
<div class="cta1-section-area sp1">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7">
        <div class="cta-header heading1">
          <h2 data-aos="fade-left" data-aos-duration="700" data-i18n="cta_title">Pronto Para Criar a Sua Empresa ou Implementar um Sistema de Gestão?</h2>
          <div class="space16"></div>
          <p data-aos="fade-left" data-aos-duration="800" data-i18n="cta_desc">Evite atrasos e burocracias. Fale hoje mesmo com os especialistas da SCKJ e obtenha uma solução personalizada para o seu negócio.</p>
          <div class="space24"></div>
          <div class="btn-area1" data-aos="fade-left" data-aos-duration="900">
            <a href="{{route('contacts')}}" class="vl-btn1"><span data-i18n="cta_btn">Falar com um Consultor</span> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-4">
        <div class="cta-images">
          <div class="img1">
             <img src="{{imagem('Serviço.fala','assets/img/all-images/cta/cta-img1.png')}}" alt="{{ imagem_alt('Serviço.fala'),"SCKJ Atendimento"}}">
            
          </div>
          <ul class="aniamtion-key-1">
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt="">Respostas Rápidas</a></li>
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt="">Apoio Dedicado</a></li>
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt="">Sem Burocracia</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== CTA AREA ENDS =======-->
@endsection