/* ===============================
NAVBAR SCROLL EFFECT
================================ */

// Support both legacy navbar and new global header navbar
const navbar =
  document.querySelector(".th-navbar") || document.querySelector(".glass-navbar");

window.addEventListener("scroll", () => {
  if (!navbar) return;
  if (window.scrollY > 40) {
    navbar.classList.add("scrolled");
  } else {
    navbar.classList.remove("scrolled");
  }
});

/* ============================
SCROLL REVEAL
============================ */

const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
  reveals.forEach((el) => {
    const windowHeight = window.innerHeight;
    const revealTop = el.getBoundingClientRect().top;

    if (revealTop < windowHeight - 80) {
      el.classList.add("active");
    }
  });
}

window.addEventListener("scroll", revealOnScroll);

/* ============================
COUNTER ANIMATION
============================ */

const counters = document.querySelectorAll(".counter");

counters.forEach((counter) => {
  const target = +counter.dataset.count;
  let count = 0;

  const update = () => {
    count++;

    counter.innerText = count + "+";

    if (count < target) {
      requestAnimationFrame(update);
    }
  };

  update();
});

/* ============================
TOAST / MESSAGE BOX + ANCHORS
============================ */

function thShowToast({ title, message, type = "success", timeout = 4500 }) {
  const toast = document.getElementById("thToast");
  if (!toast) return;

  const t = document.getElementById("thToastTitle");
  const m = document.getElementById("thToastMessage");
  const icon = toast.querySelector(".th-toast__icon");

  if (t) t.textContent = title || "Message";
  if (m) m.textContent = message || "";

  // Simple type styling (optional)
  if (icon) {
    if (type === "error") {
      icon.style.background = "rgba(239, 68, 68, 0.14)";
      icon.style.borderColor = "rgba(239, 68, 68, 0.35)";
      icon.style.color = "#b91c1c";
      icon.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
    } else {
      icon.style.background = "rgba(34, 193, 180, 0.16)";
      icon.style.borderColor = "rgba(34, 193, 180, 0.35)";
      icon.style.color = "#0b847e";
      icon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
    }
  }

  toast.classList.add("show");

  const closeBtn = document.getElementById("thToastClose");
  const hide = () => toast.classList.remove("show");
  if (closeBtn) closeBtn.onclick = hide;

  window.clearTimeout(window.__thToastTimer);
  window.__thToastTimer = window.setTimeout(hide, timeout);
}

// expose globally (used from other scripts)
window.thShowToast = thShowToast;

// Show appointment toast after redirect
(function () {
  const params = new URLSearchParams(window.location.search);
  const status = params.get("appointment");
  if (!status) return;

  if (status === "success") {
    thShowToast({
      title: "Appointment booked",
      message:
        "Thanks! Your appointment request has been received. We’ll contact you shortly.",
      type: "success",
    });
  } else if (status === "error") {
    thShowToast({
      title: "Booking failed",
      message: "Please try again. If the issue continues, contact support.",
      type: "error",
    });
  }
})();

// Smooth scroll for in-page anchors
document.addEventListener("click", (e) => {
  const a = e.target.closest('a[href^="#"], a[href*="#"]');
  if (!a) return;

  const href = a.getAttribute("href") || "";
  const hashIndex = href.indexOf("#");
  if (hashIndex === -1) return;

  const hash = href.slice(hashIndex);
  if (!hash || hash === "#") return;

  // Only handle same-page hash links
  if (href.startsWith("#") || href.startsWith(window.location.pathname)) {
    const target = document.querySelector(hash);
    if (target) {
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth", block: "start" });
    }
  }
});
