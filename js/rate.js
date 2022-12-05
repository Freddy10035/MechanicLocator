let allHolders = document.querySelectorAll(".rates");


const showColors = (paragraph,value)=>{
    let para = document.querySelector(`.${paragraph}`)

    
    // allHolders.forEach(item => {
        let stars = para.children;
        // Object.entries(stars).forEach(item => {
        //     let itemArray = Object.entries(item)
        //     itemArray.style.filter = "filter: invert(28%) sepia(97%) saturate(2124%) hue-rotate(357deg) brightness(100%) contrast(96%)";
        //     // console.log(itemArray);
    
        // })
        let arr = Object.entries(stars);
        // arr = Object.entries(arr)
        // console.log((arr[0]));
        for(let p = 0;p < value;p++){
           let itemArray = Object.entries(arr[p])
          //  console.log(itemArray[1][1]);
           itemArray[1][1].style.filter = 'invert(28%) sepia(97%) saturate(2124%) hue-rotate(357deg) brightness(100%) contrast(96%)';
        }
    
        // arr.forEach(item =>{
        //     let itemArray = Object.entries(item)
        //    console.log(itemArray[1][1]);
        //    itemArray[1][1].style.filter = 'invert(28%) sepia(97%) saturate(2124%) hue-rotate(357deg) brightness(100%) contrast(96%)';
        //      });
      
    // })
    if(value == 0){
      para.innerText = "Not rated."
    }
  }


// console.log(allHolders)




