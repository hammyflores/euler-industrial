const timeline = document.querySelector(".timeline");
const progress = document.querySelector(".timeline-progress");
const dot = document.querySelector(".timeline-dot");

window.addEventListener("scroll", () => {

    const scrollTop = window.scrollY;

    const docHeight = document.documentElement.scrollHeight - window.innerHeight;

    const percentage = scrollTop / docHeight;

    const lineHeight = timeline.offsetHeight;

    const position = percentage * lineHeight;

    progress.style.height = position + "px";

    dot.style.top = (position - 10) + "px";

});