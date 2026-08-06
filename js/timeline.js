/*==================================================
                    TIMELINE
==================================================*/

const timeline = document.querySelector(".timeline");

const progress = document.querySelector(".timeline-progress");

const dot = document.querySelector(".timeline-dot");



if(timeline && progress && dot){

    const updateTimeline = ()=>{

        const scrollTop = window.scrollY;

        const docHeight =

            document.documentElement.scrollHeight -

            window.innerHeight;



        if(docHeight <= 0) return;



        const percentage = scrollTop / docHeight;

        const lineHeight = timeline.offsetHeight;

        const position = percentage * lineHeight;



        progress.style.height = `${position}px`;



        const dotSize = dot.offsetHeight;

        dot.style.top = `${position - (dotSize / 2)}px`;

    };



    window.addEventListener("scroll",updateTimeline,{ passive:true });

    window.addEventListener("resize",updateTimeline);

    window.addEventListener("load",updateTimeline);

}



