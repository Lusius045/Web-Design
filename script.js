const triggers = document.querySelectorAll('[data-target]');
const cerrarBotones = document.querySelectorAll('.modal_cerrar');

triggers.forEach(trigger => {
  trigger.addEventListener('click', (e) => {
    e.preventDefault();

    const targetId = trigger.dataset.target;
    const modal = document.getElementById(targetId);
    const container = modal.querySelector('.modal_container');
    const img = modal.querySelector('.modal_img');

    // Mostrar modal
    modal.classList.add('modal--show');
    modal.classList.remove('modal--hide');

    // Reiniciar animaciones
    container.classList.remove('modal_container--aparecer');
    img.classList.remove('modal_img--animar');
    void container.offsetWidth;
    void img.offsetWidth;
    container.classList.add('modal_container--aparecer');
    img.classList.add('modal_img--animar');
  });
});

cerrarBotones.forEach(btn => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();

    const modal = btn.closest('.modal');
    const container = modal.querySelector('.modal_container');
    const img = modal.querySelector('.modal_img');

    modal.classList.add('modal--hide');
    modal.classList.remove('modal--show');

    setTimeout(() => {
      modal.classList.remove('modal--hide');
      container.classList.remove('modal_container--aparecer');
      img.classList.remove('modal_img--animar');
    }, 400);
  });
});