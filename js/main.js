console.log('Euler');
/*==========================================
    Reveal al hacer scroll
==========================================*/

const reveals = document.querySelectorAll(".reveal");

const observer = new IntersectionObserver((entries)=>{

    entries.forEach(entry=>{

        if(entry.isIntersecting){

            entry.target.classList.add("show");

        }

    });

},{
    threshold:.25
});

reveals.forEach(item=>observer.observe(item));


/*=====================================
    ANIMACIÓN PROCESO
======================================*/

const processItems = document.querySelectorAll('.process-item');

console.log(processItems);

const processObserver = new IntersectionObserver((entries) => {

    entries.forEach(entry => {

        if (entry.isIntersecting) {

            entry.target.classList.add('show');

        }

    });

}, {

    threshold: 0.2

});

processItems.forEach(item => {

    processObserver.observe(item);

});


const processObserver = new IntersectionObserver((entries) => {

    entries.forEach(entry => {

        console.log(entry.isIntersecting);

        if (entry.isIntersecting) {

            entry.target.classList.add("show");

        }

    });

}, {
    threshold: 0.2
});