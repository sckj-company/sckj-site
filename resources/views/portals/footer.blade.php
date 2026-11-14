
<!--===== FOOTER AREA STARTS =======-->
<div class="vl-footer1-section-area sp8">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="footer-logo1">
          <img src="{{asset('assets/img/logo/logo2.png')}}" alt="SCKJ Logo">
          <div class="space16"></div>
          <p>{!! nl2br(e(conteudo('geral.rodape.descricao'))) !!}</p>
       
          <div class="space24"></div>
          <ul>
            <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa-brands fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-2 col-md-6">
        <div class="space30 d-md-none d-block"></div>
        <div class="vl-footer-widget">
          
          <h3 data-i18n="footer_nav_title">Navegação</h3>
          <ul>
            <li><a href="{{route('home')}}" data-i18n="nav_home">Início</a></li>
            <li><a href="{{route('about')}}" data-i18n="nav_about">Sobre Nós</a></li>
            <li><a href="{{route('services')}}" data-i18n="nav_services">Serviços</a></li>
            <li><a href="{{route('commerce')}}" data-i18n="nav_commerce">Comércio Geral</a></li>
            <li><a href="{{route('faq')}}" data-i18n="nav_faq">FAQ</a></li>
            <li><a href="{{route('contacts')}}" data-i18n="nav_contact">Contactos</a></li>
          </ul>
        </div>
      </div> 

      <div class="col-lg-3 col-md-6">
        <div class="vl-footer-widget">
          <div class="space30 d-lg-none d-block"></div>
        <h3 data-i18n="footer_srv_title">Serviços & Soluções</h3>
        <ul>
          @foreach ($servicosPublicados as $servico)
            <li><a href="{{ route('services') }}">{{ $servico->titulo() }}</a></li>
          @endforeach
        </ul>
          
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="vl-footer-widget">
          <div class="space30 d-lg-none d-block"></div>
          <h3 data-i18n="footer_contact_title">Contactos</h3>
          <ul>
           <li>
              <a href="{{ route('contacts') }}">
                  <img src="{{ asset('assets/img/icons/phn1.svg') }}" 
                  alt="">{{ conteudo('geral.rodape.telefone', '+244 923 000 000') }}
              </a>
          </li>

          <li>
              <a href="{{ route('contacts') }}">
                  <img src="{{ asset('assets/img/icons/email1.svg') }}" 
                  alt="">{{ conteudo('geral.rodape.email', 'geral@sckj.co.ao') }}
              </a>
         </li>

         <li>
          <a href="{{ route('contacts') }}">
            <img src="{{ asset('assets/img/icons/location1.svg') }}"
            alt="">{{ conteudo('Localização.localizacao', 'Luanda, Angola') }}
          </a>
        </li>
          
           <li><a href="{{route('home')}}"><img src="{{asset('assets/img/icons/global1.svg')}}" alt="">sckj.co.ao</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="space60"></div>
    <div class="row">
      <div class="col-lg-12">
        <div class="vl-copyright-area">
          <p data-i18n="footer_copy">© 2026 SCKJ - Prestação de Serviços & Comércio Geral. Todos os direitos reservados.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--===== FOOTER AREA ENDS =======-->