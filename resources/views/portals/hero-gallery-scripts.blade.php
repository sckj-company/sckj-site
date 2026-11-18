<script>
  (function () {
    const gallery = document.querySelector('.hero-gallery');
    if (!gallery) {
      return;
    }

    const hero = gallery.closest('.hero1-section-area, .inner-page-hero-area');
    const slides = Array.from(gallery.querySelectorAll('.hero-gallery__slide'));
    if (!hero || slides.length < 2) {
      return;
    }

    const syncTargets = Array.from(hero.querySelectorAll('[data-gallery-sync]'));
    const brand = gallery.querySelector('.hero-gallery__brand');
    const progress = hero.querySelector('.hero-gallery__progress');
    const dotsWrap = hero.querySelector('.hero-gallery__dots');
    const prevButton = hero.querySelector('.hero-gallery__nav--prev');
    const nextButton = hero.querySelector('.hero-gallery__nav--next');
    const animate = !(window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches);
    const intervalMs = 5200;
    const shiftDuration = 380;
    const leaveDuration = 400;

    let currentIndex = 0;
    let timer = null;
    let shiftTimer = null;
    let leaveTimer = null;
    let pendingTargetIndex = null;

    if (dotsWrap) {
      slides.forEach(function (_slide, dotIndex) {
        const dot = document.createElement('button');
        dot.type = 'button';
        dot.className = 'hero-gallery__dot' + (dotIndex === 0 ? ' is-active' : '');
        dot.setAttribute('aria-label', 'Serviço ' + (dotIndex + 1));
        if (dotIndex === 0) {
          dot.setAttribute('aria-current', 'true');
        }
        dot.addEventListener('click', function () {
          showSlide(dotIndex);
          startTimer();
        });
        dotsWrap.appendChild(dot);
      });
    }

    const dots = dotsWrap ? Array.from(dotsWrap.children) : [];

    function translatedValue(key) {
      const lang = document.documentElement.lang || window.SITE_LANG || 'pt';
      const dictionary = (typeof sckjTranslations !== 'undefined' && sckjTranslations[lang])
        ? sckjTranslations[lang]
        : ((typeof sckjTranslations !== 'undefined' && sckjTranslations.pt) ? sckjTranslations.pt : {});

      return dictionary[key] || '';
    }

    function restartProgress() {
      if (!progress || !animate) {
        return;
      }
      progress.classList.remove('is-running', 'is-paused');
      void progress.offsetWidth;
      progress.classList.add('is-running');
    }

    function resetSlideStates() {
      slides.forEach(function (slide) {
        slide.classList.remove('is-shifting', 'is-leaving', 'is-peeking');
      });
    }

    function applySlide(index, skipAnimation) {
      resetSlideStates();
      pendingTargetIndex = null;
      shiftTimer = null;
      leaveTimer = null;

      slides[currentIndex].classList.remove('is-active');
      if (dots[currentIndex]) {
        dots[currentIndex].classList.remove('is-active');
        dots[currentIndex].removeAttribute('aria-current');
      }

      currentIndex = index;
      slides[currentIndex].classList.add('is-active');
      if (dots[currentIndex]) {
        dots[currentIndex].classList.add('is-active');
        dots[currentIndex].setAttribute('aria-current', 'true');
      }

      const translationKey = slides[currentIndex].getAttribute('data-gallery-key');
      if (translationKey) {
        syncTargets.forEach(function (target) {
          const isDescription = target.getAttribute('data-gallery-sync') === 'desc';
          const key = isDescription ? translationKey + '_desc' : translationKey;
          target.setAttribute('data-i18n', key);
          const translated = translatedValue(key);
          if (translated) {
            target.innerHTML = translated;
          }
          target.classList.remove('is-exiting', 'is-changing');
          if (animate && !skipAnimation) {
            void target.offsetWidth;
            target.classList.add('is-changing');
          }
        });
      }

      if (animate && brand && !skipAnimation) {
        brand.classList.remove('is-flashing');
        void brand.offsetWidth;
        brand.classList.add('is-flashing');
      }
    }

    // Conclui uma transição pendente antes de iniciar outra, sem classes órfãs.
    function clearPendingTransition() {
      if (shiftTimer) {
        window.clearTimeout(shiftTimer);
        shiftTimer = null;
      }
      if (leaveTimer) {
        window.clearTimeout(leaveTimer);
        leaveTimer = null;
      }
      if (pendingTargetIndex !== null) {
        applySlide(pendingTargetIndex, true);
        return;
      }
      resetSlideStates();
    }

    // Fase 1: a foto desloca-se e aproxima-se; Fase 2: continua e desaparece.
    function showSlide(nextIndex) {
      const targetIndex = (nextIndex + slides.length) % slides.length;
      if (pendingTargetIndex !== null) {
        clearPendingTransition();
      }
      if (targetIndex === currentIndex) {
        return;
      }

      if (!animate) {
        applySlide(targetIndex);
        return;
      }

      pendingTargetIndex = targetIndex;
      slides[targetIndex].classList.add('is-peeking');
      slides[currentIndex].classList.add('is-shifting');
      syncTargets.forEach(function (target) {
        target.classList.remove('is-changing');
        target.classList.add('is-exiting');
      });

      shiftTimer = window.setTimeout(function () {
        shiftTimer = null;
        if (pendingTargetIndex === null) {
          return;
        }
        slides[currentIndex].classList.remove('is-shifting');
        slides[currentIndex].classList.add('is-leaving');
      }, shiftDuration);

      leaveTimer = window.setTimeout(function () {
        leaveTimer = null;
        if (pendingTargetIndex === null) {
          return;
        }
        applySlide(pendingTargetIndex);
      }, shiftDuration + leaveDuration);
    }

    function startTimer() {
      window.clearInterval(timer);
      restartProgress();
      timer = window.setInterval(function () {
        if (document.hidden) {
          return;
        }
        restartProgress();
        showSlide(currentIndex + 1);
      }, intervalMs);
    }

    if (prevButton) {
      prevButton.addEventListener('click', function () {
        showSlide(currentIndex - 1);
        startTimer();
      });
    }

    if (nextButton) {
      nextButton.addEventListener('click', function () {
        showSlide(currentIndex + 1);
        startTimer();
      });
    }

    document.addEventListener('visibilitychange', function () {
      if (document.hidden) {
        if (progress) {
          progress.classList.add('is-paused');
        }
        return;
      }
      startTimer();
    });

    startTimer();
  })();
</script>
