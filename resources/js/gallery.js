document.addEventListener('DOMContentLoaded', () => {
  const triggers = [...document.querySelectorAll('[data-gallery-lightbox]')];

  if (!triggers.length) return;

  const images = triggers.map((trigger) => ({
    src: trigger.getAttribute('data-gallery-src'),
    alt: trigger.getAttribute('data-gallery-alt') || '',
  }));

  let activeIndex = 0;

  const lightbox = document.createElement('div');

  lightbox.className =
    'fixed inset-0 z-[999] hidden items-center justify-center bg-black/90 px-4 py-6';

  lightbox.innerHTML = `
    <button
      type="button"
      class="absolute right-5 top-5 z-10 flex h-11 w-11 items-center justify-center text-7xl text-white hover:cursor-pointer hover:scale-110 md:right-8"
      data-gallery-close
      aria-label="Close gallery image"
    >
      ×
    </button>

    <button
      type="button"
      class="absolute left-4 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center hover:cursor-pointer hover:scale-110 text-7xl text-white md:left-8"
      data-gallery-prev
      aria-label="Previous image"
    >
      ‹
    </button>

    <img
      src=""
      alt=""
      class="max-h-[85vh] max-w-full object-contain"
      data-gallery-image
    >

    <button
      type="button"
      class="absolute right-4 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center hover:cursor-pointer hover:scale-110 text-7xl text-white md:right-8"
      data-gallery-next
      aria-label="Next image"
    >
      ›
    </button>
  `;

  document.body.appendChild(lightbox);

  const image = lightbox.querySelector('[data-gallery-image]');
  const closeButton = lightbox.querySelector('[data-gallery-close]');
  const prevButton = lightbox.querySelector('[data-gallery-prev]');
  const nextButton = lightbox.querySelector('[data-gallery-next]');

  const updateImage = () => {
    image.src = images[activeIndex].src;
    image.alt = images[activeIndex].alt;
  };

  const openLightbox = (index) => {
    activeIndex = index;
    updateImage();

    lightbox.classList.remove('hidden');
    lightbox.classList.add('flex');
    document.body.classList.add('overflow-hidden');
  };

  const closeLightbox = () => {
    lightbox.classList.add('hidden');
    lightbox.classList.remove('flex');
    document.body.classList.remove('overflow-hidden');
  };

  const showPrevious = () => {
    activeIndex = activeIndex === 0 ? images.length - 1 : activeIndex - 1;
    updateImage();
  };

  const showNext = () => {
    activeIndex = activeIndex === images.length - 1 ? 0 : activeIndex + 1;
    updateImage();
  };

  triggers.forEach((trigger, index) => {
    trigger.addEventListener('click', () => openLightbox(index));
  });

  closeButton.addEventListener('click', closeLightbox);
  prevButton.addEventListener('click', showPrevious);
  nextButton.addEventListener('click', showNext);

  lightbox.addEventListener('click', (event) => {
    if (event.target === lightbox) {
      closeLightbox();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (lightbox.classList.contains('hidden')) return;

    if (event.key === 'Escape') closeLightbox();
    if (event.key === 'ArrowLeft') showPrevious();
    if (event.key === 'ArrowRight') showNext();
  });
});
