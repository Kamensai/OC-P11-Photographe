const burgerButton = document.querySelector(".site-header__burger");
const mobileMenu = document.querySelector(".site-header__nav");

if (burgerButton && mobileMenu) {
  burgerButton.addEventListener("click", () => {
    const isOpen = burgerButton.classList.toggle("is-open");

    mobileMenu.classList.toggle("is-open", isOpen);
    burgerButton.setAttribute("aria-expanded", isOpen ? "true" : "false");
    burgerButton.setAttribute(
      "aria-label",
      isOpen ? "Fermer le menu" : "Ouvrir le menu",
    );
  });
}
