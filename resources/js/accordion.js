document.addEventListener('DOMContentLoaded', () => {
  const accordions = document.querySelectorAll('[data-faq-accordion]');

  accordions.forEach((accordion) => {
    const items = accordion.querySelectorAll('[data-faq-item]');

    items.forEach((item) => {
      const button = item.querySelector('[data-faq-button]');
      const panel = item.querySelector('[data-faq-panel]');
      const icon = item.querySelector('[data-faq-icon]');

      button.addEventListener('click', () => {
        const isOpen = button.getAttribute('aria-expanded') === 'true';

        items.forEach((currentItem) => {
          const currentButton = currentItem.querySelector('[data-faq-button]');
          const currentPanel = currentItem.querySelector('[data-faq-panel]');
          const currentIcon = currentItem.querySelector('[data-faq-icon]');

          currentButton.setAttribute('aria-expanded', 'false');
          currentPanel.classList.add('hidden');
          currentIcon.classList.remove('rotate-45');
        });

        if (!isOpen) {
          button.setAttribute('aria-expanded', 'true');
          panel.classList.remove('hidden');
          icon.classList.add('rotate-45');
        }
      });
    });
  });
});
