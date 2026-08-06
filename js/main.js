/*==================================================
                    EULER
==================================================*/

/*==================================================
            REVEAL ANIMATIONS
==================================================*/

function createRevealObserver(selector, threshold = 0.2){

    const elements = document.querySelectorAll(selector);

    if(!elements.length) return;

    const observer = new IntersectionObserver((entries)=>{

        entries.forEach(entry=>{

            if(entry.isIntersecting){

                entry.target.classList.add("show");

                observer.unobserve(entry.target);

            }

        });

    },{

        threshold

    });

    elements.forEach(element=>observer.observe(element));

}



/*==================================================
                INITIALIZE
==================================================*/

createRevealObserver(".reveal",0.25);

createRevealObserver(".process-item",0.20);



/*==================================================
            RESPONSIVE MENU
==================================================*/

const menuToggle = document.querySelector(".menu-toggle");

const menu = document.querySelector(".menu");

if(menuToggle && menu){

    menuToggle.addEventListener("click",()=>{

        menu.classList.toggle("active");

    });



    document.querySelectorAll(".menu a").forEach(link=>{

        link.addEventListener("click",()=>{

            menu.classList.remove("active");

        });

    });



    window.addEventListener("resize",()=>{

        if(window.innerWidth > 992){

            menu.classList.remove("active");

        }

    });

}