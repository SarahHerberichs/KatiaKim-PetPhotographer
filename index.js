function mobileNavAnimation() {
  //dropDown englobe le boutton et la div contenant les liens
  var dropDown = document.querySelectorAll(".dropdown");
  var navBar = document.querySelector(".nav");
  var icon = document.querySelector(".iconBurger");

  icon.addEventListener("click", function () {
    navBar.classList.toggle("burgerClicked");
    for (let i = 0; i < 4; i++) {
      /*if (window.innerWidth < 880) {*/
      dropDown[i].addEventListener("click", function () {
        dropDown[i].classList.toggle("heightProgress");
      });
      if (!navBar.classList.contains("burgerClicked")) {
        dropDown[i].classList.remove("heightProgress");
      }
    }
    // }
  });
}
mobileNavAnimation();
