<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-i18n="meta_title">SCKJ - Prestação de Serviços & Comércio Geral</title>
    <meta name="description"
          content="SCKJ - Soluções corporativas integradas: Criação e legalização de empresas, tratamento e gestão de documentos, desenvolvimento de sistemas e comércio geral."
          data-i18n="meta_desc" data-i18n-attr="content">

    <script>window.SITE_LANG = @json(app()->getLocale());</script>

    <!--===== FAB ICON =======-->
    <link rel="shortcut icon" href="{{asset('assets/img/logo/fav-logo1.png')}}" type="image/x-icon">
    <!-- Logótipo do carrossel: pré-carregado para não piscar nas trocas de slide. -->
    <link rel="preload" as="image" href="{{ asset('assets/img/logo/logo1.png') }}">

    <!--===== CSS LINK =======-->
    <link rel="stylesheet" href="{{asset('assets/css/plugins/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/mobile.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/owlcarousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/sidebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/slick-slider.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.css')}}?v={{ filemtime(public_path('assets/css/main.css')) }}">

    <!--===== JS SCRIPT LINK =======-->
    <script src="{{asset('assets/js/plugins/jquery-3-7-1.min.js')}}"></script>

    @stack('styles')
</head>
<body>
    @include('portals.header')

    <main>
        @yield('content')
    </main>

    @include('portals.footer')

    <!--===== JS SCRIPT LINK =======-->
    <script src="{{asset('assets/js/plugins/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/fontawesome.js')}}"></script>
    <script src="{{asset('assets/js/plugins/aos.js')}}"></script>
    <script src="{{asset('assets/js/plugins/counter.js')}}"></script>
    <script src="{{asset('assets/js/plugins/gsap.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/ScrollTrigger.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/Splitetext.js')}}"></script>
    <script src="{{asset('assets/js/plugins/SmoothScroll.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sidebar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/mobilemenu.js')}}"></script>
    <script src="{{asset('assets/js/plugins/owlcarousel.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/nice-select.js')}}"></script>
    <script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick-slider.js')}}"></script>
    <script src="{{asset('assets/js/plugins/circle-progress.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script src="{{ asset('assets/js/i18n.js') }}?v={{ filemtime(public_path('assets/js/i18n.js')) }}"></script>
    <script src="{{ asset('assets/js/progressive.js') }}?v={{ filemtime(public_path('assets/js/progressive.js')) }}"></script>

    <script>
        window.addEventListener('load', function () {
            try {
                if (typeof window.sckjApplyStoredLanguage === 'function') {
                    window.sckjApplyStoredLanguage();
                }
                if (window.jQuery && jQuery.fn.niceSelect) {
                    jQuery('select').niceSelect('update');
                }
            } catch (e) {
                console.error('Erro ao aplicar o idioma:', e);
            }

            // Rede de segurança: se o preloader continuar visível, esconde-o.
            setTimeout(function () {
                var p = document.querySelector('.preloader');
                if (p) { p.style.display = 'none'; }
            }, 3000);
        });
    </script>

    @include('portals.hero-gallery-scripts')

    @stack('scripts')
</body>
</html>