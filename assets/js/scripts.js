/******************/
/*****La modale****/
/******************/

document.addEventListener("DOMContentLoaded", () => {
  const contact_buttons = [
    document.querySelector("#menu-item-69"),
    document.querySelector(".contactPhoto"),
  ];

  const popupOverlay = document.querySelector(".popup-overlay");

  contact_buttons
    .filter((contact_button) => contact_button !== null)
    .forEach((contact_button) => {
      contact_button.addEventListener("click", () => {
        popupOverlay.classList.remove("hiddenPopup");
      });
    });

  if (popupOverlay) {
    popupOverlay.addEventListener("click", (event) => {
      if (event.target === popupOverlay) {
        popupOverlay.classList.add("hiddenPopup");
      }
    });
  }
});

/*******************************************/
/*****Récupérer la référence des photos*****/
/*******************************************/
jQuery(document).ready(function ($) {
  const ref = document.querySelector(".reference");

  if (ref) {
    // Récupère le texte entier, puis extrait uniquement la valeur après "Référence : "
    const referenceText = ref.textContent.trim();
    const referenceValue = referenceText.replace("Référence : ", "").trim();

    // Insère uniquement la valeur extraite dans le champ
    $("#menu-ref-photo").val(referenceValue);
  }
});

/********************************************************/
/*****Zone photos apparentées class= sliderContainer*****/
/********************************************************/