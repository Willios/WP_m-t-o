// ------------------------------------------------------------------
// Pour la conversion en farenheint

function swapUnit() {

    document.querySelector('#temperature').textContent = farenheint
    
}
    
let buttonfarenheint = document.querySelector("#conversion")
let farenheint = (Math.round(temperature) * 9/5) + 32
buttonfarenheint.onclick = swapUnit();

