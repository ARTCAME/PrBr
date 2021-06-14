/* Animate when an element is visible on the viewport via IntersectionObserver */
const growables = document.querySelectorAll('.growable');

let growObserver = new IntersectionObserver(
  (entries, observer) => {
    entries.forEach(entry => {
      const el = entry.target;
      if (entry.isIntersecting) {
        el.style.opacity = '1';
        el.style.transform = 'scale(1)';
      } else {
        el.style.opacity = '0';
        el.style.transform = 'scale(0.95)';
      }
    });
  }, { rootMargin: '50px 0px 50px 0px', });
  
growables.forEach(el => { growObserver.observe(el) });

/**
 * Manage the specs accordion's behavior
 * @param {HTMLElement} el 
 */
function collapsing(el) {
  el.classList.contains('expanded') ? el.classList.remove('expanded') : el.classList.add('expanded');
}

/**
 * Focus a hovered img by setting the rests' opacity, will be called on mouse events 
 * @param {HTMLElement} el 
 */
function focusImg(el) {
  const imgs = [...document.querySelectorAll('.img-grid__item__img')];
  imgs.forEach(img => {
    if (img !== el) {
      img.style.opacity = 0.5;
      el.nextElementSibling.style.fontWeight = '600';
    }
  });
}

/**
 * Unfocus focused img by setting the rests' opacity, will be called on mouse events 
 * @param {HTMLElement} el 
 */
function unfocusImg(el) {
  const imgs = [...document.querySelectorAll('.img-grid__item__img')];
  imgs.forEach(img => {
    img.nextElementSibling.style.fontWeight = img.style.opacity = null;
  });
}