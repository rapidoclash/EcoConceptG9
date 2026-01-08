document.addEventListener("DOMContentLoaded", () => {
    fetch("data.xml")
        .then(response => response.text())
        .then(str => new window.DOMParser().parseFromString(str, "text/xml"))
        .then(initCarousel);
});

const Carousel = {
    slideIndex: 0,
    slides: [],
    points: [],
    texteDescriptif: null,
    timer: null,
    interval: 5900,

    init(xml) {
        this.createSlides(xml);
        this.cacheElements();
        this.createPoints();
        this.updateUI(0, null);
        this.startTimer();

        document.getElementById("prev").addEventListener("click", () => {
            this.goTo(this.slideIndex - 1);
        });

        document.getElementById("next").addEventListener("click", () => {
            this.goTo(this.slideIndex + 1);
        });
    },

    createSlides(xml) {
        const slider = document.getElementById("slider");
        const slideNodes = xml.getElementsByTagName("slide");

        Array.from(slideNodes).forEach(slide => {
            const div = document.createElement("div");
            div.className = "slide";

            const img = document.createElement("img");
            img.src = slide.getElementsByTagName("image")[0].textContent;

            const p = document.createElement("p");
            p.className = "texteDescriptif";
            p.textContent = slide.getElementsByTagName("description")[0].textContent;

            div.append(img, p);
            slider.appendChild(div);
        });
    },

    cacheElements() {
        this.slides = document.querySelectorAll(".slide");
        this.texteDescriptif = document.querySelector(".Descriptif .texteDescriptif");
    },

    createPoints() {
        const carouselPoint = document.getElementById("carouselPoint");

        this.slides.forEach((_, idx) => {
            const point = document.createElement("span");
            point.className = "points";
            point.addEventListener("click", () => this.goTo(idx));
            carouselPoint.appendChild(point);
            this.points.push(point);
        });
    },

    goTo(n) {
        this.stopTimer();

        if (n >= this.slides.length) n = 0;
        if (n < 0) n = this.slides.length - 1;

        if (n !== this.slideIndex) {
            this.updateUI(n, this.slideIndex);
            this.slideIndex = n;
        }

        this.startTimer();
    },

    updateUI(next, current) {
        if (current === null) {
            this.slides[next].className = "slide";
            this.slides[next].style.opacity = 1;
            this.points[next].classList.add("active");

            this.texteDescriptif.textContent =
                this.slides[next].querySelector(".texteDescriptif").textContent;
            return;
        }

        const direction = next > current ? "next" : "prev";

        this.slides[current].className = `slide ${
            direction === "next"
                ? "decalageGaucheSlideCourante"
                : "decalageDroiteSlideCourante"
        }`;
        this.slides[current].style.opacity = 0;
        this.points[current].classList.remove("active");

        this.slides[next].className = `slide ${
            direction === "next"
                ? "decalageGaucheSlideSuivante"
                : "decalageDroiteSlideSuivante"
        }`;
        this.slides[next].style.opacity = 1;
        this.points[next].classList.add("active");

        this.texteDescriptif.className =
            "texteDescriptif " +
            (direction === "next" ? "decalageTexteHaut" : "decalageTexteBas");

        this.texteDescriptif.textContent =
            this.slides[next].querySelector(".texteDescriptif").textContent;
    },


    startTimer() {
        this.timer = setInterval(() => this.goTo(this.slideIndex + 1), this.interval);
    },

    stopTimer() {
        clearInterval(this.timer);
    }
};

function initCarousel(xml) {
    Carousel.init(xml);
}
