const items = document.querySelectorAll(".hero-header");
const itemsText = document.querySelectorAll(".hero-text");
const nbSlide = items.length;
const next = document.querySelector(".right");
const prev = document.querySelector(".left");
const showArrow = document.getElementsByClassName("show-arrow");
let count = 0;
let j = 0;
let i;
let m = 0;
let avis = document.querySelectorAll(".avis");
let slideNextVisible;
let slidePrevVisible;

//---------------------CAROUSSEL--------------------
console.log(window.innerHeight / 2);
for (let count = 0; count < nbSlide; count++) {
  items[count].style.padding = window.innerHeight / 2 + "px 0px";
}
if (items && next) {
  function slideNext() {
    items[count].classList.remove("active");
    itemsText[count].classList.remove("active");

    if (count < nbSlide - 1) {
      count++;
    } else {
      count = 0;
    }
    items[count].classList.add("active");
    itemsText[count].classList.add("active");
  }
  if (next) {
    next.addEventListener("click", slideNext);
  }

  function slidePrev() {
    items[count].classList.remove("active");
    itemsText[count].classList.remove("active");

    if (count > 0) {
      count--;
    } else {
      count = nbSlide - 1;
    }
    items[count].classList.add("active");
    itemsText[count].classList.add("active");
  }
  if (prev) {
    prev.addEventListener("click", slidePrev);
  }

  function keyPress(e) {
    if (e.keyCode === 37) {
      slidePrev();
    } else if (e.keyCode === 39) {
      slideNext();
    }
  }
  document.addEventListener("keydown", keyPress);

  function stopTimerPrev() {
    prev.style.opacity = "1";
    clearInterval(timer);
  }
  function stopTimerNext() {
    next.style.opacity = "1";
    clearInterval(timer);
  }
  for (let i = 0; i < showArrow.length; i++) {
    showArrow[0].addEventListener("mouseover", stopTimerPrev);
    showArrow[1].addEventListener("mouseover", stopTimerNext);
    showArrow[i].addEventListener("mouseout", startTimer);
  }

  function startTimer() {
    timer = setInterval(slideNext, 8000);
    prev.style.opacity = "0";
    next.style.opacity = "0";
  }
  let timer = setInterval(slideNext, 8000);
}
//--------------------FIN CAROUSSEL------------------

// -----------------Caroussel Avis---------------------
if (avis[m]) {
  avis[m].classList.add("active");
  document
    .querySelector(".arrow-right")
    .addEventListener("click", translateSlideNext);
  function translateSlideNext() {
    document.querySelector(".arrow-left").style.opacity = "1";
    document.querySelector(".arrow-left").style.transform = "translateX(0)";
    avis[m].classList.add("activeleft");
    avis[m].classList.remove("active");

    console.log(avis[m]);
    if (m < avis.length - 1) {
      m++;
    }
    if (m === avis.length - 1) {
      document.querySelector(".arrow-right").style.opacity = "0";
      document.querySelector(".arrow-right").style.transform =
        "translateX(50vh)";
    }
    console.log(m);
    console.log(avis.length - 1);
    avis[m].classList.remove("activeright");
    avis[m].classList.add("active");
  }

  document
    .querySelector(".arrow-left")
    .addEventListener("click", translateSlidePrev);
  function translateSlidePrev() {
    document.querySelector(".arrow-right").style.opacity = "1";
    document.querySelector(".arrow-right").style.transform = "translateX(0)";
    avis[m].classList.add("activeright");
    if (m > 0) {
      m--;
    }
    if (m === 0) {
      document.querySelector(".arrow-left").style.opacity = "0";
      document.querySelector(".arrow-left").style.transform =
        "translateX(-50vh)";
    }
    avis[m].classList.remove("activeleft");
    avis[m].classList.add("active");
  }
}
// -------------Fin caroussel Avis---------------------
// -------------Realisations--------------------------
window.addEventListener("scroll", () => {
  const titlePortefolio = document.querySelector(".title-portefolio");
  if (titlePortefolio) {
    if (scrollY > 200) {
      titlePortefolio.querySelector("h4").style.opacity = "0";
      titlePortefolio.querySelector("p").style.opacity = "0";
    } else if (scrollY < 200) {
      titlePortefolio.querySelector("h4").style.opacity = "1";
      titlePortefolio.querySelector("p").style.opacity = "1";
    }
  }
});
// -----------Fin réalisations------------------------
// -----------Newsletter-----------------------------
const formNews = document.getElementById("form-subscribe");
if (formNews) {
  formNews.addEventListener("submit", (e) => {
    e.preventDefault();

    let data = new FormData(formNews);

    let xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.response);
        document.getElementById("responseNewsletter").innerHTML =
          this.response["msg"];
      } else if (this.readyState == 4) {
        alert("une erreur est survenue");
      }
    };

    xhr.open("POST", "footer/response.php", true);
    xhr.responseType = "json";
    // xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(data);

    return false;
  });
}
// -----------------Fin newsletters----------------------------
