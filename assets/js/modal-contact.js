document.addEventListener("DOMContentLoaded", function () {
  const contactLinks = document.querySelectorAll('a[href="#contact-modal"]');
  const contactButtons = document.querySelectorAll(".js-open-contact-modal");
  const modal = document.querySelector("#contact-modal");

  if (!modal || (contactLinks.length === 0 && contactButtons.length === 0)) {
    return;
  }

  const overlay = modal.querySelector(".contact-modal__overlay");

  function fillPhotoReference(reference) {
    const referenceField = modal.querySelector('input[name="ref-photo"]');

    if (referenceField && reference) {
      referenceField.value = reference;
    }
  }

  function openModal(event) {
    event.preventDefault();

    const reference = event.currentTarget.dataset.reference;

    fillPhotoReference(reference);

    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
    document.body.classList.add("modal-open");
  }

  function closeModal() {
    modal.classList.remove("is-open");
    modal.setAttribute("aria-hidden", "true");
    document.body.classList.remove("modal-open");
  }

  contactButtons.forEach(function (button) {
    button.addEventListener("click", openModal);
  });

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
