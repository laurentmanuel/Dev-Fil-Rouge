const burgerBtn = document.querySelector(".burgerBtn");
const invisible = document.querySelector(".invisible");

// Ouverture fermeture menu burger
burgerBtn.addEventListener("click", () => {
    burgerBtn.classList.toggle("active");
    invisible.classList.toggle("visible");    
});


// let showOrdersBtn = document.getElementById("showOrders");
// button.onclick = function(){

// }


window.onload = ()=>{

    //On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    console.log(stars);

    //On va chercher la valeur de la note dans l'input
    const note = document.querySelector("#note");

    //On boucle sur les étoiles pour ajouter des écouteurs d'évenements
    for(star of stars){
        //On écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color = "yellow";
            this.classList.add("las");
            this.classList.remove("lar");
            //l'élement précédent dans le DOM (de même niveau, balise soeur)
            let previousStar = this.previousElementSibling;
            while(previousStar){
                //On pass l'étoile qui précéde en jaune
                previousStar.style.color = "yellow";
                previousStar.classList.add("las");
                previousStar.classList.remove("lar");
                //On récupère l'étoile qui la précéde
                previousStar = previousStar.previousElementSibling;
            }
        });

        //On écoute le click
        star.addEventListener("click", function(){
            note.value = this.dataset.value;
        });
        
        //Pour ne pas que les étoiles ne restent pas dans la couleur du survol si pas de click
        star.addEventListener("mouseout", function(){
            resetStars(note.value); 
        });
    }  

    /**
    *
    *Reset des étoile en vérifiant la note dans l'input (caché)
    *@param{number}note
    * **/
    function resetStars(note = 0){ //nb=0 si pas d'infos, c'est comme si on avait pas mis de note
        for(star of stars){ 
            if(star.dataset.value>note){
                star.style.color = "black";  
                star.classList.add("lar");
                star.classList.remove("las");            
            } else {
                star.style.color = "yellow";
                star.classList.add("las");
                star.classList.remove("lar");
            }
        }
    }
}
//ne marche pas pour le moment (pour le trait reste sur les menus séléctionnés)
// let selected = document.querySelector("menu__item");
// selected.addEventListener("click", () =>{
//     selected.classList.remove(".menu__item:hover:before");
// })