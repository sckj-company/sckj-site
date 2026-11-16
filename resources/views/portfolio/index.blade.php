
@extends('layouts.app')

@section('title', 'Nosso Portfólio - SCKJ')

@section('content')
<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="nav_portfolio">Nossos Projectos</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="nav_portfolio">Projectos</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold" data-i18n="nossos_projetos">Nossos Projetos</h1>
        <br>
        <p class="text-muted" data-i18n="conheca_algumas_solucoes">
            Conheça algumas das soluções digitais
            desenvolvidas pela SCKJ.
        </p>
    </div>

    <div class="row g-4">

        @forelse($portfolios as $portfolio)

            <div class="col-md-6 col-lg-4">

                <div class="card h-100 shadow-sm border-0">

                    @if($portfolio->image)
                        <img
                            src="{{ asset('storage/' . $portfolio->image) }}"
                            class="card-img-top"
                            alt="{{ $portfolio->title }}"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center"
                             style="height: 220px;">
                            <span class="text-muted">
                                Sem imagem disponível
                            </span>
                        </div>
                    @endif

                    <div class="card-body">

                        <span class="badge bg-primary mb-2">
                            {{ $portfolio->category }}
                        </span>

                        <h5 class="card-title fw-bold">
                            {{ $portfolio->title }}
                        </h5>

                        <p class="card-text text-muted">
                            {{ Str::limit($portfolio->description, 120) }}
                        </p>

                        @if($portfolio->technologies)
                            <div class="mb-3">
                                @foreach($portfolio->technologies as $technology)
                                    <span class="badge bg-light text-dark border">
                                        {{ $technology }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        @if($portfolio->demo_url)
                            <a href="{{ $portfolio->demo_url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="btn btn-primary w-100">
                                Ver demonstração
                            </a>
                        @endif

                    </div>
                </div>

            </div>

        @empty

            <div class="col-12 text-center py-5">
                <h4>Ainda não existem projetos publicados.</h4>
                <p class="text-muted">
                    Em breve apresentaremos os nossos projetos.
                </p>
            </div>

        @endforelse

    </div>

    <div class="mt-5">
        {{ $portfolios->links() }}
    </div>

</div>
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
