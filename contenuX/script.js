const burgerBtn = document.querySelector(".burgerBtn");
const invisible = document.querySelector(".invisible");

// Ouverture fermeture menu burger
burgerBtn.addEventListener("click", () => {
    burgerBtn.classList.toggle("active");
    invisible.classList.toggle("visible");    
});