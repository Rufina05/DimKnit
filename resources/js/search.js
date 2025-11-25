const searchInput = document.querySelector("#search");
const searchResults = document.querySelector("#search-results");
const searchBtn = document.querySelector("#search-btn");

if (!searchInput || !searchResults) {
    console.warn('Search elements not found');
} else {

function showResults() {
    const val = searchInput.value;
    if (val.length > 2) {
        fetch(`http://localhost:8000/api/search?q=${val}`)
            .then(res => res.json())
            .then(data => {
                let html = "";
                // Products clickable
                data.products.forEach(product => {
                    html += `
                        <a href="/product/${product.slug_en}" class="flex items-center gap-1 p-2 border border-gray-200 rounded-lg mb-2 hover:bg-gray-100 search-result" data-type="product" data-slug="${product.slug_en}">
                            <img class="h-[50px] aspect-square" src="http://localhost:8000/storage/products/${product.main_image}" alt="${product.name_en}">
                            <span>${product.name_en}</span>
                        </a>`;
                });
                // Categories clickable
                data.categories.forEach(category => {
                    html += `
                        <a href="/catalog?category=${category.id}" class="block p-2 border border-gray-200 rounded-lg mb-1 hover:bg-gray-100 search-result" data-type="category" data-id="${category.id}">
                            ${category.name_en}
                        </a>`;
                });
                searchResults.innerHTML = html;
                searchResults.classList.remove("hidden");
            });
    } else {
        searchResults.innerHTML = "";
        searchResults.classList.add("hidden");
    }
}

searchInput.addEventListener("input", showResults);
if (searchBtn) {
    searchBtn.addEventListener("click", showResults);
}

searchResults.addEventListener("click", function(e) {
    const target = e.target.closest(".search-result");
    if (target) {
        if (target.dataset.type === "product" && target.dataset.slug) {
            window.location.href = `/product/${target.dataset.slug}`;
        } else if (target.dataset.type === "category" && target.dataset.id) {
            window.location.href = `/catalog?category=${target.dataset.id}`;
        }
    }
});

}
