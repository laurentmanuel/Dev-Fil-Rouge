const burgerBtn = document.querySelector(".burgerBtn");
const invisible = document.querySelector(".invisible");

// Ouverture fermeture menu burger
burgerBtn.addEventListener("click", () => {
    burgerBtn.classList.toggle("active");
    invisible.classList.toggle("visible");    
});


let showOrdersBtn = document.getElementById("showOrders");
button.onclick = function(){
    
}

//ne marche pas pour le moment (pour le trait reste sur les menus séléctionnés)
// let selected = document.querySelector("menu__item");
// selected.addEventListener("click", () =>{
//     selected.classList.remove(".menu__item:hover:before");
// })