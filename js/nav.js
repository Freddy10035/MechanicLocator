let menuBtn = document.querySelector(".menu-btn");
let links = document.querySelector(".links");
menuBtn.addEventListener("click",()=>{
    links.classList.toggle("show");
})

/* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector(".nav").style.top = "0";
  } else {
    document.querySelector(".nav").style.top = "-60px";
  }
  prevScrollpos = currentScrollPos;
}

function openPop(targetClass){
  let target = document.querySelector(`.${targetClass}`);
  target.classList.add("show-flex");
  let overlay = document.querySelector(".dark-overlay");
  overlay.classList.add("show-flex");
  }