const addInput =() => {
    let listHolder = document.querySelector(".holder-list");

    let listItem = document.createElement("li");
    listHolder.appendChild(listItem);

    let div = document.createElement("div");
    div.setAttribute("class","data-row");
    listItem.appendChild(div);

    let actInput = document.createElement("input");
    let costInput = document.createElement("input");

    // for activity 
    actInput.setAttribute("name","activity");
    actInput.setAttribute("class","input-elmt act-input");
    actInput.setAttribute("type","text");
    actInput.setAttribute("placeholder","e.g Brake pads replacement")
   
    // for cost 
    costInput.setAttribute("name","cost");
    costInput.setAttribute("class","input-elmt cost-input");
    costInput.setAttribute("type","number");
    costInput.setAttribute("placeholder","e.g 2000")
   

    div.appendChild(actInput);
    div.appendChild(costInput);


}


let actInputArrays = [];
let costInputArrays = [];

let hiddenCost = [];
let hiddenAct = [];

const readInput = ()=>{
actInputArrays = document.querySelectorAll(".act-input");
costInputArrays = document.querySelectorAll(".cost-input");

actInputArrays.forEach(item =>{
  hiddenAct.push(item.value);
});


costInputArrays.forEach(item =>{
hiddenCost.push(item.value);
});
//  return false;
document.querySelector("#length").value = hiddenAct.length;
document.querySelector("#hiddenActivity").value = hiddenAct;
document.querySelector("#hiddenCost").value = hiddenCost;
}
