const btn = document.getElementById("btnHarmburger");
const header = document.querySelector("#header");
const overlay = document.querySelector(".overlay");
const fadeElems = document.querySelectorAll(".has-fade");
const body = document.querySelector("body");

btn.addEventListener("click", () => {
    if (header.classList.contains("open")) {
        body.classList.remove("no-scroll");
        header.classList.remove("open");

        fadeElems.forEach(element => {
            element.classList.remove("fade-in");
            element.classList.add("fade-out");
        });
    } else {
        body.classList.add("no-scroll");
        header.classList.add("open");

        fadeElems.forEach(element => {
            element.classList.add("fade-in");
            element.classList.remove("fade-out");
        });
    }
});