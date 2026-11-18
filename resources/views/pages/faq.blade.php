@extends('layouts.app')

@section('title', 'faq')

@section('content')
    
<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    @include('portals.hero-gallery')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="faq_badge">Perguntas Frequentes</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_faq">Perguntas Frequentes</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== FAQ AREA STARTS =======-->
<div class="faq-inner-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5><span><img src="{{asset('assets/img/icons/sub-logo1.svg')}}" alt=""></span><span data-i18n="faq_badge">Perguntas Frequentes</span></h5>
                    <div class="space20"></div>
                    <h2 class="text-anime-style-3" data-i18n="faq_title">Esclareça as Suas Dúvidas Sobre os Nossos Serviços</h2>
                    <div class="space16"></div>
                    <p data-i18n="faq_desc">Reunimos as respostas para as perguntas mais comuns sobre constituição de empresas, documentação, sistemas e comércio em Angola.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="accordian-area">
                    <div class="accordion" id="accordionSCKJ">
                        <!-- Q1 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" aria-expanded="true" aria-controls="faq1" data-i18n="faq_q1">
                                Quanto tempo demora o processo de criação de uma empresa?
                            </button>
                          </h2>
                          <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a1">
                                O prazo médio para constituição legal no Guichet Único e obtenção do NIF varia habitualmente entre 5 a 15 dias úteis, dependendo do tipo societário e da celeridade das instituições públicas. A SCKJ acompanha todas as etapas para garantir a máxima rapidez.
                            </div>
                          </div>
                        </div>

                        <!-- Q2 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2" aria-expanded="false" aria-controls="faq2" data-i18n="faq_q2">
                                Que documentos são necessários para constituir uma sociedade?
                            </button>
                          </h2>
                          <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a2">
                                Geralmente são necessários os Bilhetes de Identidade (ou Passaportes) dos sócios, comprovativos de morada, NIF pessoal e a definição dos ramos de atividade e capital social. A nossa equipa elabora a minuta do estatuto e orienta em toda a documentação.
                            </div>
                          </div>
                        </div>

                        <!-- Q3 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3" aria-expanded="false" aria-controls="faq3" data-i18n="faq_q3">
                                Que tipos de sistemas empresariais a SCKJ desenvolve?
                            </button>
                          </h2>
                          <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a3">
                                Desenvolvemos sistemas web completos de gestão comercial (ERP), faturação certificada, controle de stocks e armazém, gestão de fluxo de caixa e recursos humanos, adaptados à legislação fiscal angolana.
                            </div>
                          </div>
                        </div>

                        <!-- Q4 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq4" aria-expanded="false" aria-controls="faq4" data-i18n="faq_q4">
                                A SCKJ fornece equipamentos informáticos com garantia?
                            </button>
                          </h2>
                          <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a4">
                                Sim, todos os equipamentos informáticos e periféricos fornecidos pela SCKJ são novos, certificados por marcas conceituadas e acompanhados de garantia comercial com assistência técnica.
                            </div>
                          </div>
                        </div>

                        <!-- Q5 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq5" aria-expanded="false" aria-controls="faq5" data-i18n="faq_q5">
                                É possível solicitar fornecimento de produtos sob encomenda?
                            </button>
                          </h2>
                          <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a5">
                                Sim, dispomos de um serviço de compras e fornecimento institucional sob demanda, atendendo a encomendas de bens específicos para empresas e instituições públicas ou privadas.
                            </div>
                          </div>
                        </div>

                        <!-- Q6 -->
                        <div class="accordion-item mb-4" style="border: 1px solid rgba(0,0,0,0.08); border-radius: 12px; overflow: hidden;">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq6" aria-expanded="false" aria-controls="faq6" data-i18n="faq_q6">
                                Como posso solicitar uma cotação à SCKJ?
                            </button>
                          </h2>
                          <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#accordionSCKJ">
                            <div class="accordion-body p-4 text-muted" data-i18n="faq_a6">
                                Pode solicitar uma cotação através do nosso formulário online na página de Contactos, por e-mail ou diretamente via WhatsApp/Telefone. Respondemos habitualmente em menos de 24 horas.
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== FAQ AREA ENDS =======-->

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
             <img src="{{imagem('FAQ.fala','assets/img/all-images/cta/cta-img1.png')}}" alt="{{ imagem_alt('FAQ.fala'),"SCKJ Atendimento"}}">
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