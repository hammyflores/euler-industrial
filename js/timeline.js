/*==================================================
                    TIMELINE
==================================================*/

const timeline = document.querySelector(".timeline");

const progress = timeline?.querySelector(".timeline-progress");

const cursor = timeline?.querySelector(".timeline-cursor");


if (timeline && progress && cursor) {

    const updateTimeline = () => {

        const scrollTop = window.scrollY;

        const docHeight =
            document.documentElement.scrollHeight -
            window.innerHeight;

        if (docHeight <= 0) return;

        const percentage = scrollTop / docHeight;

        const lineHeight = timeline.offsetHeight;

        const position = percentage * lineHeight;

        progress.style.height = `${position}px`;

        const cursorSize = cursor.offsetHeight;

        cursor.style.top = `${position - (cursorSize / 2)}px`;

    };


    window.addEventListener("scroll", updateTimeline, {
        passive: true
    });

    window.addEventListener("resize", updateTimeline);

    window.addEventListener("load", updateTimeline);

    updateTimeline();

}