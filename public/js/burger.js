// Je pointe 2 constantes, le " .burger " pour le menu burger et " .navlinks" pour les liens
const burger = document.querySelector(".burger");
const navLinks = document.querySelector(".nav-links");

// On ajoute un évenement au clic : chaque clic active ou désactive l'état " active "
burger.addEventListener("click", function () {
  navLinks.classList.toggle("active");
});
