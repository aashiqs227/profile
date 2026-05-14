/* =====================================================================
   Motion + Scroll Choreography
   ===================================================================== */

(function () {
  const splash = document.getElementById('splash');
  const nav = document.getElementById('nav');
  const app = document.getElementById('app');
  const enterBtn = document.getElementById('enterBtn');

  // Lock scroll until user dismisses splash
  document.body.classList.add('splash-locked');

  function dismissSplash() {
    if (!splash || splash.classList.contains('exiting')) return;
    splash.classList.add('exiting');
    document.body.classList.remove('splash-locked');
    if (app) app.classList.add('ready');
    setTimeout(() => {
      splash.style.display = 'none';
      // Show floating nav once content is in view
      window.scrollTo({ top: 0, behavior: 'instant' });
      revealNav();
    }, 600);
  }

  function revealNav() {
    if (nav) {
      requestAnimationFrame(() => nav.classList.add('visible'));
    }
  }

  // Click/scroll/keypress dismisses splash
  if (enterBtn) enterBtn.addEventListener('click', dismissSplash);
  if (splash) splash.addEventListener('click', dismissSplash);

  window.addEventListener('wheel', (e) => {
    if (splash && !splash.classList.contains('exiting')) {
      if (e.deltaY > 5) dismissSplash();
    }
  }, { passive: true });

  window.addEventListener('keydown', (e) => {
    if (splash && !splash.classList.contains('exiting')) {
      if (e.key === 'Enter' || e.key === ' ' || e.key === 'ArrowDown' || e.key === 'PageDown') {
        e.preventDefault();
        dismissSplash();
      }
    }
  });

  // Touch swipe
  let touchStartY = null;
  window.addEventListener('touchstart', (e) => {
    if (splash && !splash.classList.contains('exiting')) {
      touchStartY = e.touches[0].clientY;
    }
  }, { passive: true });
  window.addEventListener('touchmove', (e) => {
    if (touchStartY !== null && splash && !splash.classList.contains('exiting')) {
      const dy = touchStartY - e.touches[0].clientY;
      if (dy > 30) dismissSplash();
    }
  }, { passive: true });

  /* ---------------------------------------------------------------
     Reveal-on-scroll
     --------------------------------------------------------------- */
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: '0px 0px -80px 0px' });

  document.querySelectorAll('.reveal').forEach(el => io.observe(el));

  /* ---------------------------------------------------------------
     Watermark parallax — translate based on viewport position
     --------------------------------------------------------------- */
  const watermarks = Array.from(document.querySelectorAll('.watermark'));

  function updateWatermarks() {
    const vh = window.innerHeight;
    watermarks.forEach(el => {
      const rect = el.parentElement.getBoundingClientRect();
      // progress: 0 when section bottom is at viewport top, 1 when section top is at viewport bottom
      const progress = 1 - (rect.top + rect.height) / (vh + rect.height);
      const dir = el.dataset.dir === 'right' ? 1 : -1;
      const range = parseFloat(el.dataset.range || 200);
      const offset = (progress - 0.5) * range * dir;
      el.style.transform = `translateX(${offset}px)`;
    });
  }

  /* ---------------------------------------------------------------
     Number counter for stats
     --------------------------------------------------------------- */
  const counters = Array.from(document.querySelectorAll('[data-count]'));
  const counterIO = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        animateCounter(entry.target);
        counterIO.unobserve(entry.target);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(el => counterIO.observe(el));

  function animateCounter(el) {
    const target = parseFloat(el.dataset.count);
    const duration = 1400;
    const start = performance.now();
    const suffix = el.dataset.suffix || '';
    function tick(now) {
      const t = Math.min((now - start) / duration, 1);
      const eased = 1 - Math.pow(1 - t, 3);
      const val = Math.round(target * eased);
      el.textContent = val + suffix;
      if (t < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  /* ---------------------------------------------------------------
     Floating nav visibility on scroll
     --------------------------------------------------------------- */
  let lastScroll = 0;
  function onScroll() {
    updateWatermarks();
    if (splash && splash.style.display === 'none') {
      const y = window.scrollY;
      if (y > 60 && nav && !nav.classList.contains('visible')) {
        nav.classList.add('visible');
      }
      // Hide nav at the very top before content scrolls
      if (y < 30 && nav && nav.classList.contains('visible')) {
        // keep visible — uncomment to hide
      }
      lastScroll = y;
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  window.addEventListener('resize', updateWatermarks);

  /* ---------------------------------------------------------------
     Split tagline into words for staggered rise
     --------------------------------------------------------------- */
  document.querySelectorAll('[data-stagger]').forEach((line, lineIdx) => {
    const html = line.innerHTML;
    const tokens = html.split(/(<[^>]+>|\s+)/);
    let wordCount = 0;
    const out = tokens.map(t => {
      if (!t) return '';
      if (/^\s+$/.test(t)) return t;
      if (/^<.*>$/.test(t)) return t;
      const delay = (lineIdx * 0.35) + (wordCount * 0.07);
      wordCount++;
      return `<span class="word" style="animation-delay:${delay}s">${t}</span>`;
    });
    line.innerHTML = out.join('');
  });

  // initial paint
  updateWatermarks();
})();
