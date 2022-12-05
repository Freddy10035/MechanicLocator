function openPop(targetClass){
let target = document.querySelector(`.${targetClass}`);
target.classList.add("show-flex");
let overlay = document.querySelector(".dark-overlay");
overlay.classList.add("show-flex");
}

function closePop(targetClass){
    let target = document.querySelector(`.${targetClass}`);
    target.classList.remove("show-flex");
    let overlay = document.querySelector(".dark-overlay");
    overlay.classList.remove("show-flex");

    if(window.location != 'http://localhost/mechLocator/userProfile.php'){
        window.location = 'http://localhost/mechLocator/motorist-Homepage.php';
    }
    else{
        window.location = 'http://localhost/mechLocator/userProfile.php';
    }
}

function allowWrite(targetId){
    let target = document.querySelector(`#${targetId}`);
    target.removeAttribute("readonly");
}
// removeAttribute('readonly');
// let winLoc = window.location;
// console.log(winLoc);
if(window.location == 'http://localhost/mechLocator/userProfile.php'){
let linkItem = document.querySelector(".prof-link");
linkItem.style.display = "none";
}

