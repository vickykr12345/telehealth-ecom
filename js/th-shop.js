let gtaProducts = [];
let gtaFiltered = [];
let gtaCurrentPage = 1;
const gtaProductsPerPage = 6;

const gtaFilters = {
  search: "",
  sort: "default",
  category: "all",
  maxPrice: Infinity,
};

// FETCH PRODUCTS
fetch("products-feed.php")
  .then((res) => res.json())
  .then((data) => {
    gtaProducts = data.products;
    setupPriceRange();
    initShop();
  });

function initShop() {
  setupEvents();
  applyFilters();
}

// EVENTS
function setupEvents() {
  // SEARCH
  document.getElementById("thSearch").addEventListener("input", (e) => {
    gtaFilters.search = e.target.value.trim().toLowerCase();
    gtaCurrentPage = 1;
    applyFilters();
  });

  // SORT
  document.getElementById("thSort").addEventListener("change", (e) => {
    gtaFilters.sort = e.target.value;
    gtaCurrentPage = 1;
    applyFilters();
  });

  // CATEGORY
  document.querySelectorAll("#thCategory li").forEach((li) => {
    li.addEventListener("click", () => {
      document
        .querySelectorAll("#thCategory li")
        .forEach((item) => item.classList.remove("active"));
      li.classList.add("active");

      gtaFilters.category = li.dataset.cat;
      gtaCurrentPage = 1;
      applyFilters();
    });
  });

  // PRICE RANGE
  const range = document.getElementById("thPriceRange");

  range.addEventListener("input", () => {
    const max = parseInt(range.value, 10);
    gtaFilters.maxPrice = max;
    gtaCurrentPage = 1;
    updatePriceLabels(max);
    applyFilters();
  });

  // RESET
  document.getElementById("thReset").addEventListener("click", () => {
    resetFilters();
  });
}

function setupPriceRange() {
  const range = document.getElementById("thPriceRange");
  const maxPrice = Math.ceil(
    Math.max(...gtaProducts.map((product) => getPrice(product)), 0),
  );

  range.max = String(maxPrice);
  range.value = String(maxPrice);
  gtaFilters.maxPrice = maxPrice;
  updatePriceLabels(maxPrice);

  const allCategory = document.querySelector('#thCategory li[data-cat="all"]');
  if (allCategory) {
    allCategory.classList.add("active");
  }
}

function applyFilters() {
  gtaFiltered = gtaProducts.filter((product) => {
    const matchesSearch = product.name
      .toLowerCase()
      .includes(gtaFilters.search);
    const matchesCategory =
      gtaFilters.category === "all" || product.category === gtaFilters.category;
    const matchesPrice = getPrice(product) <= gtaFilters.maxPrice;

    return matchesSearch && matchesCategory && matchesPrice;
  });

  if (gtaFilters.sort === "low") {
    gtaFiltered.sort((a, b) => getPrice(a) - getPrice(b));
  } else if (gtaFilters.sort === "high") {
    gtaFiltered.sort((a, b) => getPrice(b) - getPrice(a));
  } else {
    gtaFiltered.sort((a, b) => Number(b.id) - Number(a.id));
  }

  const totalPages = Math.max(
    1,
    Math.ceil(gtaFiltered.length / gtaProductsPerPage),
  );
  if (gtaCurrentPage > totalPages) {
    gtaCurrentPage = totalPages;
  }

  renderProducts();
  renderPagination(totalPages);
}

// RENDER
function renderProducts() {
  const grid = document.getElementById("gtaGrid");
  grid.innerHTML = "";

  if (gtaFiltered.length === 0) {
    document.getElementById("thCount").innerText = "Showing 0 products";
    grid.innerHTML = `<div class="th-shop-empty">No products found for the selected filters.</div>`;
    return;
  }

  const startIndex = (gtaCurrentPage - 1) * gtaProductsPerPage;
  const endIndex = Math.min(
    startIndex + gtaProductsPerPage,
    gtaFiltered.length,
  );

  document.getElementById("thCount").innerText =
    `Showing ${startIndex + 1}-${endIndex} of ${gtaFiltered.length} products`;

  gtaFiltered.slice(startIndex, endIndex).forEach((p) => {
    const card = document.createElement("div");
    card.className = "gta-card";

    card.innerHTML = `
      <div class="gta-img">
        <a href="checkout?id=${p.id}" class="gta-link" aria-label="View ${escapeHtml(p.name)} details">
          <img src="${p.image}" alt="${escapeHtml(p.name)}">
        </a>
      </div>

      <a href="checkout?id=${p.id}" class="gta-title gta-link">${escapeHtml(p.name)}</a>

      <div class="gta-price">
        ${escapeHtml(p.price)}
        ${p.old_price ? `<span class="gta-old">${escapeHtml(p.old_price)}</span>` : ""}
      </div>

      <a href="checkout?id=${p.id}" class="gta-btn">Buy Now</a>
    `;

    grid.appendChild(card);
  });
}

function renderPagination(totalPages) {
  const pagination = document.getElementById("thPagination");
  pagination.innerHTML = "";

  if (gtaFiltered.length === 0 || totalPages <= 1) {
    return;
  }

  pagination.appendChild(
    createPaginationButton("Prev", gtaCurrentPage === 1, () => {
      if (gtaCurrentPage > 1) {
        gtaCurrentPage -= 1;
        renderProducts();
        renderPagination(totalPages);
      }
    }),
  );

  for (let page = 1; page <= totalPages; page += 1) {
    const button = createPaginationButton(String(page), false, () => {
      gtaCurrentPage = page;
      renderProducts();
      renderPagination(totalPages);
    });

    if (page === gtaCurrentPage) {
      button.classList.add("active");
      button.setAttribute("aria-current", "page");
    }

    pagination.appendChild(button);
  }

  pagination.appendChild(
    createPaginationButton("Next", gtaCurrentPage === totalPages, () => {
      if (gtaCurrentPage < totalPages) {
        gtaCurrentPage += 1;
        renderProducts();
        renderPagination(totalPages);
      }
    }),
  );
}

function createPaginationButton(label, disabled, onClick) {
  const button = document.createElement("button");
  button.type = "button";
  button.className = "th-page-btn";
  button.textContent = label;
  button.disabled = disabled;
  button.addEventListener("click", onClick);
  return button;
}

function resetFilters() {
  gtaCurrentPage = 1;
  gtaFilters.search = "";
  gtaFilters.sort = "default";
  gtaFilters.category = "all";

  const range = document.getElementById("thPriceRange");
  const maxPrice = parseInt(range.max, 10);
  gtaFilters.maxPrice = maxPrice;

  document.getElementById("thSearch").value = "";
  document.getElementById("thSort").value = "default";
  range.value = String(maxPrice);
  updatePriceLabels(maxPrice);

  document
    .querySelectorAll("#thCategory li")
    .forEach((item) =>
      item.classList.toggle("active", item.dataset.cat === "all"),
    );

  applyFilters();
}

function updatePriceLabels(max) {
  document.getElementById("thFrom").innerText = "0";
  document.getElementById("thTo").innerText = String(max);
  document.getElementById("thMaxPrice").innerText = "$" + max;
}

// PRICE FIX
function getPrice(p) {
  return parseFloat(p.price.replace("$", ""));
}

function escapeHtml(value) {
  return String(value).replace(/[&<>"']/g, (char) => {
    const entities = {
      "&": "&amp;",
      "<": "&lt;",
      ">": "&gt;",
      '"': "&quot;",
      "'": "&#39;",
    };
    return entities[char];
  });
}
