
// Adiciona um evento de clique ao logo para redirecionar para a página inicial

const logo = document.querySelector('.logo');
if (logo) {
    logo.addEventListener('click', () => {
        window.location.href = '/';
    });
}
