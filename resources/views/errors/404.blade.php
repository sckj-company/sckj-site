@extends('layouts.app')

@section('title', 'Página não encontrada')

@section('content')


<!--===== HERO AREA STARTS =======-->
<div class="inner-page-hero-area" style="background-image: url(assets/img/all-images/bg/hero-bg1.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="inner-header text-center heading1">
                    <h1 data-i18n="error_badge">Erro 404</h1>
                    <div class="space28"></div>
                    <a href="{{route('home')}}"><span data-i18n="nav_home">Início</span> <i class="fa-solid fa-angle-right"></i> <span data-i18n="error_badge">Erro 404</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== HERO AREA ENDS =======-->

<!--===== OTHERS AREA STARTS =======-->
<div class="error-section-area sp1">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="images-conten-area text-center">
                    <div class="img1 image-anime reveal">
                        <img loading="lazy" src="{{asset('assets/img/all-images/others/error.png')}}" alt="404 Error">
                    </div>
                    <div class="space40"></div>
                    <div class="heading2 text-center">
                        <h2 data-i18n="error_title">Oops! Página Não Encontrada</h2>
                        <div class="space24"></div>
                        <p data-i18n="error_desc">A página que procura não existe ou foi movida. Utilize a barra de navegação para voltar às páginas da SCKJ.</p>
                       <div class="space32"></div>
                        <div class="btn-area1">
                            <a href="{{route('home')}}" class="vl-btn2"><span data-i18n="error_btn">Voltar à Página Inicial</span> <i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--===== OTHERS AREA ENDS =======-->

@endsection