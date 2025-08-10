import Swiper, { A11y, Keyboard, Navigation } from 'swiper'
import 'swiper/css'
import 'swiper/css/navigation'

// Inisialisasi semua slider yang memiliki [data-swiper-root]
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('[data-swiper-root]').forEach((root) => {
    // Temukan tombol navigasi dalam section yang sama
    const section = root.closest('section') || root.parentElement
    const prevEl = section?.querySelector('[data-swiper-prev]') || null
    const nextEl = section?.querySelector('[data-swiper-next]') || null

    // eslint-disable-next-line no-new
    new Swiper(root, {
      modules: [Navigation, Keyboard, A11y],
      speed: 500,
      spaceBetween: 16,
      slidesPerView: 1, // default mobile
      watchOverflow: true,
      a11y: { enabled: true },
      keyboard: { enabled: true },
      navigation: prevEl && nextEl ? { prevEl, nextEl } : undefined,
      breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 16 },    // sm
        768: { slidesPerView: 3, spaceBetween: 16 },    // md
        1280: { slidesPerView: 4, spaceBetween: 16 },   // xl
      },
    })
  })
})
