// =============================================
// Filtrage de la carte (pilules + menu déroulant)
// =============================================
const filtres = document.querySelectorAll(".filtre");
const categories = document.querySelectorAll(".carte-categorie");

// Affiche ou caxche les sections selon catégorie
function filtrer(choix) {
  categories.forEach(function (categorie) {
    if (choix === "all" || categorie.dataset.categorie === choix) {
      categorie.classList.remove("is-hidden");
    } else {
      categorie.classList.add("is-hidden");
    }
  });
}

// Pilules (desktop) : clic
filtres.forEach(function (filtre) {
  filtre.addEventListener("click", function () {
    filtres.forEach(function (f) {
      f.classList.remove("is-active");
    });
    filtre.classList.add("is-active");
    filtrer(filtre.dataset.categorie);
  });
});

// Aperçu agrandi des photos de plats
const photos = document.querySelectorAll(".plat img");
const backdrop = document.querySelector(".lightbox-backdrop");

photos.forEach(function (photo) {
  photo.addEventListener("click", function () {
    photo.classList.add("is-zoomed");
    backdrop.classList.add("is-open");
  });
});

backdrop.addEventListener("click", function () {
  photos.forEach(function (photo) {
    photo.classList.remove("is-zoomed");
  });
  backdrop.classList.remove("is-open");
});
