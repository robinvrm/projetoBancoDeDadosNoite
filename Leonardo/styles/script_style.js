const html = document.querySelector('html');
const checkbox = document.querySelector('#alterar-modo-cor');

checkbox.addEventListener('change', function () {
  html.classList.toggle('dark-mode');
});