const toggleForm = () => {
    const container = document.querySelector(".container"); const section = document.querySelector("section");

    if (container.classList.contains("active")) {
        container.classList.remove("active");
        section.setAttribute("style", "background-color: #92e8d1")
        return;
    }
    container.classList.add("active");
    section.setAttribute("style", "background-color: #92e8d1")
}

const toggleLinks = Array.from(document.querySelectorAll(".signup a"));

toggleLinks.forEach(toggleLink => {
    toggleLink.addEventListener("click", toggleForm)
})