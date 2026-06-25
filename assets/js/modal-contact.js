document.addEventListener("DOMContentLoaded", function () {
  const contactLinks = document.querySelectorAll('a[href="#contact-modal"]');
  const modal = document.querySelector("#contact-modal");

  if (!modal || contactLinks.length === 0) {
    return;
  }

  const overlay = modal.querySelector(".contact-modal__overlay");

  function openModal(event) {
    event.preventDefault();
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("modal-open");
  }

  function closeModal() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("modal-open");
  }

  contactLinks.forEach(function (link) {
    link.addEventListener("click", openModal);
  });

  overlay.addEventListener("click", closeModal);

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && modal.classList.contains("is-open")) {
      closeModal();
    }
  });
});
