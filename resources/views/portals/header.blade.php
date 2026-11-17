<!--===== PRELOADER STARTS =======-->
<div class="preloader">
  <div class="loading-container">
    <div class="loading"></div>
    <div id="loading-icon"><img src="{{asset('assets/img/logo/preloader.png')}}" alt="SCKJ Carregamento"></div>
  </div>
</div>
<!--===== PRELOADER ENDS =======-->

<!--===== PROGRESS STARTS =======-->
<div class="paginacontainer">
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
  </div>
</div>
<!--===== PROGRESS ENDS =======-->

<!--===== HEADER START =======-->
<header class="homepage1-body">
  <div id="vl-header-sticky" class="vl-header-area vl-transparent-header">
      <div class="container headerfix">
          <div class="row align-items-center row-bg3">
              <div class="col-lg-2 col-md-6 col-6">
                  <div class="vl-logo">
                      <a href="{{route('home')}}"><img src="{{asset('assets/img/logo/logo1.png')}}" alt="SCKJ Logo"></a>
                  </div>
              </div>
              <div class="col-lg-7 col-xl-7 d-none d-lg-block">
                  <div class="vl-main-menu text-center">
                      <nav class="vl-mobile-menu-active">
                          <ul>
                              <li class="active"><a href="{{route('home')}}" data-i18n="nav_home">Início</a></li>
                              <li><a href="{{route('about')}}" data-i18n="nav_about">Sobre Nós</a></li>
                              <li><a href="{{route('services')}}" data-i18n="nav_services">Serviços</a></li>
                              <li><a href="{{route('commerce')}}" data-i18n="nav_commerce">Comércio Geral</a></li>
                              <li><a href="{{route('faq')}}" data-i18n="nav_faq">FAQ</a></li>
                              <li><a href="{{route('contacts')}}" data-i18n="nav_contact">Contactos</a></li>
                              <li><a href="{{route('portfolio.index')}}" data-i18n="nav_portfolio">Portfólio</a></li>
                              <li><a href="{{route('login') }}" data-i18n="nav_login">Área SCKJ</a></li>
                          </ul>
                      </nav>
                  </div>
              </div>
              <div class="col-lg-3 col-xl-3 col-md-6 col-6">
                  <div class="vl-hero-btn d-none d-lg-flex align-items-center justify-content-end gap-2 text-end">
                      <div class="vl-lang-dropdown dropdown">
                          <button class="btn btn-sm dropdown-toggle vl-lang-btn" type="button" id="langDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                              <img id="current-lang-flag" src="{{ bandeira_url(app()->getLocale()) }}" alt="" width="20" height="14"> <span id="current-lang-code">PT</span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                              <li><a class="dropdown-item" href="{{ route('idioma', 'pt') }}"><img src="{{ bandeira_url('pt') }}" alt="" width="20" height="14" class="me-2"> Português (PT)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'en') }}"><img src="{{ bandeira_url('en') }}" alt="" width="20" height="14" class="me-2"> English (EN)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'zh') }}"><img src="{{ bandeira_url('zh') }}" alt="" width="20" height="14" class="me-2"> 中文 (ZH)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'pt_zh') }}"><img src="{{ bandeira_url('pt_zh') }}" alt="" width="20" height="14" class="me-2"> {{ config('idiomas.pt_zh') }}</a></li>
                          </ul>
                      </div>
                      <span class="vl-btn-wrap">
                        <a href="{{route('contacts')}}" class="vl-btn1"><span data-i18n="nav_btn">Fale Connosco</span> <i class="fa-solid fa-arrow-right"></i></a>
                      </span>
                  </div>
                  <div class="vl-header-action-item d-flex align-items-center justify-content-end gap-2 d-lg-none">
                      <div class="vl-lang-dropdown dropdown">
                          <button class="btn btn-sm dropdown-toggle vl-lang-btn" type="button" id="langDropdownMob" data-bs-toggle="dropdown" aria-expanded="false">
                              <img id="current-lang-flag-mob" src="{{ bandeira_url(app()->getLocale()) }}" alt="" width="20" height="14"> <span id="current-lang-code-mob">PT</span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdownMob">
                              <li><a class="dropdown-item" href="{{ route('idioma', 'pt') }}"><img src="{{ bandeira_url('pt') }}" alt="" width="20" height="14" class="me-2"> Português (PT)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'en') }}"><img src="{{ bandeira_url('en') }}" alt="" width="20" height="14" class="me-2"> English (EN)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'zh') }}"><img src="{{ bandeira_url('zh') }}" alt="" width="20" height="14" class="me-2"> 中文 (ZH)</a></li>
                              <li><a class="dropdown-item" href="{{ route('idioma', 'pt_zh') }}"><img src="{{ bandeira_url('pt_zh') }}" alt="" width="20" height="14" class="me-2"> {{ config('idiomas.pt_zh') }}</a></li>
                          </ul>
                      </div>
                      <button type="button" class="vl-offcanvas-toggle" aria-label="Abrir Menu">
                        <i class="fa-solid fa-bars-staggered"></i>
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</header>
<!--===== HEADER END =======-->
<!--===== MOBILE HEADER STARTS =======-->
<div class="homepage1-body">
  <div class="vl-offcanvas">
    <div class="vl-offcanvas-wrapper">
        <div class="vl-offcanvas-header d-flex justify-content-between align-items-center mb-40">
            <div class="vl-offcanvas-logo">
                <a href="{{ route('home') }}"><img src="{{asset('assets/img/logo/logo1.png')}}" alt="SCKJ Logo"></a>
            </div>
            <div class="vl-offcanvas-close">
               <button class="vl-offcanvas-close-toggle" aria-label="Fechar"><i class="fa-solid fa-xmark"></i></button>
            </div>
        </div>

        <div class="vl-offcanvas-lang mb-30 text-center">
            <div class="btn-group w-100" role="group">
                <a class="btn btn-outline-light btn-sm" id="mob-lang-pt" href="{{ route('idioma', 'pt') }}"><img src="{{ bandeira_url('pt') }}" alt="" width="20" height="14" class="me-1"> PT</a>
                <a class="btn btn-outline-light btn-sm" id="mob-lang-en" href="{{ route('idioma', 'en') }}"><img src="{{ bandeira_url('en') }}" alt="" width="20" height="14" class="me-1"> EN</a>
                <a class="btn btn-outline-light btn-sm" id="mob-lang-zh" href="{{ route('idioma', 'zh') }}"><img src="{{ bandeira_url('zh') }}" alt="" width="20" height="14" class="me-1"> 中文</a>
                <a class="btn btn-outline-light btn-sm" id="mob-lang-pt_zh" href="{{ route('idioma', 'pt_zh') }}"><img src="{{ bandeira_url('pt_zh') }}" alt="" width="20" height="14" class="me-1"> PT/ZH</a>
            </div>
        </div>

        <div class="vl-offcanvas-menu d-lg-none mb-40">
            <nav></nav>
        </div>

        <div class="space20"></div>
        <div class="vl-offcanvas-info">
            <h3 class="vl-offcanvas-sm-title" data-i18n="contact_info_title">Contactos da SCKJ</h3>
            <div class="space20"></div>
            <span><a href="tel:+244923000000"><i class="fa-solid fa-phone"></i> +244 923 000 000</a></span>
            <span><a href="mailto:geral@sckj.co.ao"><i class="fa-regular fa-envelope"></i> geral@sckj.co.ao</a></span>
            <span><a href="{{route('contacts')}}"><i class="fa-solid fa-location-dot"></i> Luanda, Angola</a></span>
        </div>
        <div class="space20"></div>
        <div class="vl-offcanvas-social">
            <h3 class="vl-offcanvas-sm-title">Siga-nos</h3>
            <div class="space20"></div>
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-whatsapp"></i></a>
         </div>
    </div>
</div>
<div class="vl-offcanvas-overlay"></div>
</div>
<!--===== MOBILE HEADER ENDS =======-->