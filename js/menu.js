
window.addEventListener("scroll", function () {
  let header = document.querySelector('#header')
  header.classList.toggle('rolagem', window.scrollY > 50)

})

// Adiciona um evento de escuta ao evento de rolagem da janela
window.addEventListener("scroll", function () {
  // Seleciona o elemento com o id "header"
  let header = document.querySelector('#header');

  // Adiciona ou remove a classe "rolagem" dependendo da posição da rolagem
  // Se a rolagem vertical (scrollY) for maior que 50, adiciona a classe "rolagem"
  // Caso contrário, remove a classe
  header.classList.toggle('rolagem', window.scrollY > 50);
});
