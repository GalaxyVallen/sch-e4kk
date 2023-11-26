function scrollHeader() {
    const header = document.getElementById("header");
    // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
    if (this.scrollY >= 50) {
        header.classList.add("py-3");
        header.classList.remove("py-6");
    } else {
        header.classList.add("py-6");
        header.classList.remove("py-3");
    }
}
window.addEventListener("scroll", scrollHeader);
const dropdon = document.getElementById("dropdownNavbarLink");

dropdon.addEventListener("click", function (e) {
    e.stopPropagation();

    if (dropdon.classList.contains("bg-gray-900")) {
        dropdon.classList.remove("text-white", "bg-gray-900");
        dropdon.classList.add(
            "hover:bg-gray-100",
            "dark:hover:bg-gray-700",
            "dark:hover:text-white"
        );
    } else {
        dropdon.classList.add("text-white", "bg-gray-900");
        dropdon.classList.remove(
            "hover:bg-gray-100",
            "dark:hover:bg-gray-700",
            "dark:hover:text-white"
        );
    }
});

document.addEventListener("click", function () {
    dropdon.classList.remove("text-white", "bg-gray-900");
    dropdon.classList.add(
        "hover:bg-gray-100",
        "dark:hover:bg-gray-700",
        "dark:hover:text-white"
    );
});
