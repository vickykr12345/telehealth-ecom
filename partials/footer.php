<footer class="th-footer">
    <div class="container-fluid th-footer__fluid">
        <div class="th-footer__inner">
            <div class="th-footer__top">
            <div class="th-footer__brand">
                <a href="index.php" class="th-footer__logo" aria-label="Tele-Health Home">
                    <img src="images/Logo.png" alt="Tele-Health Logo">
                </a>
                <p class="th-footer__desc">
                    Modern tele-health and medical ecommerce experience with a clean, trustworthy design.
                </p>
                <div class="th-footer__meta">
                    <span><i class="fa-solid fa-location-dot"></i> 104 Albemarle Rd, USA</span>
                    <span><i class="fa-solid fa-envelope"></i> support@example.com</span>
                    <span><i class="fa-solid fa-phone"></i> +1 (800) 000-0000</span>
                </div>
            </div>

            <div class="th-footer__cols">
                <div class="th-footer__col">
                    <h6>Customer Support</h6>
                    <a href="return-policy">Return Policy</a>
                    <a href="shipping-policy">Shipping Policy</a>
                    <a href="billing-information">Billing Information</a>
                </div>
                <div class="th-footer__col">
                    <h6>Legal</h6>
                    <a href="terms">Terms &amp; Conditions</a>
                    <a href="privacy">Privacy Policy</a>
                    <a href="contact">Contact Us</a>
                </div>
                <div class="th-footer__col">
                    <h6>Payments</h6>
                    <div class="th-footer__badges">
                        <span class="th-badge">Visa</span>
                        <span class="th-badge">Mastercard</span>
                        <span class="th-badge">Amex</span>
                        <span class="th-badge">Discover</span>
                    </div>
                </div>
                <div class="th-footer__col">
                    <h6>Shipping</h6>
                    <div class="th-footer__badges">
                        <span class="th-badge">USPS</span>
                        <span class="th-badge">UPS</span>
                        <span class="th-badge">FedEx</span>
                        <span class="th-badge">DHL</span>
                    </div>
                </div>
            </div>
            </div>

            <div class="th-footer__bottom">
                <span>© <?php echo date('Y'); ?> Tele-Health. All rights reserved.</span>
            </div>
        </div>
    </div>
</footer>

<!-- toast / message box (global) -->
<div class="th-toast" id="thToast" aria-live="polite" aria-atomic="true">
    <div class="th-toast__icon" aria-hidden="true">
        <i class="fa-solid fa-circle-check"></i>
    </div>
    <div class="th-toast__content">
        <div class="th-toast__title" id="thToastTitle">Success</div>
        <div class="th-toast__message" id="thToastMessage">Done.</div>
    </div>
    <button class="th-toast__close" type="button" id="thToastClose" aria-label="Close message">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>

