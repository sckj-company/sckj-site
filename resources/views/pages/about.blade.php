@extends('layouts.app')

@section('title', 'about')

@section('content')
@php
    $altBanner = imagem_alt_i18n('home.banner');
    $altSegunda = imagem_alt_i18n('home.segunda');
    $altTerceiro = imagem_alt_i18n('home.terceiro');
    $altConfianca = imagem_alt_i18n('Sobre.Nós4');
    $altAtendimento = imagem_alt_i18n('Sobre.Nós5');
@endphp

<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    @include('portals.hero-gallery')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="nav_about">Sobre Nós</h1>
                    <div class="space28"></div>
                    <a href="index.html"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_about">Sobre Nós</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->


<!--===== ABOUT AREA STARTS =======-->
<div class="about1-section-area sp1" id="about">
  <img loading="lazy" src="{{asset('assets/img/elements/elements9.png')}}" alt="" class="elements9">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-images-area">
          <img loading="lazy" src="{{asset('assets/img/elements/elements10.png')}}" alt="" class="elements10">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
              <div class="img1 image-anime reveal">
            
                <img loading="lazy" src="{{ imagem('home.banner', 'assets/img/all-images/about/about-img1.png')}}" alt="{{ $altBanner['pt'] }}" data-i18n-values='@json($altBanner)' data-i18n-attr="alt">
              </div>
              <div class="space30 d-lg-none d-block"></div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="img1 image-anime reveal">
                <img loading="lazy" src="{{imagem('home.segunda','assets/img/all-images/about/about-img2.png')}}" alt="{{ $altSegunda['pt'] }}" data-i18n-values='@json($altSegunda)' data-i18n-attr="alt">
              </div>
              <div class="space30"></div>
              <div class="img1 image-anime reveal">
                <img loading="lazy" src="{{imagem('home.terceiro', 'assets/img/all-images/about/about-img3.png')}}" alt="{{ $altTerceiro['pt'] }}" data-i18n-values='@json($altTerceiro)' data-i18n-attr="alt">
              </div>
            </div>
          </div>
          <div class="check-icons aniamtion-key-1">
            <img src="{{asset('assets/img/icons/check1.svg')}}" alt="">
            <p data-i18n="about_quote">Agilidade em trâmites legais, tecnologia moderna e fornecimento corporativo.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-1"></div>
      <div class="col-lg-5">
        <div class="about-header-area heading2">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="about_badge">Sobre a SCKJ</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="about_title">O Parceiro Estratégico para Legalizar, Estruturar e Digitalizar a Sua Empresa</h2>
          <div class="space16"></div>
          <p data-aos="fade-left" data-aos-duration="800" data-i18n="about_p1">A <strong>SCKJ</strong> é uma empresa especializada em prestação de serviços corporativos e comércio geral. Eliminamos a burocracia dos processos empresariais para que os nossos clientes foquem no crescimento das suas operações.</p>  
          <div class="space28"></div>
          <div class="row" data-aos="fade-left" data-aos-duration="900">
            <div class="col-lg-6 col-md-6">
              <div class="progresbar">
                <div class="progressbar">
                   <div class="circle" data-percent="99"><canvas width="80" height="80"></canvas>
                       <div class="count">99%</div>
                  </div>
                </div>
                <div class="content-area">
                  <h4 data-i18n="about_stat1_title">Conformidade Legal</h4>
                  <div class="space8"></div>
                  <p data-i18n="about_stat1_desc">Processos 100% Seguros</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6">
              <div class="space28 d-md-none d-block"></div>
              <div class="progresbar">
                <div class="progressbar">
                   <div class="circle" data-percent="97"><canvas width="80" height="80"></canvas>
                       <div class="count">97%</div>
                  </div>
                </div>
                <div class="content-area">
                  <h4 data-i18n="about_stat2_title">Inovação Digital</h4>
                  <div class="space8"></div>
                  <p data-i18n="about_stat2_desc">Sistemas Sob Medida</p>
                </div>
              </div>
            </div>
          </div>
          <div class="space32"></div>
          <div class="btn-area1" data-aos="fade-left" data-aos-duration="1000">
            <a href="{{route('about')}}" class="vl-btn2"><span data-i18n="about_btn">Mais Sobre a SCKJ</span> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== ABOUT AREA ENDS =======-->

<!--===== PILARES E VALORES STARTS =======-->
<div class="work-others-section" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="work-header heading1 text-center space-margin60">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="values_badge">Nossos Valores</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="values_title">Os Pilares Que Orientam a Actuação da SCKJ</h2>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="case1-section-area sp1">
  <div class="case-works-section-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="others-widget-area">
            <div class="row align-items-center">
              <div class="col-lg-4">
                <div class="card-boxarea box1" data-aos="zoom-in" data-aos-duration="800">
                  <div class="div text-end">
                    <h3>01</h3>
                  </div>
                  <div class="content-area">
                    <a href="service.html" data-i18n="pillar1_title">Confidencialidade & Rigor</a>
                    <div class="space14"></div>
                    <p data-i18n="pillar1_desc">Tratamos as informações da sua empresa e processos legais com sigilo absoluto e conformidade jurídica integral.</p>
                  </div>
                </div>
                <div class="space30"></div>
                <div class="card-boxarea box2" data-aos="zoom-in" data-aos-duration="900">
                  <div class="content-area">
                    <a href="service.html" data-i18n="pillar2_title">Rapidez sem Burocracia</a>
                    <div class="space14"></div>
                    <p data-i18n="pillar2_desc">Agilizamos a obtenção de documentos e entrega de sistemas, reduzindo tempos de espera e maximizando a sua produtividade.</p>
                  </div>
                  <div class="div text-end">
                    <h3>02</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="images" data-aos="zoom-in" data-aos-duration="1000">
                  <img loading="lazy" src="{{asset('assets/img/elements/elements12.png')}}" alt="" class="elements12">
                  <img loading="lazy" src="{{asset('assets/img/elements/elements13.png')}}" alt="" class="elements13">
                  <img loading="lazy" src="{{asset('assets/img/elements/elements14.png')}}" alt="" class="elements14">
                  <img loading="lazy" src="{{asset('assets/img/elements/elements15.png')}}" alt="" class="elements15">
                  <div class="img1">
                    <img loading="lazy" src="{{imagem('Sobre.Nós4','assets/img/all-images/case/case-img4.png?v=2')}}" alt="{{ $altConfianca['pt'] }}" data-i18n-values='@json($altConfianca)' data-i18n-attr="alt">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-boxarea box3" data-aos="zoom-in" data-aos-duration="800">
                  <div class="div">
                    <h3>03</h3>
                  </div>
                  <div class="content-area2">
                    <a href="service.html" data-i18n="pillar3_title">Inovação Tecnológica</a>
                    <div class="space14"></div>
                    <p data-i18n="pillar3_desc">Desenvolvemos ferramentas digitais inteligentes que facilitam a gestão financeira, de stock e de vendas do seu negócio.</p>
                  </div>
                </div>
                <div class="space30"></div>
                <div class="card-boxarea box4" data-aos="zoom-in" data-aos-duration="1000">
                  <div class="content-area2">
                    <a href="service.html" data-i18n="pillar4_title">Parceria Contínua</a>
                    <div class="space14"></div>
                    <p data-i18n="pillar4_desc">Não entregamos apenas serviços; construímos relações duradouras de apoio ao crescimento sustentável da sua empresa.</p>
                  </div>
                  <div class="div">
                    <h3>04</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== PILARES E VALORES ENDS =======-->

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
            <img loading="lazy" src="{{imagem('Sobre.Nós5','assets/img/all-images/cta/cta-img1.png')}}" alt="{{ $altAtendimento['pt'] }}" data-i18n-values='@json($altAtendimento)' data-i18n-attr="alt">
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



