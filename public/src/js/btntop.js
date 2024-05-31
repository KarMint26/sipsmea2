const buttonBackTop = document.querySelector(".button-backtop");
buttonBackTop.addEventListener("click", () => {
    window.scrollTo({
        top: 0,
        behavior: "smooth",
    });
});

function handleScroll() {
    if (window.scrollY > 30 || document.documentElement.scrollY > 30) {
        buttonBackTop.style.display = "block";
    } else {
        buttonBackTop.style.display = "none";
    }
}

window.addEventListener("scroll", handleScroll);

window.addEventListener("resize", handleScroll);

window.addEventListener("load", handleScroll);
