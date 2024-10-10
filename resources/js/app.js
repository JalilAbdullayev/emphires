import "./bootstrap";

const clientSlider = document.querySelector(".clients-glide");
const heroSlider = document.querySelector(".hero-glide");
const testimonialSlider = document.querySelector(".testimonial-glide");
const aboutTestimonialSlider = document.querySelector(".about-testimonial");

document.addEventListener("DOMContentLoaded", () => {
    const searchBtn = document.querySelector("#search-button");
    const searchMdl = document.querySelector("#search-modal");
    const clsMdl = document.querySelector("#close-modal");
    const mobile = document.querySelector("#mobile-button");
    const nav = document.querySelector("#mobile-nav");
    const navbar = document.querySelector("#navbar");

    const modal = () => {
        searchMdl.classList.toggle("opacity-0");
        searchMdl.classList.toggle("invisible");
        searchMdl.classList.toggle("-translate-y-[30%]");
    };

    searchBtn.addEventListener("click", () => {
        modal();
    });

    clsMdl.addEventListener("click", () => {
        modal();
    });

    window.onclick = (event) => {
        if (event.target === searchMdl) {
            modal();
        }
    };

    window.addEventListener("scroll", () => {
        if (window.scrollY > 0) {
            navbar.classList.add("sticky-header");
            navbar
                .querySelectorAll("a")
                .forEach((el) => el.classList.remove("text-white"));
        } else {
            navbar.classList.remove("sticky-header");
            if (window.location.pathname === "/") {
                navbar
                    .querySelectorAll("a")
                    .forEach((el) => el.classList.add("text-white"));
            }
        }
    });
    mobile.addEventListener("click", () => {
        nav.classList.toggle("opacity-0");
        nav.classList.toggle("pointer-events-none");
    });
    if (window.location.pathname !== "/") {
        const navbar = document.querySelector("#navbar");
        navbar
            .querySelectorAll("a")
            .forEach((el) => el.classList.remove("text-white"));
    }
});

if (clientSlider) {
    new Glide(".clients-glide", {
        perView: 5,
        gap: 60,
    }).mount();
}

if (heroSlider) {
    new Glide(".hero-glide").mount();
}

if (testimonialSlider) {
    new Glide(".testimonial-glide", {
        gap: 30,
    }).mount();
}

if (aboutTestimonialSlider) {
    new Glide(".about-testimonial", {
        gap: 30,
    }).mount();
}
