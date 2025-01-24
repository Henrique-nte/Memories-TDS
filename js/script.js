var swiper = new Swiper(".slide-content", {
  slidesPerView: 3,           // Exibe 3 slides por vez
  spaceBetween: 25,           // Espaço entre os slides
  loop: true,                 // Habilita rotação infinita dos slides
  centerSlide: 'true',        // Centraliza o slide ativo
  fade: 'true',               // Efeito de transição (pode não ser aplicável dependendo da configuração Swiper)
  grabCursor: 'true',         // Cursor de "mão" ao passar sobre os slides

  // Configuração de paginação
  pagination: {
    el: ".swiper-pagination", // Elemento para os indicadores (bolinhas)
    clickable: true,          // Permite clicar nas bolinhas para navegar
    dynamicBullets: true,     // Habilita tamanhos dinâmicos para os indicadores
  },

  // Configuração de botões de navegação
  navigation: {
    nextEl: ".swiper-button-next", // Botão de próximo slide
    prevEl: ".swiper-button-prev", // Botão de slide anterior
  },

  // Configuração responsiva
  breakpoints: {
    0: {
      slidesPerView: 1,       // 1 slide por vez para larguras menores que 520px
    },
    520: {
      slidesPerView: 2,       // 2 slides por vez para larguras entre 520px e 950px
    },
    950: {
      slidesPerView: 3,       // 3 slides por vez para larguras acima de 950px
    },
  },
});
