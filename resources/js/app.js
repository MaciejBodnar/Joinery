import './accordion';
import '@fortawesome/fontawesome-free/css/all.min.css';
import './gallery';

document.addEventListener('DOMContentLoaded', () => {
  const menuButton = document.querySelector('[data-mobile-menu-button]');
  const menu = document.querySelector('[data-mobile-menu]');

  if (menuButton && menu) {
    menuButton.addEventListener('click', () => {
      const isOpen = menuButton.getAttribute('aria-expanded') === 'true';

      menuButton.setAttribute('aria-expanded', String(!isOpen));
      menu.classList.toggle('hidden', isOpen);
    });
  }

  const submenuButton = document.querySelector('[data-mobile-submenu-button]');
  const submenu = document.querySelector('[data-mobile-submenu]');

  if (submenuButton && submenu) {
    submenuButton.addEventListener('click', () => {
      const isOpen = submenuButton.getAttribute('aria-expanded') === 'true';

      submenuButton.setAttribute('aria-expanded', String(!isOpen));
      submenu.classList.toggle('hidden', isOpen);
    });
  }
});
