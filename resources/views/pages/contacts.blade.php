@extends('layouts.app')

@section('title', 'contacts')

@section('content')
  

<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    @include('portals.hero-gallery')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="contact_badge">Fale Connosco</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_contact">Contactos</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

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
                            <div class="space16"></div>
                            <form action="{{ route('contacts.enviar') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-area">
                                            <input type="text" name="nome" 
                                            class="form-control @error('nome') is-invalid @enderror"
                                             placeholder="Nome Completo*" value="{{ old('nome') }}" 
                                             data-i18n-ph="form_name_ph" >
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
                                            <input type="tel" name="telefone"
                                             class="form-control @error('telefone') is-invalid @enderror"
                                             placeholder="Telefone / WhatsApp*" value="{{ old('telefone') }}"
                                              data-i18n-ph="form_phone_ph" >
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
                                      <div class="input-area mb-3">
                                          <input type="email" name="email"
                                              class="form-control @error('email') is-invalid @enderror"
                                              placeholder="Endereço de E-mail*"
                                              value="{{ old('email') }}"
                                              data-i18n-ph="form_email_ph">

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
             <img src="{{imagem('Contactos.fala','assets/img/all-images/cta/cta-img1.png')}}" alt="{{ imagem_alt('Contactos.fala'),"SCKJ Atendimento"}}">
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
