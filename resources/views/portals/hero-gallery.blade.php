{{-- Galeria de fotografias de serviços partilhada por todas as páginas --}}
@php
    $heroGallerySlides = [
        ['path' => 'assets/img/services/Criação_de_Empresa.jpg', 'key' => 'gallery_srv1'],
        ['path' => 'assets/img/services/RH.jpg', 'key' => 'gallery_srv4'],
        ['path' => 'assets/img/services/gestao_de_documentos.jpg', 'key' => 'gallery_srv2'],
        ['path' => 'assets/img/services/work-img2.png', 'key' => 'gallery_srv10'],
        ['path' => 'assets/img/services/agentes_viagens.jpg', 'key' => 'gallery_srv8'],
        ['path' => 'assets/img/services/consultoria_ambiental.png', 'key' => 'gallery_srv3'],
        ['path' => 'assets/img/services/consultoria_contabilidade.jpg', 'key' => 'gallery_srv6'],
        ['path' => 'assets/img/services/acessoria_juridica.png', 'key' => 'gallery_srv5'],
        ['path' => 'assets/img/services/dhl.jpg', 'key' => 'gallery_srv7'],
        ['path' => 'assets/img/services/venda_de_extintor.png', 'key' => 'gallery_srv9'],
        ['path' => 'assets/img/services/Suporte_de_Sistema.png', 'key' => 'gallery_srv11'],
    ];
@endphp

<div class="hero-gallery" aria-hidden="true">
  @foreach ($heroGallerySlides as $slideIndex => $heroGallerySlide)
    <div class="hero-gallery__slide{{ $slideIndex === 0 ? ' is-active' : '' }}"
         data-gallery-key="{{ $heroGallerySlide['key'] }}"
         style="background-image: url('{{ asset($heroGallerySlide['path']) }}')"></div>
  @endforeach
  <div class="hero-gallery__shade"></div>
  <div class="hero-gallery__brand">
    <img src="{{ asset('assets/img/logo/logo1.png') }}" alt="">
  </div>
</div>

<div class="hero-gallery__controls" aria-label="Controlos da galeria de serviços">
  <button type="button" class="hero-gallery__nav hero-gallery__nav--prev" aria-label="Serviço anterior">&lsaquo;</button>
  <div class="hero-gallery__dots"></div>
  <button type="button" class="hero-gallery__nav hero-gallery__nav--next" aria-label="Serviço seguinte">&rsaquo;</button>
  <div class="hero-gallery__progress" aria-hidden="true"><span></span></div>
</div>
