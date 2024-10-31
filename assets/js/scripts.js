/******************/
/*****La modale****/
/******************/

jQuery(document).ready(function ($) {
  const contact_buttons = [$("#menu-item-69"), $(".contactPhoto")];

  const popupOverlay = $(".popup-overlay");

  contact_buttons.forEach((contact_button) => {
    if (contact_button.length) {
      contact_button.click(function () {
        popupOverlay.removeClass("hiddenPopup");
      });
    }
  });

  // Fermer la popup en cliquant à l'extérieur de celle-ci
  if (popupOverlay.length) {
    // Vérifie si l'élément existe
    popupOverlay.click(function (event) {
      // Vérifie si le clic a eu lieu sur l'overlay (et non à l'intérieur du contenu)
      if (event.target === this) {
        popupOverlay.addClass("hiddenPopup"); // Ajoute la classe pour masquer la popup
      }
    });
  }

  /*******************************************/
  /*****Récupérer la référence des photos*****/
  /*******************************************/

  const ref = $(".reference");

  if (ref.length) {
    // Vérifie si l'élément existe
    // Récupère le texte entier, puis extrait uniquement la valeur après "Référence : "
    const referenceText = ref.text().trim();
    const referenceValue = referenceText.replace("Référence : ", "").trim();

    // Insère uniquement la valeur extraite dans le champ
    $("#menu-ref-photo").val(referenceValue);
  }

  /********************************************************/
  /*****Zone photos apparentées class= sliderContainer*****/
  /********************************************************/

  // Sélectionner les flèches et récupérer les images à utiliser
  const arrow_left = $(".arrow-left");
  const arrow_right = $(".arrow-right");
  const img_previous = $(".previousImg");
  const img_next = $(".nextImg");

  // Fonction pour gérer le clic sur la flèche gauche
  arrow_left.click(function () {
    let previousPostUrl = $(this).data("previous");
    const lastPostUrl = $(this).data("last");

    // Redirige vers le dernier post si on est au début de la série
    if (previousPostUrl === "#") {
      previousPostUrl = lastPostUrl;
    }
    window.location.href = previousPostUrl;
  });

  // Fonction pour gérer le clic sur la flèche droite
  arrow_right.click(function () {
    let nextPostUrl = $(this).data("next");
    const firstPostUrl = $(this).data("first");

    // Redirige vers le premier post si on est à la fin de la série
    if (nextPostUrl === "#") {
      nextPostUrl = firstPostUrl;
    }
    window.location.href = nextPostUrl;
  });

  // Fait apparaitre les images du slider au hover
  arrow_left.hover(
    function () {
      img_previous.removeClass("hiddenNow");
    },
    function () {
      img_previous.addClass("hiddenNow");
    }
  );

  arrow_right.hover(
    function () {
      img_next.removeClass("hiddenNow");
    },
    function () {
      img_next.addClass("hiddenNow");
    }
  );

  /***************************************************/
  /***** burger menu *****/
  /***************************************************/

  // Sélectionne le bouton du menu burger et son icône, le menu burger lui-même et tous les liens
  const $burgerMenuButton = $(".burgerMenu");
  const $burgerIcone = $(".burgerIcon");
  const $crossIcone = $(".crossIcon");
  const $burgerMenu = $(".burger-menu");
  const $menuLinks = $(".burger-menu a");

  // Ajoute un événement de clic sur le bouton du menu burger
  $burgerMenuButton.click(function () {
    // Bascule l'état du menu
    $burgerMenu.toggleClass("open");
    const isOpen = $burgerMenu.hasClass("open");

    // Met à jour l'affichage des icônes
    if (isOpen) {
      $burgerIcone.addClass("hiddenNow");
      $crossIcone.removeClass("hiddenNow");
      //console.log("c'est ouvert");
    } else {
      $burgerIcone.removeClass("hiddenNow");
      $crossIcone.addClass("hiddenNow");
      //console.log("c'est fermé");
    }

    // Désactive le défilement du corps de la page si le menu est ouvert
    $("body").css("overflow", isOpen ? "hidden" : "auto");
  });

  // Ajoute un événement de clic sur les liens du menu burger
  $menuLinks.click(function () {
    $burgerMenu.removeClass("open");
    $burgerIcone.removeClass("hiddenNow");
    $crossIcone.addClass("hiddenNow");

    // Réactive le défilement du corps de la page à la fermeture du menu
    $("body").css("overflow", "auto");
  });
});