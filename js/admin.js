console.log("Hello world.")
let navText = document.querySelectorAll(".nav-text")
let navMenu = document.querySelector(".menu-dark")
let navHolder = document.querySelector(".menu-links")

// menu btns 
let overviewBtn = document.querySelector(".overview-btn")
let ownersBtn = document.querySelector(".owners-btn")
let mechanicsBtn = document.querySelector(".mechanics-btn")
let carsBtn = document.querySelector(".cars-btn")
let applicationBtn = document.querySelector(".applications-btn")
// let quesBtn = document.querySelector(".questions-btn")

let buttonsList = document.querySelectorAll(".menu-option-btn")
// let addQuesBtn = document.querySelector(".addQues-btn")
let overlay = document.querySelector(".dark-overlay")
let form = document.querySelector(".register-form")

let closeIcon = document.querySelectorAll(".close-icon");
let cancelBtns = document.querySelectorAll(".cancel-btn");

// addQuesBtn.addEventListener("click", ()=>{
//   overlay.classList.add("showFlex")
//   form.classList.add("showFlex")
// })

closeIcon.forEach( elem =>{
  elem.addEventListener("click",()=>{
    let parentDiv = elem.parentNode;
    parentDiv.classList.remove("showFlex");
    overlay.classList.remove("showFlex");
  })
})

cancelBtns.forEach( elem =>{
  elem.addEventListener("click",()=>{
    let parent = elem.parentNode;
    let parentDiv = parent.parentNode;
    parentDiv.classList.remove("showFlex");
    overlay.classList.remove("showFlex");
  })
})

// getting sections
// let overSect = document.querySelector(".overview-details")
// let ownerSect = document.querySelector(".owners-details")
// let mechSect = document.querySelector(".mech-details")
// let carsSect = document.querySelector(".cars-details")
// let appliSect = document.querySelector(".applications-details")
// let quesSect = document.querySelector(".ques-details")

let allSections = document.querySelectorAll(".view-details")
let allDelBtns = document.querySelectorAll(".del-btn")

allDelBtns.forEach( item =>{
  item.addEventListener("click",()=>{
    confirm("Are you sure you want to delete?")
  })
})
// hiding text in menu
function alterText(){
  navText.forEach((item) => {
    item.classList.toggle("showBlock")
  });

  // changing width
  navHolder.classList.toggle("bigWidth")
}

let screenWidth = screen.width;
if(screenWidth > 600){
  alterText();
}
function changeDisplay(targetBtnClass, targetSect){
  
  function changeActiveStatus(targetBtnClass){
    buttonsList.forEach(item =>{
        if(item.classList.contains(targetBtnClass)){
          item.classList.add("activeBtn")
        }
        else{
          item.classList.remove("activeBtn")
        }
    });
  }

  function changeSection(targetSect){
    allSections.forEach( item =>{
      if(item.classList.contains(targetSect)){
        item.style.display = "block"
      }
      else{
        item.style.display = "none"
      }
    })
    // targetSect.style.display= "none";
  }
  
  changeActiveStatus(targetBtnClass)
  changeSection(targetSect)
}

navMenu.addEventListener("click",alterText);


overviewBtn.addEventListener("click",()=>{ changeDisplay("overview-btn","overview-details") });
ownersBtn.addEventListener("click",()=>{ changeDisplay("owners-btn","owners-details") });
mechanicsBtn.addEventListener("click",()=>{ changeDisplay("mechanics-btn","mech-details") });
carsBtn.addEventListener("click",()=>{ changeDisplay("cars-btn","cars-details") });
// applicationBtn.addEventListener("click",()=>{ changeDisplay("applications-btn","applications-details") });
// quesBtn.addEventListener("click",function(){changeDisplay("questions-btn","ques-details")});

// printing functionality 
let printBtns = document.querySelectorAll(".print-btn");

printBtns.forEach((printBtn)=>{
printBtn.addEventListener('click', (event) => {
PrintPage()
setTimeout(function(){ window.close() },750)
});
})
function PrintPage() {
  window.print();
}