fetch("js/products.json")
  .then((res) => res.json())
  .then((data) => {
    const grid = document.getElementById("productsGrid");
    const list = document.getElementById("productList");

    /* MAIN PRODUCT GRID */

    grid.innerHTML = data.products
      .slice(0, 4)
      .map(
        (product) => `
    
    <div class="product-card">

      <span class="sale-badge">Sale</span>

      <div class="product-image">
        <a href="checkout?id=${product.id}" class="product-link">
          <img src="${product.image}" alt="${product.name}">
        </a>
        
        <div class="product-actions">

          <a href="#"><i class="fa fa-shopping-cart"></i></a>

          <a href="#"><i class="fa fa-heart"></i></a>

          <a href="#" class="quick-view" data-id="${product.id}">
          <i class="fa fa-search"></i>
          </a>

        </div>
      </div>

      <h4><a href="checkout?id=${product.id}" class="product-name-link">${product.name}</a></h4>

      <div class="product-price">
        <span class="price">${product.price}</span>
        <span class="old-price">${product.old_price}</span>
      </div>

    </div>
    
    `,
      )
      .join("");

    /* SIDE PRODUCT LIST */

    list.innerHTML = data.products
      .slice(6)
      .map(
        (product) => `
    
    <div class="list-item">

      <img src="${product.image}">

      <div>
        <h6>${product.name}</h6>
        <span>${product.price}</span>
      </div>

    </div>

    `,
      )
      .join("");

    /* QUICK VIEW POPUP */

    document.querySelectorAll(".quick-view").forEach((btn) => {
      btn.addEventListener("click", function (e) {
        e.preventDefault();

        const id = this.dataset.id;

        const product = data.products.find((p) => p.id == id);

        openQuickView(product);
      });
    });
  });

function openQuickView(product) {
  document.getElementById("quickImage").src = product.image;
  document.getElementById("quickTitle").innerText = product.name;
  document.getElementById("quickPrice").innerText = product.price;
  document.getElementById("quickOldPrice").innerText = product.old_price;
  document.getElementById("quickDesc").innerText = product.description;

  document.getElementById("quickReviews").innerText = product.reviews;

  /* rating stars */

  let stars = "";
  for (let i = 1; i <= 5; i++) {
    stars +=
      i <= product.rating
        ? '<i class="fa-solid fa-star"></i>'
        : '<i class="fa-regular fa-star"></i>';
  }

  document.getElementById("quickStars").innerHTML = stars;

  /* view details link */

  document.getElementById("viewDetails").href =
    "checkout?id=" + product.id;

  // Add smooth transition for view details click
  document.getElementById("viewDetails").onclick = (e) => {
    e.preventDefault();
    const modal = document.getElementById("quickModal");
    modal.style.transition = "opacity 0.3s ease";
    modal.style.opacity = "0";

    setTimeout(() => {
      window.location.href = "checkout?id=" + product.id;
    }, 300);
  };

  document.getElementById("quickModal").classList.add("show");
}

document.addEventListener("click", function (e) {
  if (e.target.closest(".add-wishlist")) {
    e.preventDefault();

    const id = e.target.closest(".add-wishlist").dataset.id;

    let wishlist = JSON.parse(localStorage.getItem("wishlist")) || [];

    if (!wishlist.includes(id)) {
      wishlist.push(id);

      localStorage.setItem("wishlist", JSON.stringify(wishlist));

      alert("Added to wishlist ❤️");
    } else {
      alert("Already in wishlist");
    }
  }
});
