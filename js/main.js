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


/*==================================
        HEADER SCROLL
==================================*/

const header = document.querySelector(".header");

window.addEventListener("scroll", () => {

    if (window.scrollY > 40) {

        header.classList.add("scrolled");

    } else {

        header.classList.remove("scrolled");

    }

});



/*==================================================
                CONTACT FORM
==================================================*/

const contactForm = document.getElementById("contactForm");

if(contactForm){

    const messageBox = document.getElementById("formMessage");

    contactForm.addEventListener("submit", async function(e){

        e.preventDefault();

        messageBox.className = "form-message";
        messageBox.style.display = "none";
        messageBox.innerHTML = "";

        const button = contactForm.querySelector(".btn-primary");
        const originalHTML = button.innerHTML;

        button.disabled = true;

       button.innerHTML = `
    <span class="spinner"></span>
    ENVIANDO...
`;

        try{

            const response = await fetch(contactForm.action,{

                method:"POST",

                body:new FormData(contactForm)

            });

            const data = await response.json();

            messageBox.style.display = "block";

            if(data.success){

                messageBox.classList.add("success");

                messageBox.innerHTML = `
                    <strong>✓ Gracias.</strong><br>
                    ${data.message}
                `;

                contactForm.reset();

            }else{

                messageBox.classList.add("error");

                messageBox.innerHTML = `
                    <strong>✕ Atención.</strong><br>
                    ${data.message}
                `;

            }

        }catch(error){

            messageBox.style.display = "block";

            messageBox.classList.add("error");

            messageBox.innerHTML = `
                <strong>✕ Error de conexión.</strong><br>
                No fue posible enviar la solicitud.
                Intente nuevamente.
            `;

        }

        button.disabled = false;

        button.innerHTML = originalHTML;

    });

}


