{{-- Hero: vídeo da CDN apenas na Home; restantes páginas sem galeria --}}
@if (request()->routeIs('home'))
  <div class="hero-gallery" aria-hidden="true">
    <video class="hero-gallery__video"
           autoplay
           muted
           loop
           playsinline
           preload="metadata"
           poster="{{ asset('assets/img/services/Criação_de_Empresa.jpg') }}">
      <source src="https://ik.imagekit.io/5jv1qkibx/sckj-site/Novo.mp4" type="video/mp4">
    </video>
    <div class="hero-gallery__shade"></div>
    <div class="hero-gallery__brand">
      <img src="{{ asset('assets/img/logo/logo1.png') }}" alt="">
    </div>
  </div>
@endif
