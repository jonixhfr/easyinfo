// Obtendo todos os botões do acordeão
const accordionBtns = document.querySelectorAll('.accordion-btn');


document.querySelectorAll('.accordion-btn').forEach(button => {
  button.addEventListener('click', () => {
    const accordionSection = button.parentElement;
    accordionSection.classList.toggle('active');
  });
});

//voltar pagina anterior
function goBack() {
  window.history.back();
}


// Obtendo todos os botões de cópia
const copyBtns = document.querySelectorAll('.copy-btn');

// Iterando sobre cada botão de cópia para adicionar funcionalidade de cópia
copyBtns.forEach(copyBtn => {
  copyBtn.addEventListener('click', function() {
    // Obtendo o texto associado a este botão para cópia
    const textToCopy = this.previousElementSibling.textContent;

    // Criando um elemento temporário para a cópia
    const tempInput = document.createElement('textarea');
    tempInput.value = textToCopy;

    // Adicionando o elemento temporário à página para copiar o texto
    document.body.appendChild(tempInput);
    tempInput.select();
    document.execCommand('copy');
    document.body.removeChild(tempInput);

    // Alerta simples para informar que o texto foi copiado
    alert('Texto copiado para a área de transferência!');
  });
});
