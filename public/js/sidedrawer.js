document.addEventListener("DOMContentLoaded", function () {
    const hamburgerButton = document.getElementById("hamburgerButton");
    const closeButton = document.getElementById("closeButton");
    const sidedrawer = document.getElementById("sidedrawer");
    const overlay = document.getElementById("overlay");
    const dropdownToggle = document.getElementById("dropdownToggle");
    const dropdownMenu = document.getElementById("dropdownMenu");

    // Show the sidedrawer and overlay when hamburger icon is clicked
    hamburgerButton.addEventListener("click", function () {
        sidedrawer.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
    });

    // Hide the sidedrawer and overlay when close icon or overlay is clicked
    closeButton.addEventListener("click", function () {
        sidedrawer.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });

    overlay.addEventListener("click", function () {
        sidedrawer.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });

    // Toggle dropdown visibility when the "Produk" button is clicked
    dropdownToggle.addEventListener("click", function () {
        dropdownMenu.classList.toggle("hidden");
    });

      // Close dropdown if clicked outside
      document.addEventListener("click", function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
});
