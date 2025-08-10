import './bootstrap';
// import './swiper-init';
// document.addEventListener('DOMContentLoaded', () => {
//   const trigger = document.querySelector('[data-toggle="mobile-menu"]');
//   const menu = document.getElementById('mobile-menu');
//   if (trigger && menu) {
//     trigger.addEventListener('click', () => {
//       menu.classList.toggle('hidden');
//     });
//   }
// });

// Inisialisasi UI (menu + dropdown + slider)
document.addEventListener('DOMContentLoaded', () => {
  // Toggle Mobile Main Menu
  const trigger = document.querySelector('[data-toggle="mobile-menu"]');
  const menu = document.getElementById('mobile-menu');
  if (trigger && menu) {
    trigger.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  }

  // Desktop dropdowns
  const dropdowns = document.querySelectorAll('[data-dropdown]');
  dropdowns.forEach((wrap) => {
    const btn = wrap.querySelector('[data-dropdown-button]');
    const panel = wrap.querySelector('[data-dropdown-menu]');
    const caret = wrap.querySelector('[data-caret]');
    if (!btn || !panel) return;

    const open = () => {
      panel.classList.remove('hidden');
      btn.setAttribute('aria-expanded', 'true');
      caret?.classList.add('rotate-180');
    };
    const close = () => {
      panel.classList.add('hidden');
      btn.setAttribute('aria-expanded', 'false');
      caret?.classList.remove('rotate-180');
    };
    const toggle = () => (btn.getAttribute('aria-expanded') === 'true' ? close() : open());

    wrap.addEventListener('mouseenter', open);
    wrap.addEventListener('mouseleave', close);
    btn.addEventListener('focus', open);
    btn.addEventListener('blur', () => setTimeout(() => {
      if (!wrap.contains(document.activeElement)) close();
    }, 0));
    panel.addEventListener('blur', () => setTimeout(() => {
      if (!wrap.contains(document.activeElement)) close();
    }, 0), true);
    btn.addEventListener('click', (e) => { e.preventDefault(); toggle(); });
    wrap.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') { close(); btn.focus(); }
    });
  });

  // Click outside dropdowns
  document.addEventListener('click', (e) => {
    document.querySelectorAll('[data-dropdown]').forEach((wrap) => {
      if (!wrap.contains(e.target)) {
        const btn = wrap.querySelector('[data-dropdown-button]');
        const panel = wrap.querySelector('[data-dropdown-menu]');
        const caret = wrap.querySelector('[data-caret]');
        if (panel && !panel.classList.contains('hidden')) {
          panel.classList.add('hidden');
          btn?.setAttribute('aria-expanded', 'false');
          caret?.classList.remove('rotate-180');
        }
      }
    });
  });

  // Mobile submenus
  const mobileToggles = document.querySelectorAll('[data-submenu-toggle]');
  mobileToggles.forEach((btn) => {
    btn.addEventListener('click', () => {
      const container = btn.parentElement;
      if (!container) return;
      const submenu = container.querySelector('[data-submenu]');
      const caret = btn.querySelector('[data-caret]');
      if (!submenu) return;

      const isHidden = submenu.classList.contains('hidden');
      // Optionally close siblings
      const group = container.parentElement;
      group?.querySelectorAll('[data-submenu]').forEach((sib) => {
        if (sib !== submenu) sib.classList.add('hidden');
      });
      group?.querySelectorAll('[data-submenu-toggle]').forEach((b) => {
        if (b !== btn) {
          b.setAttribute('aria-expanded', 'false');
          b.querySelector('[data-caret]')?.classList.remove('rotate-180');
        }
      });

      if (isHidden) {
        submenu.classList.remove('hidden');
        btn.setAttribute('aria-expanded', 'true');
        caret?.classList.add('rotate-180');
      } else {
        submenu.classList.add('hidden');
        btn.setAttribute('aria-expanded', 'false');
        caret?.classList.remove('rotate-180');
      }
    });
  });

  // Photo Slider (scroll-snap + tombol)
  const sliders = document.querySelectorAll('[data-slider]');
  sliders.forEach((root) => {
    const viewport = root.querySelector('[data-slider-viewport]');
    const prevBtn = root.querySelector('[data-slider-prev]');
    const nextBtn = root.querySelector('[data-slider-next]');
    if (!viewport || !prevBtn || !nextBtn) return;

    const updateButtons = () => {
      const maxScroll = viewport.scrollWidth - viewport.clientWidth - 1; // fudge
      prevBtn.disabled = viewport.scrollLeft <= 0;
      nextBtn.disabled = viewport.scrollLeft >= maxScroll;
    };

    const step = () => viewport.clientWidth; // geser per lebar viewport
    prevBtn.addEventListener('click', () => {
      viewport.scrollBy({ left: -step(), behavior: 'smooth' });
    });
    nextBtn.addEventListener('click', () => {
      viewport.scrollBy({ left: step(), behavior: 'smooth' });
    });

    // Keyboard: panah kiri/kanan saat fokus di viewport
    viewport.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowRight') nextBtn.click();
      if (e.key === 'ArrowLeft') prevBtn.click();
    });

    viewport.addEventListener('scroll', updateButtons, { passive: true });
    window.addEventListener('resize', updateButtons);
    updateButtons();
  });
});
// Mobile main menu toggle
// document.addEventListener('DOMContentLoaded', () => {
//   const trigger = document.querySelector('[data-toggle="mobile-menu"]');
//   const menu = document.getElementById('mobile-menu');
//   if (trigger && menu) {
//     trigger.addEventListener('click', () => {
//       menu.classList.toggle('hidden');
//     });
//   }

//   // Desktop dropdowns (hover, focus, click)
//   const dropdowns = document.querySelectorAll('[data-dropdown]');
//   dropdowns.forEach((wrap) => {
//     const btn = wrap.querySelector('[data-dropdown-button]');
//     const panel = wrap.querySelector('[data-dropdown-menu]');
//     const caret = wrap.querySelector('[data-caret]');

//     if (!btn || !panel) return;

//     function open() {
//       panel.classList.remove('hidden');
//       btn.setAttribute('aria-expanded', 'true');
//       if (caret) caret.classList.add('rotate-180');
//     }
//     function close() {
//       panel.classList.add('hidden');
//       btn.setAttribute('aria-expanded', 'false');
//       if (caret) caret.classList.remove('rotate-180');
//     }
//     function toggle() {
//       const isOpen = btn.getAttribute('aria-expanded') === 'true';
//       if (isOpen) close(); else open();
//     }

//     // Mouse enter/leave
//     wrap.addEventListener('mouseenter', open);
//     wrap.addEventListener('mouseleave', close);

//     // Focus management (keyboard)
//     btn.addEventListener('focus', open);
//     btn.addEventListener('blur', (e) => {
//       // Delay to allow focus to move into panel
//       setTimeout(() => {
//         if (!wrap.contains(document.activeElement)) close();
//       }, 0);
//     });
//     panel.addEventListener('blur', () => {
//       setTimeout(() => {
//         if (!wrap.contains(document.activeElement)) close();
//       }, 0);
//     }, true);

//     // Click to toggle (good for touch devices on desktop width)
//     btn.addEventListener('click', (e) => {
//       e.preventDefault();
//       toggle();
//     });

//     // Escape to close
//     wrap.addEventListener('keydown', (e) => {
//       if (e.key === 'Escape') {
//         close();
//         btn.focus();
//       }
//     });
//   });

//   // Click outside to close all dropdowns
//   document.addEventListener('click', (e) => {
//     const all = document.querySelectorAll('[data-dropdown]');
//     all.forEach((wrap) => {
//       if (!wrap.contains(e.target)) {
//         const btn = wrap.querySelector('[data-dropdown-button]');
//         const panel = wrap.querySelector('[data-dropdown-menu]');
//         const caret = wrap.querySelector('[data-caret]');
//         if (panel && !panel.classList.contains('hidden')) {
//           panel.classList.add('hidden');
//           if (btn) btn.setAttribute('aria-expanded', 'false');
//           if (caret) caret.classList.remove('rotate-180');
//         }
//       }
//     });
//   });

//   // Mobile submenus
//   const mobileToggles = document.querySelectorAll('[data-submenu-toggle]');
//   mobileToggles.forEach((btn) => {
//     btn.addEventListener('click', () => {
//       const container = btn.parentElement;
//       if (!container) return;
//       const submenu = container.querySelector('[data-submenu]');
//       const caret = btn.querySelector('[data-caret]');
//       if (!submenu) return;

//       const isHidden = submenu.classList.contains('hidden');
//       // Optional: close siblings for accordion behavior
//       const siblings = container.parentElement?.querySelectorAll('[data-submenu]');
//       if (siblings) {
//         siblings.forEach((sib) => {
//           if (sib !== submenu) sib.classList.add('hidden');
//         });
//         const siblingBtns = container.parentElement?.querySelectorAll('[data-submenu-toggle]');
//         siblingBtns?.forEach((b) => {
//           if (b !== btn) {
//             b.setAttribute('aria-expanded', 'false');
//             const c = b.querySelector('[data-caret]');
//             if (c) c.classList.remove('rotate-180');
//           }
//         });
//       }

//       if (isHidden) {
//         submenu.classList.remove('hidden');
//         btn.setAttribute('aria-expanded', 'true');
//         if (caret) caret.classList.add('rotate-180');
//       } else {
//         submenu.classList.add('hidden');
//         btn.setAttribute('aria-expanded', 'false');
//         if (caret) caret.classList.remove('rotate-180');
//       }
//     });
//   });
// });

import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiper = new Swiper('.mySwiper', {
  loop: true,
  speed: 800, // Durasi transisi yang lebih smooth
  effect: 'slide', // atau 'fade', 'cube', 'coverflow'

  autoplay: {
    delay: 4000, // Sedikit lebih lambat untuk pengalaman yang lebih rileks
    disableOnInteraction: false,
    pauseOnMouseEnter: true, // Pause saat hover
  },

  // Smooth scrolling
  freeMode: false,
  watchSlidesProgress: true,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
    bulletClass: 'custom-bullet',
    bulletActiveClass: 'custom-bullet-active',
    renderBullet: function (index, className) {
      return `<span class="${className}" aria-label="Slide ${index + 1}"></span>`;
    },
    dynamicBullets: false, // Matikan dynamic bullets untuk konsistensi
  },

  navigation: {
    nextEl: '.custom-next',
    prevEl: '.custom-prev',
  },

  // Keyboard navigation
  keyboard: {
    enabled: true,
    onlyInViewport: true,
  },

  // Touch gestures yang lebih halus
  touchRatio: 1,
  touchAngle: 45,
  grabCursor: true,

  // Breakpoints untuk responsif
  breakpoints: {
    320: {
      slidesPerView: 1,
      spaceBetween: 10,
    },
    768: {
      slidesPerView: 1,
      spaceBetween: 20,
    },
    1024: {
      slidesPerView: 1,
      spaceBetween: 30,
    },
  },

  // Event listeners untuk interaksi yang lebih smooth
  on: {
    init: function () {
      // Smooth fade-in saat pertama kali load
      this.el.style.opacity = '0';
      this.el.style.transition = 'opacity 0.5s ease';
      setTimeout(() => {
        this.el.style.opacity = '1';
      }, 100);
    },

    slideChange: function () {
      // Hapus focus dari navigation buttons setelah klik
      document.activeElement?.blur();
    },

    transitionStart: function () {
      // Tambah class untuk animasi custom jika diperlukan
      this.el.classList.add('swiper-transitioning');
    },

    transitionEnd: function () {
      // Hapus class setelah transisi selesai
      this.el.classList.remove('swiper-transitioning');
    },
  },
});

// Optional: Intersection Observer untuk autoplay yang lebih smart
const swiperObserver = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      swiper.autoplay.start();
    } else {
      swiper.autoplay.stop();
    }
  });
}, {
  threshold: 0.5,
});

swiperObserver.observe(swiper.el);

// Eksport swiper instance jika diperlukan
export default swiper;
