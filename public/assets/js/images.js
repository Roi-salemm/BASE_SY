let links = document.querySelectorAll("[data-delete]");
// console.log(links);

//* boucle sur les liens 
for(let link of links){
    link.addEventListener("click", function(e){
        e.preventDefault();

        if(confirm("Voulez-vous supprimer cette image ?")){
            //* la requête ajax
            //* 1 Envoie (promesse)
            fetch(this.getAttribute("href"), {
                method: "DELETE",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({"_token": this.dataset.token})

            //* 2 réponse 
            }).then(response => response.json())
            .then(data => {
                // si promesse tenue supprime la div 
                if(data.success){
                    this.parentElement.remove();
                }else{
                    alert(data.error);
                }
            })
        }
    })
}


