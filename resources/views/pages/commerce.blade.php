@extends('layouts.app')

@section('title', 'commerce')

@section('content')
@php
    $altFala = imagem_alt_i18n('Comercio.fala');
@endphp

<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    @include('portals.hero-gallery')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="nav_commerce">Comércio Geral</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_commerce">Comércio Geral</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== COMMERCE SECTION STARTS =======-->
<div class="service1-section-area sp2">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="service-header text-center heading2 space-margin60">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="comm_badge">Comércio Geral & Fornecimento</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="comm_title">Fornecimento Corporativo Ágil e Equipamentos para o Seu Negócio</h2>
          <div class="space16"></div>
          <p data-i18n="comm_desc">Na área de comércio geral, a SCKJ abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- 01 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="800">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon6.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="comm_card1_title">Equipamentos de TI & Informática</a>
          <div class="space16"></div>
          <p data-i18n="comm_card1_desc">Computadores de secretária, portáteis profissionais, servidores empresariais, switches, routers e impressoras de alta capacidade com assistência técnica.</p>
          <div class="space24"></div>
          <h5>01</h5>
        </div>
      </div>

      <!-- 02 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="900">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon4.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="comm_card2_title">Materiais de Escritório & Papelaria</a>
          <div class="space16"></div>
          <p data-i18n="comm_card2_desc">Papel A4/A3, toners e tinteiros originais, pastas de arquivo, organizadores e consumíveis diários para a rotina do seu escritório.</p>
          <div class="space24"></div>
          <h5>02</h5>
        </div>
      </div>

      <!-- 03 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon1.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="comm_card3_title">Equipamentos de Proteção Individual (EPI)</a>
          <div class="space16"></div>
          <p data-i18n="comm_card3_desc">Botas de segurança, capacetes, luvas de proteção, coletes reflectores e fardamento laboral para obras, armazéns e indústrias.</p>
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
          <a href="{{route('contacts')}}" data-i18n="comm_card4_title">Material Elétrico & Telecomunicações</a>
          <div class="space16"></div>
          <p data-i18n="comm_card4_desc">Cabos de rede, calhas técnicas, tomadas industriais, UPS e estabilizadores de tensão para proteger os equipamentos da sua empresa.</p>
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
          <a href="{{route('contacts')}}" data-i18n="comm_card5_title">Fornecimento Institucional sob Encomenda</a>
          <div class="space16"></div>
          <p data-i18n="comm_card5_desc">Aquisição sob demanda de mercadorias específicas para concursos públicos, projetos privados ou reposição urgente de stocks.</p>
          <div class="space24"></div>
          <h5>05</h5>
        </div>
      </div>

      <!-- 06 -->
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1300">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon2.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('contacts')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('contacts')}}" data-i18n="comm_card6_title">Mobiliário e Artigos Corporativos</a>
          <div class="space16"></div>
          <p data-i18n="comm_card6_desc">Secretárias, cadeiras ergonómicas, armários de arquivo e estações de trabalho para equipar o seu espaço com modernidade e conforto.</p>
          <div class="space24"></div>
          <h5>06</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== COMMERCE SECTION ENDS =======-->
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
             <img loading="lazy" src="{{imagem('Comercio.fala','assets/img/all-images/cta/cta-img2.png')}}" alt="{{ $altFala['pt'] }}" data-i18n-values='@json($altFala)' data-i18n-attr="alt">
          </div>
          <ul class="aniamtion-key-1">
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt=""><span data-i18n="cta_point1">Respostas Rápidas</span></a></li>
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt=""><span data-i18n="cta_point2">Apoio Dedicado</span></a></li>
            <li><a href="{{route('contacts')}}"><img src="{{asset('assets/img/icons/check5.svg')}}" alt=""><span data-i18n="cta_point3">Sem Burocracia</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== CTA AREA ENDS =======-->


@endsection



