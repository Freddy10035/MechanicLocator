const showColors = (paragraph,value)=>{

    let para = document.querySelector(`.${paragraph}`)

        let stars = para.children;
        console.log(stars)

        let arr = Object.entries(stars);

        for(let p = 0;p < value;p++){
           let itemArray = Object.entries(arr[p])
        
           itemArray[1][1].style.filter = 'invert(28%) sepia(97%) saturate(2124%) hue-rotate(357deg) brightness(100%) contrast(96%)';
        }
  }

