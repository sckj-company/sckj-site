@extends('layouts.app')

@section('title', 'Início')

@section('content')
    {{-- cola aqui só o conteúdo do meio da página inicial --}}
    
<!--===== HERO AREA STARTS =======-->
<div class="hero1-section-area" id="home">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-md-11 text-center">
        <div class="hero1-header heading1">
          <h5 data-aos="fade-up" data-aos-duration="800"><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="hero_badge">SCKJ — Prestação de Serviços & Comércio</span></h5>
          <div class="space20"></div>
          <h1 class="text-anime-style-3" data-i18n="hero_title">Gestão Documental, Criação de Empresas e Sistemas Tecnológicos</h1>
          <div class="space24"></div>
          <p data-aos="fade-up" data-aos-duration="900" data-i18n="hero_desc" class="hero-desc-centered">Apoiamos o crescimento do seu negócio: tratamos de toda a documentação legal e processos de abertura de empresas, desenvolvemos sistemas empresariais à medida e fornecemos bens comerciais essenciais.</p>
          <div class="space36"></div>
          <div class="btn-area1 justify-content-center" data-aos="fade-up" data-aos-duration="1000">
            <a href="{{route('services')}}" class="vl-btn1"><span data-i18n="hero_btn_services">Conhecer Serviços</span> <i class="fa-solid fa-arrow-right"></i></a>
            <a href="{{route('contacts')}}" class="vl-btn2 ms-sm-3"><span data-i18n="hero_btn_contact">Fale Connosco</span> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="hero-clean-features" data-aos="fade-up" data-aos-duration="1100">
            <div class="row g-3 justify-content-center">
              <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{route('services')}}" class="hero-feature-card text-decoration-none">
                  <div class="icon"><i class="fa-solid fa-file-signature"></i></div>
                  <div class="text">
                    <h6 data-i18n="srv1_title">Criação e Legalização de Empresas</h6>
                    <span data-i18n="hero_feat1_tag">Guichet Único, NIF e Estatutos</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{route('services')}}" class="hero-feature-card text-decoration-none">
                  <div class="icon"><i class="fa-solid fa-laptop-code"></i></div>
                  <div class="text">
                    <h6 data-i18n="srv3_title">Criação de Sistemas para Empresas</h6>
                    <span data-i18n="hero_feat2_tag">ERPs, Faturação e Softwares</span>
                  </div>
                </a>
              </div>
              <div class="col-lg-4 col-md-6 col-sm-12">
                <a href="{{route('commerce')}}" class="hero-feature-card text-decoration-none">
                  <div class="icon"><i class="fa-solid fa-boxes-packing"></i></div>
                  <div class="text">
                    <h6 data-i18n="nav_commerce">Comércio Geral & Fornecimento</h6>
                    <span data-i18n="hero_feat3_tag">Informática, Papelaria e Consumíveis</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== ABOUT AREA STARTS =======-->
<div class="about1-section-area sp1" id="about">
  <img src="{{asset('assets/img/elements/elements9.png')}}" alt="" class="elements9">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="about-images-area">
          <img src="{{asset('assets/img/elements/elements10.png')}}" alt="" class="elements10">
          <div class="row align-items-center">
            <div class="col-lg-6 col-md-6">
              <div class="img1 image-anime reveal">
            
                <img src="{{ imagem('home.banner', 'assets/img/all-images/about/about-img1.png')}}" alt="{{ imagem_alt('home.banner'), "Consultoria SCKJ"}}">
              </div>
              <div class="space30 d-lg-none d-block"></div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="img1 image-anime reveal">
                <img src="{{imagem('home.segunda','assets/img/all-images/about/about-img2.png')}}" alt="{{ imagem_alt('home.segunda'), "Desenvolvimento de Sistemas"}}">
              </div>
              <div class="space30"></div>
              <div class="img1 image-anime reveal">
                <img src="{{imagem('home.terceiro', 'assets/img/all-images/about/about-img3.png')}}" alt="{{ imagem_alt('home.terceiro'), "Gestão Documental"}}">
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
          <div class="space16"></div>
          <p data-aos="fade-left" data-aos-duration="850" data-i18n="about_p2">Desde a constituição formal de novas entidades até ao desenvolvimento de sistemas digitais personalizados e fornecimento de materiais e equipamentos, garantimos soluções completas com rigor, segurança e transparência.</p>
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

<!--===== SERVICE AREA STARTS =======-->
<div class="service1-section-area sp2" id="services" style="background-image: url(assets/img/all-images/bg/service-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
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
      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="800">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon1.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}" data-i18n="srv1_title">Criação e Legalização de Empresas</a>
          <div class="space16"></div>
          <p data-i18n="srv1_desc">Processo completo de abertura de empresas: redacção de estatutos, registo comercial (Guichet Único), obtenção de NIF empresarial, alvarás e publicação formal.</p>
          <div class="space24"></div>
          <h5>01</h5>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="900">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon2.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}" data-i18n="srv2_title">Tratamento e Gestão de Documentos</a>
          <div class="space16"></div>
          <p data-i18n="srv2_desc">Assessoria na obtenção e renovação de licenças comerciais, certidões fiscais e judiciais, conformidade legal, homologações e regularização de expedientes.</p>
          <div class="space24"></div>
          <h5>02</h5>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon6.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}" data-i18n="srv3_title">Criação de Sistemas para Empresas</a>
          <div class="space16"></div>
          <p data-i18n="srv3_desc">Desenvolvimento de softwares e sistemas de gestão à medida (ERP, faturação, controle de stock, fluxo de caixa e gestão de clientes) para otimizar os seus processos.</p>
          <div class="space24"></div>
          <h5>03</h5>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1100">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon5.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}" data-i18n="srv4_title">Websites & Plataformas Digitais</a>
          <div class="space16"></div>
          <p data-i18n="srv4_desc">Criação de websites profissionais, portais corporativos e plataformas digitais interativas para dar máxima visibilidade e credibilidade à sua marca.</p>
          <div class="space24"></div>
          <h5>04</h5>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1200">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon3.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}">Consultoria & Apoio Administrativo</a>
          <div class="space16"></div>
          <p data-i18n="srv5_desc">Aconselhamento técnico para estruturação corporativa, organização documental de arquivos, assessoria tributária preliminar e planeamento operacional.</p>
          <div class="space24"></div>
          <h5>05</h5>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-duration="1300">
        <div class="service1-boxarea">
          <div class="icons">
            <img src="{{asset('assets/img/icons/service-icon4.svg')}}" alt="">
          </div>
          <div class="arrow">
            <a href="{{route('services')}}"><i class="fa-solid fa-arrow-right"></i></a>
          </div>
          <div class="space24"></div>
          <a href="{{route('services')}}" data-i18n="srv6_title">Comércio Geral & Fornecimento</a>
          <div class="space16"></div>
          <p>Fornecimento institucional de equipamentos informáticos, periféricos, consumíveis de escritório e mercadorias sob encomenda para o dia a dia da sua organização.</p>
          <div class="space24"></div>
          <h5>06</h5>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== SERVICE AREA ENDS =======-->

<!--===== COMMERCE SECTION STARTS =======-->
<div class="work1-section-area sp1" id="commerce">
  <img src="{{asset('assets/img/elements/elements11.png')}}" alt="" class="elements9">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="solution-header heading2">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="comm_badge">Comércio Geral & Fornecimento</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="comm_title">Fornecimento Corporativo Ágil e Equipamentos para o Seu Negócio</h2>
          <div class="space16"></div>
          <p data-aos="fade-left" data-aos-duration="800" data-i18n="comm_desc">Na área de comércio geral, a <strong>SCKJ</strong> abastece a sua empresa com produtos seleccionados, rapidez logística e preços altamente competitivos.</p>
          <div class="space24"></div>
          <div class="bg-progress" data-aos="fade-left" data-aos-duration="900">
            <div class="progress-bar">
              <label><span data-i18n="comm_item1">Equipamentos de Informática & Redes</span> <span data-i18n="comm_sub1">Computadores, Servidores, Impressoras</span></label>
              <div class="progress">
                  <div class="progress-inner" style="width: 98%;"></div>
              </div>
            </div>
            <div class="progress-bar">
              <label><span data-i18n="comm_item2">Materiais de Escritório & Papelaria</span> <span data-i18n="comm_sub2">Consumíveis, Toners, Suprimentos</span></label>
              <div class="progress">
                  <div class="progress-inner" style="width: 100%;"></div>
              </div>
            </div>
            <div class="progress-bar">
              <label><span data-i18n="comm_item3">Fornecimento Diversificado sob Encomenda</span> <span data-i18n="comm_sub3">Bens & Mercadorias Corporativas</span></label>
              <div class="progress">
                  <div class="progress-inner" style="width: 96%;"></div>
              </div>
            </div>
          </div>
          <div class="space32"></div>
          <div class="btn-area1" data-aos="fade-left" data-aos-duration="1000">
            <a href="{{route('contacts')}}" class="vl-btn2"><span data-i18n="comm_btn">Pedir Cotação de Fornecimento</span> <i class="fa-solid fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
      <div class="col-lg-5">
        <div class="soultions-images">
          <img src="{{asset('assets/img/elements/elements10.png')}}" alt="" class="elements10">
          <div class="img1 reveal image-anime">
            <img src="{{imagem('home.comercio1','assets/img/all-images/work/work-img1.png?v=2')}}" alt="{{ imagem_alt('home.comercio1'),"Fornecimento SCKJ"}}">
          </div>
          <div class="img2 reveal image-anime">
            <img src="{{imagem('home.comercio2','assets/img/all-images/work/work-img2.png?v=2')}}" alt="{{ imagem_alt('home.comercio2'),"Soluções Corporativas SCKJ"}}">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== COMMERCE SECTION ENDS =======-->

<!--===== HOW IT WORKS & WHY US STARTS =======-->
<div class="work-others-section" id="why-us" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 m-auto">
        <div class="work-header heading1 text-center space-margin60">
          <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="works_badge">Como Trabalhamos</span></h5>
          <div class="space24"></div>
          <h2 class="text-anime-style-3" data-i18n="works_title">Processo Claro, Rápido e Sem Burocracia</h2>
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
                    <a href="{{route('services')}}" data-i18n="step1_title">Consulta Inicial & Diagnóstico</a>
                    <div class="space14"></div>
                    <p data-i18n="step1_desc">Reunimos consigo para compreender a necessidade: constituição da empresa, trâmites de documentos ou especificação do sistema.</p>
                  </div>
                </div>
                <div class="space30"></div>
                <div class="card-boxarea box2" data-aos="zoom-in" data-aos-duration="900">
                  <div class="content-area">
                    <a href="{{route('services')}}" data-i18n="step2_title">Planeamento & Cotação</a>
                    <div class="space14"></div>
                    <p data-i18n="step2_desc">Elaboramos um orçamento detalhado e transparente com cronograma claro de execução e etapas bem definidas.</p>
                  </div>
                  <div class="div text-end">
                    <h3>02</h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="images" data-aos="zoom-in" data-aos-duration="1000">
                  <img src="{{asset('assets/img/elements/elements12.png')}}" alt="" class="elements12">
                  <img src="{{asset('assets/img/elements/elements13.png')}}" alt="" class="elements13">
                  <img src="{{asset('assets/img/elements/elements14.png')}}" alt="" class="elements14">
                  <img src="{{asset('assets/img/elements/elements15.png')}}" alt="" class="elements15">
                  <div class="img1">
                    <img src="{{imagem('home.trabalhos','assets/img/all-images/case/case-img4.png?v=2')}}" alt="{{ imagem_alt('home.trabalhos'), "SCKJ Eficiência e Segurança"}}">
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card-boxarea box3" data-aos="zoom-in" data-aos-duration="800">
                  <div class="div">
                    <h3>03</h3>
                  </div>
                  <div class="content-area2">
                    <a href="{{route('services')}}" data-i18n="step3_title">Execução & Tramitação Ágil</a>
                    <div class="space14"></div>
                    <p data-i18n="step3_desc">A nossa equipa trata de todos os processos formais junto aos órgãos competentes ou programa os seus sistemas com rigor técnico.</p>
                  </div>
                </div>
                <div class="space30"></div>
                <div class="card-boxarea box4" data-aos="zoom-in" data-aos-duration="1000">
                  <div class="content-area2">
                    <a href="{{route('services')}}" data-i18n="step4_title">Entrega & Suporte Contínuo</a>
                    <div class="space14"></div>
                    <p data-i18n="step4_desc">Entrega de toda a documentação legal finalizada, formação no sistema implementado e suporte contínuo para o seu sucesso.</p>
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
<!--===== HOW IT WORKS & WHY US ENDS =======-->
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
            <img src="{{imagem('home.falar','assets/img/all-images/cta/cta-img1.png')}}" alt="{{ imagem_alt('home.falar'), "SCKJ Atendimento"}}">
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

<!--===== CONTACT AREA STARTS =======-->
<div class="contact-inner-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="heading2 text-center">
                    <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="contact_badge">Fale Connosco</span></h5>
                    <div class="space20"></div>
                    <h2 data-i18n="contact_title">Solicite Uma Cotação ou Esclareça as Suas Dúvidas</h2>
                </div>
                <div class="space40"></div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-contactbox">
                            <div class="icons">
                                <img src="{{asset('assets/img/icons/mail2.svg')}}" alt="E-mail">
                            </div>
                            <div class="content">
                                <h4 data-i18n="contact_email_title">E-mail</h4>
                                <a href="mailto:geral@sckj.co.ao">geral@sckj.co.ao</a>
                            </div>
                        </div>
                        <div class="space30 d-lg-none d-block"></div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="widget-contactbox">
                            <div class="icons">
                                <img src="{{asset('assets/img/icons/phn2.svg')}}" alt="Telefone">
                            </div>
                            <div class="content">
                                <h4 data-i18n="contact_phone_title">Telefone / WhatsApp</h4>
                                <a href="tel:+244923000000">+244 923 000 000</a>
                            </div>
                        </div>
                        <div class="space30 d-lg-none d-block"></div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="widget-contactbox">
                            <div class="icons">
                                <img src="{{asset('assets/img/icons/time2.svg')}}" alt="Horário">
                            </div>
                            <div class="content">
                                <h4 data-i18n="contact_time_title">Horário de Atendimento</h4>
                                <a>{!! nl2br(e(conteudo('Horário.horario'))) !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space60"></div>
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img1 reveal image-anime">
                            <img src="{{imagem('home.atendimento','assets/img/all-images/others/others-img2.png?v=2')}}" alt="{{ imagem_alt('home.atendimento'),"SCKJ Atendimento ao Cliente"}}">
                          </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="contact-author-boxarea">
                            <h3 data-i18n="form_title">Envie a Sua Mensagem</h3>
                            <div class="space16"></div>
                            
                            @if (session('sucesso'))
                                 <div class="alert alert-success">{{ session('sucesso') }}</div>
                            @endif
                            
                            <form action="{{ route('contacts.enviar') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input type="text" name="nome" 
                                            class="form-control @error('nome') is-invalid @enderror" placeholder="Nome Completo*" value="{{ old('nome') }}" data-i18n-ph="form_name_ph" >
                                            @error('nome') 
                                                 <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <div class="input-group">
                                            <select name="prefixo" class="form-select @error('prefixo') is-invalid @enderror"
                                                    style="max-width: 50%;" aria-label="Prefixo do país">
                                                @foreach (config('paises') as $iso => $pais)
                                                    <option value="{{ $iso }}" @selected(old('prefixo', 'AO') === $iso)>
                                                        +{{ $pais['prefixo'] }} {{ $pais['nome'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <input type="tel" name="telefone" class="form-control @error('telefone') is-invalid @enderror"
                                             placeholder="Telefone / WhatsApp*" value="{{ old('telefone') }}" data-i18n-ph="form_phone_ph" >
                                             </div>
                                             @error('prefixo')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                             @error('telefone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                              @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="input-area">
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                            placeholder="Endereço de E-mail*" value="{{ old('email') }}" data-i18n-ph="form_email_ph">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>         

                                    <div class="col-lg-12">
                                    <div class="input-area mb-3">
                                        <select name="assunto" class="form-select @error('assunto') is-invalid @enderror"
                                                style="width: 100%; height: 50px; border-radius: 8px; border: 1px solid rgba(0,0,0,0.12); padding: 0 16px;">
                                            <option value="" data-i18n="form_select_ph">Selecione o Serviço Pretendido...</option>
                                            <option value="criacao-empresa" data-i18n="form_opt1" @selected(old('assunto') === 'criacao-empresa')>Criação e Legalização de Empresa</option>
                                            <option value="tratamento-documentos" data-i18n="form_opt2" @selected(old('assunto') === 'tratamento-documentos')>Tratamento e Gestão de Documentos / Licenças</option>
                                            <option value="criacao-sistemas" data-i18n="form_opt3" @selected(old('assunto') === 'criacao-sistemas')>Desenvolvimento de Sistema para Empresa (Software / ERP)</option>
                                            <option value="website-plataforma" data-i18n="form_opt4" @selected(old('assunto') === 'website-plataforma')>Criação de Website ou Plataforma Digital</option>
                                            <option value="consultoria-empresarial" data-i18n="form_opt5" @selected(old('assunto') === 'consultoria-empresarial')>Consultoria e Apoio à Gestão</option>
                                            <option value="comercio-equipamentos" data-i18n="form_opt6" @selected(old('assunto') === 'comercio-equipamentos')>Comércio Geral: Equipamentos Informáticos e Escritório</option>
                                            <option value="fornecimento-encomenda" data-i18n="form_opt7" @selected(old('assunto') === 'fornecimento-encomenda')>Comércio Geral: Fornecimento sob Encomenda</option>
                                            <option value="outro" data-i18n="form_opt8" @selected(old('assunto') === 'outro')>Outra Solicitação / Dúvida</option>
                                        </select>
                                        @error('assunto')
                                            <div class="text-danger small mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                    <div class="col-lg-12">
                                        <div class="input-area">
                                            <textarea name="mensagem" class="form-control @error('mensagem') is-invalid @enderror" 
                                            placeholder="Escreva a sua mensagem, projeto ou detalhes do que necessita..." 
                                            data-i18n-ph="form_msg_ph" rows="4">{{ old('mensagem') }}</textarea>
                                              @error('mensagem')
                                                     <div class="invalid-feedback">{{ $message }}</div>
                                             @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="space24"></div>
                                        <div class="input-area">
                                           <button type="submit" class="vl-btn2"><span data-i18n="form_btn">Enviar Mensagem</span> <i class="fa-solid fa-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== CONTACT AREA ENDS =======-->
@endsection