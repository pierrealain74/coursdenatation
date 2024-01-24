

document.addEventListener("DOMContentLoaded", () => {

    //Catégories des articles
    let cat = '';
    // Nombre d'articles à afficher à chaque chargement
    const articlesParChargement = 4;
    let indiceAffichage = 0;



    //console.log(all_posts_json);
    const posts4FirstItems = all_posts_json.slice(0, articlesParChargement);

    displayPosts(posts4FirstItems);
            
    indiceAffichage += articlesParChargement;
    
    
    function displayPosts(arrayPosts) {


        const bloggerElt = document.getElementById("blogger");
        //bloggerElt.textContent = '';
    
    
    
    
        arrayPosts.forEach(async (post) =>
        {
                        
    
    
            post.thumbnail === false ? thumbnailUrl = window.location.href + '/wp-content/uploads/2024/01/thumbnail-default.png' : thumbnailUrl = post.thumbnail;
    
    
            /* Templating */
    
            const divElt = document.createElement('div');
            divElt.classList.add('divImg');
    
            const imgElt = document.createElement('img');
            imgElt.src = thumbnailUrl;
    
            const linkImgElt = document.createElement("a");
            linkImgElt.setAttribute("href", post.url_post);
    
            const titleH3 = document.createElement("h3");
            titleH3.classList.add("title-post", "text-center");
            titleH3.innerHTML = '<a href="' + post.url_post + '">' + post.title + '</a>';
    
    
    
            const exerptH2 = document.createElement("h2");
            //const excerptSliced = excerpt.slice(0,50)
            exerptH2.innerHTML = post.excerpt.split(' ').slice(0, 9).join(' ') + '[...]';
    
    
            const linkBt = document.createElement("a");
            linkBt.setAttribute("type", "submit");
            linkBt.setAttribute("role", "button");
            linkBt.setAttribute("href", post.url_post);
            linkBt.classList.add("btn", "btn-primary");
            linkBt.innerHTML = '<i class="bi bi-eye"></i>';
    
            linkImgElt.appendChild(imgElt);                    
            divElt.appendChild(linkImgElt);
            divElt.appendChild(titleH3);
            divElt.appendChild(exerptH2);
            divElt.appendChild(linkBt);
            
            bloggerElt.appendChild(divElt);
    
    
    
    
    
    
        })

        /* loadMore(arrayPosts); */
    
                
     }   



     function loadMore(posts) {

        //Créer bt loadmore // Deja créé dans le DOM dans home.php
    /*     const bloggerfilterElt = document.querySelector(".bloggerfilter");
        const loadMoreBt = document.createElement("div");
        loadMoreBt.classList.add("loadmore", "btn", "btn-primary");
        loadMoreBt.innerHTML = "Load More";
        bloggerfilterElt.appendChild(loadMoreBt); */
        
        const nextPosts = posts.slice(indiceAffichage, indiceAffichage + articlesParChargement);
    
        if (nextPosts.length > 0) {
    
            displayPosts(nextPosts);
    
            indiceAffichage += articlesParChargement;
    
        } else {
    
            // Aucun article supplémentaire à charger, désactivez le bouton ou masquez-le
            document.querySelector(".loadmore").style.display = 'none';
        }
    
    }


});//fin de  DOMContentLoaded