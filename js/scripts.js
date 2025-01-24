// Seleciona o contêiner de pré-visualização
let previewContainer = document.querySelector('.products-preview');
// Seleciona todas as caixas de pré-visualização
let previewBox = previewContainer.querySelectorAll('.preview');

// Adiciona um evento de clique a cada produto
document.querySelectorAll('.products-container .product').forEach(product => {
  product.onclick = () => {
    // Mostra o contêiner de pré-visualização
    previewContainer.style.display = 'flex';
    // Obtém o valor do atributo "data-name" do produto clicado
    let name = product.getAttribute('data-name');
    // Itera sobre cada caixa de pré-visualização
    previewBox.forEach(preview => {
      // Compara o atributo "data-target" da pré-visualização com o "data-name" do produto
      let target = preview.getAttribute('data-target');
      if (name == target) {
        // Adiciona a classe "active" à caixa correspondente
        preview.classList.add('active');
      }
    });
  };
});

// Adiciona funcionalidade para fechar as pré-visualizações
previewBox.forEach(preview => {
  preview.querySelector('.fa-times').onclick = () => {
    // Remove a classe "active" da caixa atual
    preview.classList.remove('active');
    // Oculta o contêiner de pré-visualização
    previewContainer.style.display = 'none';
  };
});
