function performSearch() {
    const searchQuery = document.getElementById("searchBar").value.toLowerCase();

    // Define a list of pages with keywords
    const pages = [
        { name: "Home", url: "index.html", keywords: ["home", "welcome", "main"] },
        { name: "hoodie", url: "hoodie.html", keywords: ["hoodie", "cap shirts", "sweaters"] },
        { name: "About Us", url: "about.html", keywords: ["about", "team", "company"] },
        { name: "Contact", url: "contact.html", keywords: ["contact", "email", "phone"] },
    ];

    // Search logic
    const result = pages.find(page =>
        page.keywords.some(keyword => keyword.includes(searchQuery))
    );

    if (result) {
        window.location.href = result.url; // Redirect to the matched page
    } else {
        alert("No pages found. Try a different keyword.");
    }
}
document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.banner3 .slider .item');
    const slider = document.querySelector('.banner3 .slider');

    items.forEach(item => {
        item.addEventListener('click', () => {
            // Remove 'clicked' class from all items
            items.forEach(i => i.classList.remove('clicked'));

            // Add 'clicked' class to the clicked item
            item.classList.add('clicked');

            // Prevent the clicked image from rotating with the slider
            slider.style.animationPlayState = 'running'; // Ensure carousel continues running
        });
    });
});

