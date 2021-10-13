/**********************Menu burger ***********************/
const burgerBtn = document.querySelector(".burgerBtn");
const invisible = document.querySelector(".invisiblex");

// Ouverture fermeture menu burger
burgerBtn.addEventListener("click", () => {
    burgerBtn.classList.toggle("active");
    invisible.classList.toggle("visiblex");    
});

/*******************************************************/


/******************js pour étoiles***********************/

window.onload = ()=>{
    
    //On va chercher toutes les étoiles
    const stars = document.querySelectorAll(".la-star");
    
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

/**********************MODAL*********************/

window.onload = () => {
    //On récupère tous les boutons d'ouverture de modales
    const modalButtons = document.querySelectorAll("[data-toggle=modal]");

    for(let button of modalButtons){
        button.addEventListener("click", function(e){
            //On empêche la navigation
            e.preventDefault();
            //On récupère le data-target
            let target = this.dataset.target;

            //On récupère la bonne modale
            let modal = document.querySelector(target);
            //On affiche la modale
            modal.classList.add("show");
            
            //On récupère les boutons de fermeture
            const modalClose = document.querySelectorAll(["[data-dismiss=dialog]"]);
            console.log(modalClose); 

            for(let close of modalClose){
                close.addEventListener("click", ()=>{
                    modal.classList.remove("show");
                });
            }

            //Pour gérer la fermeture sur click dans zone grise
            modal.addEventListener("click", function(){
                this.classList.remove("show");
            });

            //On évite la propagation du click d'un enfant à son parent
            modal.children[0].addEventListener("click", function(e){
                e.stopPropagation(); 
            });
        });
    }
}
