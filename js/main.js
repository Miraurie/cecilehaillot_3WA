'use strict';

//permet d'afficher le menu via un boutton en version mobile
function afficherMenu() {
  let x = document.getElementById("nav_header");
  if (x.style.display === "flex") {
    x.style.display = "none";
  } else {
    x.style.display = "flex";
  }
}
let burger = document.getElementById("burger");
if (typeof burger !== 'undefined') {
  if (!burger.style.display === "none") {
    afficherMenu();
  }
}

// permet d'afficher le sous menu
function afficherSousMenu() {
  let x = document.getElementById("dropdown-content");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

//Afficher le nom des fichiers dans le formulaire d'ajout de fichiers
let inputA = document.querySelectorAll('#reservation');

Array.prototype.forEach.call(inputA, function (input) {
  let label = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener('change', function (e) {
    let fileName = e.target.value.split('\\').pop();

    if (fileName) {
      label.querySelector('p').innerHTML = fileName;
    } else {
      label.innerHTML = labelVal;
    }
  });
});
let inputB = document.querySelectorAll('#playlist');

Array.prototype.forEach.call(inputB, function (input) {
  let label = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener('change', function (e) {
    let fileName = e.target.value.split('\\').pop();

    if (fileName) {
      label.querySelector('p').innerHTML = fileName;
    } else {
      label.innerHTML = labelVal;
    }
  });
});


//Permet d'afficher une image en entier sur la page souvenirs
// Crée des références au modal
let modal = document.getElementById('myModal');
// A toutes les images
let images = document.getElementsByClassName('case');
// L'image dans le modal
let modalImg = document.getElementById("img01");
// Et la caption dans le modal
let captionText = document.getElementById("caption");

// On passe dans toutes les images qui ont la classe "case"
for (let i = 0; i < images.length; i++) {
  let img = images[i];
  // Et on attache l'ecouteur click pour cette image
  img.onclick = function (evt) {
    console.log(evt);
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
  }
}
//Fermeture du modal
let span = document.getElementsByClassName("close")[0];
if (typeof span !== 'undefined') {
  span.onclick = function () {
    modal.style.display = "none";
  }
}