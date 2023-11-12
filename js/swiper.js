import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper.min.mjs'
import Pagination from 'https://cdn.jsdelivr.net/npm/swiper@11/modules/pagination.min.mjs';
import Coverflow from 'https://cdn.jsdelivr.net/npm/swiper@11/modules/effect-coverflow.min.mjs';
import Autoplay from 'https://cdn.jsdelivr.net/npm/swiper@11/modules/autoplay.min.mjs';

new Swiper(".swiper", {
    modules: [Pagination, Coverflow, Autoplay],
    effect: "coverflow",
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: "auto",
    speed: 700,
    coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true
    },
    pagination: {
        el: ".swiper-pagination"
    },
    autoplay: {
        delay: 5000,
        pauseOnMouseEnter: true
    }
});