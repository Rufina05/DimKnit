// Desktop search elements
const searchInput = document.querySelector("#search");
const searchResults = document.querySelector("#search-results");
const searchBtn = document.querySelector("#search-btn");

// Mobile search elements
const searchInputMobile = document.querySelector("#search-mobile");
const searchResultsMobile = document.querySelector("#search-results-mobile");

// Helper function to fetch and show results
function showResults(inputElement, resultsElement) {
    const query = inputElement.value.trim();

    if (query.length > 2) {
        fetch(`/api/search?q=${encodeURIComponent(query)}`)
            .then(res => {
                if (!res.ok) throw new Error("Search request failed");
                return res.json();
            })
            .then(data => {
                let html = "";

                // Products
                if (data.products && data.products.length) {
                    data.products.forEach(product => {
                        html += `
                            <a href="/product/${product.slug_en}" class="flex items-center gap-3 p-2 border rounded mb-2 hover:bg-gray-100 transition-colors">
                                <img src="/storage/products/${product.main_image}" alt="${product.name_en}" class="h-[50px] w-[50px] object-cover rounded">
                                <div>
                                    <p class="font-medium">${product.name_en}</p>
                                    <p class="text-sm text-red-500">€${parseFloat(product.price).toFixed(2)}</p>
                                </div>
                            </a>
                        `;
                    });
                }

                // Categories
                if (data.categories && data.categories.length) {
                    html += '<div class="border-t pt-2 mt-2">';
                    data.categories.forEach(cat => {
                        html += `
                            <a href="/catalog?category=${cat.id}" class="block p-2 border rounded mb-1 hover:bg-gray-100 transition-colors">
                                📁 ${cat.name_en}
                            </a>
                        `;
                    });
                    html += '</div>';
                }

                if (!html) {
                    html = `<p class="p-3 text-gray-500">No results found</p>`;
                }

                resultsElement.innerHTML = html;
                resultsElement.classList.remove("hidden");
            })
            .catch(error => {
                console.error("Search error:", error);
                resultsElement.innerHTML = `<p class="p-3 text-red-500">Search failed. Try again.</p>`;
                resultsElement.classList.remove("hidden");
            });
    } else {
        resultsElement.innerHTML = "";
        resultsElement.classList.add("hidden");
    }
}

// ======================
// Desktop: only button click
// ======================
if (searchBtn && searchInput && searchResults) {
    searchBtn.addEventListener("click", () => {
        showResults(searchInput, searchResults);
    });
}

// ======================
// Mobile: only button click
// ======================
const searchBtnMobile = document.querySelector("#search-btn-mobile");
if (searchBtnMobile && searchInputMobile && searchResultsMobile) {
    searchBtnMobile.addEventListener("click", () => {
        showResults(searchInputMobile, searchResultsMobile);
    });
}

// ======================
// Close results when clicking outside
// ======================
document.addEventListener("click", e => {
    if (searchInput && searchResults &&
        !searchInput.contains(e.target) &&
        !searchResults.contains(e.target) &&
        (!searchBtn || !searchBtn.contains(e.target))
    ) {
        searchResults.classList.add("hidden");
    }

    if (searchInputMobile && searchResultsMobile &&
        !searchInputMobile.contains(e.target) &&
        !searchResultsMobile.contains(e.target) &&
        (!searchBtnMobile || !searchBtnMobile.contains(e.target))
    ) {
        searchResultsMobile.classList.add("hidden");
    }
});
