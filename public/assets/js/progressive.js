/**
 * SCKJ - Carregamento progressivo (Intersection Observer, sem dependências).
 * Imagens com data-src são carregadas perto do ecrã; secções marcadas com
 * data-reveal aparecem uma vez com fade + slide-up.
 */
(function () {
  'use strict';

  const reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function loadMedia(element) {
    const src = element.getAttribute('data-src');
    const srcset = element.getAttribute('data-srcset');

    if (src && element.getAttribute('src') !== src) {
      element.setAttribute('src', src);
    }
    if (srcset && element.getAttribute('srcset') !== srcset) {
      element.setAttribute('srcset', srcset);
    }
  }

  function showAll() {
    document.querySelectorAll('[data-src], [data-srcset]').forEach(function (element) {
      loadMedia(element);
    });
    document.querySelectorAll('[data-reveal]').forEach(function (element) {
      element.classList.add('is-visible');
    });
  }

  if (!('IntersectionObserver' in window)) {
    showAll();
    return;
  }

  // rootMargin de 200px: a imagem começa a carregar antes de entrar no ecrã.
  const mediaObserver = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) {
        return;
      }
      loadMedia(entry.target);
      observer.unobserve(entry.target);
    });
  }, { rootMargin: '200px 0px' });

  document.querySelectorAll('img[data-src], iframe[data-src], video[data-src], source[data-src], img[data-srcset]')
    .forEach(function (element) {
      mediaObserver.observe(element);
    });

  const revealObserver = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) {
        return;
      }
      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.04 });

  // Marca automaticamente as secções abaixo do hero; o AOS continua a tratar dos cards.
  const revealSelectors = [
    '.about1-section-area',
    '.service1-section-area',
    '.work1-section-area',
    '.case1-section-area',
    '.cta1-section-area',
    '.contact-inner-area',
    'main > .container.py-5',
  ];

  function observeReveals() {
    const elements = document.querySelectorAll(
      revealSelectors.map(function (selector) {
        return selector + '[data-reveal], ' + selector + ':not([data-reveal])';
      }).join(', ')
    );

    elements.forEach(function (element) {
      if (element.hasAttribute('data-aos')) {
        return; // Evita animação dupla com o AOS.
      }
      element.setAttribute('data-reveal', '');
      if (reduceMotion || element.classList.contains('is-visible')) {
        element.classList.add('is-visible');
        return;
      }
      revealObserver.observe(element);
    });
  }

  document.documentElement.classList.add('js-reveal');
  observeReveals();

  // Permite voltar a observar elementos inseridos depois (ex.: conteúdo AJAX).
  window.sckjObserveReveals = observeReveals;
})();
