const btn_contact = document.querySelector("#menu-item-69");
const popupOverlay = document.querySelector(".popup-overlay");
const popupContact = document.querySelector(".popup-contact");

btn_contact.addEventListener("click", () => {
  popupOverlay.classList.remove("hiddenPopup");
});

popupOverlay.addEventListener("click", (event) => {
  if (event.target === popupOverlay) {
    popupOverlay.classList.add("hiddenPopup");
  }
});