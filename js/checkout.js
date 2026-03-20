(() => {
  let product = null;
  let qty = 1;

  const els = {
    qty: document.getElementById("qty"),
    plus: document.getElementById("plus"),
    minus: document.getElementById("minus"),
    totalPrice: document.getElementById("totalPrice"),
    summaryQty: document.getElementById("summaryQty"),
    summaryAmount: document.getElementById("summaryAmount"),
    checkoutBtn: document.getElementById("checkoutBtn"),
    terms: document.getElementById("terms"),
    termsError: document.getElementById("termsError"),
    checkoutForm: document.getElementById("checkoutForm"),
    cardType: document.getElementById("cardType"),
    mainImage: document.getElementById("mainImage"),
    thumbSlider: document.getElementById("thumbSlider"),
  };

  const fieldIds = [
    "email",
    "phone",
    "firstName",
    "lastName",
    "address1",
    "address2",
    "country",
    "state",
    "city",
    "zip",
    "cardNumber",
    "expiry",
    "cvv",
  ];

  function getField(id) {
    return document.getElementById(id);
  }

  function digitsOnly(v) {
    return (v || "").toString().replace(/\D/g, "");
  }

  function showFieldError(input, msg) {
    if (!input) return;
    input.classList.add("is-invalid");
    let err = input.nextElementSibling;
    if (!err || !err.classList || !err.classList.contains("field-error")) {
      err = document.createElement("div");
      err.className = "field-error";
      input.insertAdjacentElement("afterend", err);
    }
    err.textContent = msg;
  }

  function clearFieldError(input) {
    if (!input) return;
    input.classList.remove("is-invalid");
    const err = input.nextElementSibling;
    if (err && err.classList && err.classList.contains("field-error")) {
      err.remove();
    }
  }

  function setTermsError(msg) {
    if (!els.termsError) return;
    els.termsError.textContent = msg || "";
  }

  function isValidEmail(v) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test((v || "").trim());
  }

  function isValidPhone(v) {
    const d = digitsOnly(v);
    return d.length === 10;
  }

  function isValidZip(zip, country) {
    const z = (zip || "").trim();
    if (!z) return false;
    const c = (country || "").toUpperCase();
    if (c === "USA") {
      return /^\d{5}(-\d{4})?$/.test(z);
    }
    return /^[A-Za-z0-9\- ]{3,10}$/.test(z);
  }

  function luhnCheck(cardNumberDigits) {
    let sum = 0;
    let shouldDouble = false;
    for (let i = cardNumberDigits.length - 1; i >= 0; i--) {
      let digit = parseInt(cardNumberDigits[i], 10);
      if (shouldDouble) {
        digit *= 2;
        if (digit > 9) digit -= 9;
      }
      sum += digit;
      shouldDouble = !shouldDouble;
    }
    return sum % 10 === 0;
  }

  function detectCardType(d) {
    if (/^4/.test(d)) return "Visa";
    if (/^5[1-5]/.test(d)) return "Mastercard";
    if (/^3[47]/.test(d)) return "Amex";
    if (/^6/.test(d)) return "Discover";
    return "";
  }

  function isValidCardNumber(v) {
    const d = digitsOnly(v);
    if (d.length < 13 || d.length > 19) return false;
    return luhnCheck(d);
  }

  function isValidExpiry(v) {
    const raw = (v || "").trim();
    if (!/^\d{2}\/\d{2}$/.test(raw)) return false;
    const [mmStr, yyStr] = raw.split("/");
    const mm = parseInt(mmStr, 10);
    const yy = parseInt(yyStr, 10);
    if (mm < 1 || mm > 12) return false;

    // Not in the past (basic)
    const now = new Date();
    const curYY = now.getFullYear() % 100;
    const curMM = now.getMonth() + 1;
    if (yy < curYY) return false;
    if (yy === curYY && mm < curMM) return false;
    return true;
  }

  function isValidCvv(cvv, cardNumber) {
    const d = digitsOnly(cvv);
    const cardDigits = digitsOnly(cardNumber);
    const type = detectCardType(cardDigits);
    if (type === "Amex") return /^\d{4}$/.test(d);
    return /^\d{3}$/.test(d);
  }

  function moneyToNumber(price) {
    const n = parseFloat((price || "").toString().replace(/[^0-9.]/g, ""));
    return Number.isFinite(n) ? n : 0;
  }

  function updateSummary() {
    if (!product) return;
    const unit = moneyToNumber(product.price);
    const total = (unit * qty).toFixed(2);
    const display = `$${total}`;

    if (els.qty) els.qty.textContent = String(qty);
    if (els.summaryQty) els.summaryQty.textContent = String(qty);
    if (els.totalPrice) els.totalPrice.textContent = display;
    if (els.summaryAmount) els.summaryAmount.textContent = display;
  }

  function getGalleryImages() {
    if (!product) return [];

    const rawImages = [product.image].concat(
      Array.isArray(product.image_variations) ? product.image_variations : [],
    );

    return rawImages.filter((image, index, items) => {
      const value = (image || "").toString().trim();
      return value !== "" && items.indexOf(image) === index;
    });
  }

  function setActiveGalleryImage(imagePath) {
    if (els.mainImage) {
      els.mainImage.src = imagePath;
      els.mainImage.alt = product && product.name ? product.name : "Product image";
    }

    if (!els.thumbSlider) return;
    els.thumbSlider.querySelectorAll(".thumb-slider__item").forEach((button) => {
      button.classList.toggle("is-active", button.dataset.image === imagePath);
    });
  }

  function renderGallery() {
    const galleryImages = getGalleryImages();

    if (els.mainImage && galleryImages.length > 0) {
      els.mainImage.src = galleryImages[0];
      els.mainImage.alt = product && product.name ? product.name : "Product image";
    }

    if (!els.thumbSlider) return;

    if (galleryImages.length <= 1) {
      els.thumbSlider.innerHTML = "";
      els.thumbSlider.classList.add("is-hidden");
      return;
    }

    els.thumbSlider.classList.remove("is-hidden");
    els.thumbSlider.innerHTML = "";

    galleryImages.forEach((imagePath, index) => {
      const button = document.createElement("button");
      button.type = "button";
      button.className = "thumb-slider__item";
      button.dataset.image = imagePath;
      button.setAttribute(
        "aria-label",
        `Show product image ${index + 1}`,
      );

      const image = document.createElement("img");
      image.src = imagePath;
      image.alt = product && product.name ? product.name : "Product thumbnail";

      button.appendChild(image);
      button.addEventListener("click", () => setActiveGalleryImage(imagePath));
      els.thumbSlider.appendChild(button);
    });

    setActiveGalleryImage(galleryImages[0]);
  }

  function validateAll() {
    let ok = true;

    const email = getField("email");
    const phone = getField("phone");
    const firstName = getField("firstName");
    const lastName = getField("lastName");
    const address1 = getField("address1");
    const country = getField("country");
    const state = getField("state");
    const city = getField("city");
    const zip = getField("zip");
    const cardNumber = getField("cardNumber");
    const expiry = getField("expiry");
    const cvv = getField("cvv");

    // Required checks
    const required = [
      [email, "Email is required."],
      [phone, "Phone is required."],
      [firstName, "First name is required."],
      [lastName, "Last name is required."],
      [address1, "Address line 1 is required."],
      [country, "Country is required."],
      [state, "State is required."],
      [city, "City is required."],
      [zip, "Zip code is required."],
      [cardNumber, "Card number is required."],
      [expiry, "Expiry is required."],
      [cvv, "CVV is required."],
    ];

    required.forEach(([input, msg]) => {
      if (!input) return;
      if ((input.value || "").trim() === "") {
        ok = false;
        showFieldError(input, msg);
      } else {
        clearFieldError(input);
      }
    });

    // Format-specific validations
    if (email && email.value.trim() && !isValidEmail(email.value)) {
      ok = false;
      showFieldError(email, "Please enter a valid email address.");
    }

    if (phone && phone.value.trim() && !isValidPhone(phone.value)) {
      ok = false;
      showFieldError(phone, "Phone number must be 10 digits.");
    }

    if (zip && zip.value.trim() && country) {
      if (!isValidZip(zip.value, country.value)) {
        ok = false;
        showFieldError(
          zip,
          country.value === "USA"
            ? "Enter a valid ZIP (e.g. 12345 or 12345-6789)."
            : "Enter a valid postal code.",
        );
      }
    }

    if (
      cardNumber &&
      cardNumber.value.trim() &&
      !isValidCardNumber(cardNumber.value)
    ) {
      ok = false;
      showFieldError(cardNumber, "Enter a valid card number.");
    }

    if (expiry && expiry.value.trim() && !isValidExpiry(expiry.value)) {
      ok = false;
      showFieldError(expiry, "Enter a valid expiry (MM/YY).");
    }

    if (cvv && cvv.value.trim() && cardNumber) {
      if (!isValidCvv(cvv.value, cardNumber.value)) {
        ok = false;
        showFieldError(cvv, "Enter a valid CVV.");
      }
    }

    // Terms checkbox
    if (els.terms && !els.terms.checked) {
      ok = false;
      setTermsError("Please accept the Terms & Conditions and Privacy Policy.");
    } else {
      setTermsError("");
    }

    return ok;
  }

  function fillHiddenForm() {
    const map = {
      qty: "formQty",
      email: "formEmail",
      phone: "formPhone",
      firstName: "formFirstName",
      lastName: "formLastName",
      address1: "formAddress1",
      address2: "formAddress2",
      country: "formCountry",
      state: "formState",
      city: "formCity",
      zip: "formZip",
      cardNumber: "formCardNumber",
      expiry: "formExpiry",
      cvv: "formCvv",
    };

    Object.entries(map).forEach(([visibleId, hiddenId]) => {
      const hidden = document.getElementById(hiddenId);
      if (!hidden) return;
      if (visibleId === "qty") {
        hidden.value = String(qty);
        return;
      }
      const visible = document.getElementById(visibleId);
      hidden.value = visible ? visible.value : "";
    });
  }

  function wireTabs() {
    document.querySelectorAll(".tabs button").forEach((btn) => {
      btn.addEventListener("click", () => {
        document
          .querySelectorAll(".tabs button")
          .forEach((b) => b.classList.remove("active"));
        document
          .querySelectorAll(".tab-content")
          .forEach((c) => c.classList.remove("active"));

        btn.classList.add("active");
        const tabId = btn.dataset.tab;
        const content = document.getElementById(tabId);
        if (content) content.classList.add("active");
      });
    });
  }

  function wireQuantity() {
    if (els.plus) {
      els.plus.addEventListener("click", () => {
        if (qty < 99) qty += 1;
        updateSummary();
      });
    }
    if (els.minus) {
      els.minus.addEventListener("click", () => {
        if (qty > 1) qty -= 1;
        updateSummary();
      });
    }
  }

  function wireInputFormatting() {
    const phone = getField("phone");
    if (phone) {
      phone.addEventListener("input", (e) => {
        e.target.value = digitsOnly(e.target.value).slice(0, 10);
      });
    }

    const zip = getField("zip");
    if (zip) {
      zip.addEventListener("input", () => clearFieldError(zip));
    }

    const expiry = getField("expiry");
    if (expiry) {
      expiry.addEventListener("input", (e) => {
        let v = digitsOnly(e.target.value).slice(0, 4);
        if (v.length > 2) v = v.slice(0, 2) + "/" + v.slice(2);
        e.target.value = v;
      });
    }

    const cardNumber = getField("cardNumber");
    if (cardNumber) {
      cardNumber.addEventListener("input", (e) => {
        const d = digitsOnly(e.target.value).slice(0, 19);
        const groups = d.match(/.{1,4}/g) || [];
        e.target.value = groups.join(" ");

        const type = detectCardType(d);
        if (els.cardType) els.cardType.textContent = type;
      });
    }

    const cvv = getField("cvv");
    if (cvv) {
      cvv.addEventListener("input", (e) => {
        e.target.value = digitsOnly(e.target.value).slice(0, 4);
      });
    }

    // Clear errors on typing
    fieldIds.forEach((id) => {
      const f = getField(id);
      if (!f) return;
      f.addEventListener("input", () => clearFieldError(f));
      f.addEventListener("blur", () => {
        // light re-check on blur
        if (f.value.trim() !== "") clearFieldError(f);
      });
    });

    if (els.terms) {
      els.terms.addEventListener("change", () => setTermsError(""));
    }
  }

  async function loadProductsJson() {
    const res = await fetch("products-feed.php");
    if (!res.ok) throw new Error("Failed to load products feed");
    return res.json();
  }

  async function initRelated() {
    try {
      // Prefer server-provided related products (from DB)
      if (
        Array.isArray(window.relatedProducts) &&
        window.relatedProducts.length
      ) {
        renderRelated(window.relatedProducts);
        return;
      }

      const data = await loadProductsJson();
      const params = new URLSearchParams(window.location.search);
      const id = params.get("id");
      const related = (data.products || [])
        .filter((p) => String(p.id) !== String(id))
        .slice(0, 3);
      renderRelated(related);
    } catch (e) {
      // silent fail
    }
  }

  function renderRelated(related) {
    const box = document.getElementById("relatedProducts");
    if (!box) return;
    box.innerHTML = "";

    related.forEach((p) => {
      const image = p.image || "";
      const name = p.name || "";
      const price = p.price || "";
      box.innerHTML += `
<div class="related-card">
  <a class="related-link" href="checkout?id=${p.id}">
    <img src="${image}" alt="${name}">
    <p class="related-product-name">${name}</p>
    <p class="related-product-price">${price}</p>
    <span class="related-cta">Learn more</span>
  </a>
</div>`;
    });
  }

  function wireCheckout() {
    if (!els.checkoutBtn || !els.checkoutForm) return;

    els.checkoutBtn.addEventListener("click", (e) => {
      e.preventDefault();
      if (window.checkoutAuth && !window.checkoutAuth.isLoggedIn) {
        if (typeof window.thShowToast === "function") {
          window.thShowToast({
            title: "Login required",
            message:
              "You have to log in or create your account before purchasing this product.",
            type: "error",
            timeout: 2800,
          });
        }

        window.setTimeout(() => {
          window.location.href = window.checkoutAuth.loginUrl;
        }, 1200);
        return;
      }

      const ok = validateAll();
      if (!ok) {
        if (typeof window.thShowToast === "function") {
          window.thShowToast({
            title: "Please check your details",
            message:
              "Some fields are missing or invalid. Please fix them and try again.",
            type: "error",
          });
        }
        return;
      }
      fillHiddenForm();
      els.checkoutForm.submit();
    });
  }

  function initProductFromServer() {
    if (typeof window.productData === "undefined") return false;
    product = window.productData;
    return true;
  }

  async function initProductFromJson() {
    const params = new URLSearchParams(window.location.search);
    const productId = params.get("id");
    const data = await loadProductsJson();
    product =
      (data.products || []).find((p) => String(p.id) === String(productId)) ||
      null;
  }

  async function init() {
    // Product init
    if (!initProductFromServer()) {
      try {
        await initProductFromJson();
      } catch {
        product = null;
      }
    }

    renderGallery();
    updateSummary();
    wireTabs();
    wireQuantity();
    wireInputFormatting();
    wireCheckout();
    initRelated();
  }

  document.addEventListener("DOMContentLoaded", init);
})();
