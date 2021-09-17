const toggleButton = document.querySelector(".toggle-button");
const toggleButtonSpan = toggleButton.querySelectorAll("span");
const sideBar = document.querySelector(".sidebar");

window.addEventListener("wheel", (e) => {
  if (e.deltaY > 0) {
    document.querySelector(".logo").classList.add("active");
    document.querySelector(".menu").style.transform = "translateY(-100px)";
  } else if (e.deltaY < 0) {
    document.querySelector(".logo").classList.remove("active");
    document.querySelector(".menu").style.transform = "translateY(0px)";
  }
});
// ------------------Menu--------------------------

function show() {
  sideBar.classList.toggle("active");
  toggleButton.classList.toggle("active");
  for (let l = 0; l < toggleButtonSpan.length; l++) {
    toggleButtonSpan[l].classList.toggle("active");
    toggleButtonSpan[l].classList.remove("activeHover");
  }
}
toggleButton.addEventListener("click", show);

function hidden() {
  sideBar.classList.remove("active");
  toggleButton.classList.remove("active");
  for (let l = 0; l < toggleButtonSpan.length; l++) {
    toggleButtonSpan[l].classList.toggle("active");
  }
}
sideBar.addEventListener("click", hidden);

toggleButton.addEventListener("mouseenter", () => {
  for (let l = 0; l < toggleButtonSpan.length; l++) {
    toggleButtonSpan[l].classList.add("activeHover");
  }
});
toggleButton.addEventListener("mouseleave", () => {
  for (let l = 0; l < toggleButtonSpan.length; l++) {
    toggleButtonSpan[l].classList.remove("activeHover");
  }
});

// ---------------Fin Menu------------------------
