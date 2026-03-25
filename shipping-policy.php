<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Policy</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .legal-wrap{padding:70px 0 40px}
        .legal-card{max-width:980px;margin:0 auto;background:rgba(255,255,255,.78);backdrop-filter:blur(18px);border:1px solid rgba(148,163,184,.25);border-radius:26px;box-shadow:0 30px 90px rgba(15,23,42,.12);padding:44px 34px}
        .legal-title{font-weight:900;letter-spacing:.06em;text-transform:uppercase;margin:0 0 10px}
        .legal-sub{color:#475569;font-weight:700;margin-bottom:22px}
        .legal-card h4{margin-top:18px;font-weight:900}
        .legal-card p,.legal-card li{color:#475569;font-weight:600;line-height:1.7}
        .legal-card ul{padding-left:18px}
        @media(max-width:576px){.legal-card{padding:28px 18px}}
    </style>
</head>
<body>
<?php include __DIR__ . '/partials/header.php'; ?>

<section class="legal-wrap">
    <div class="container">
        <div class="legal-card">
            <h2 class="legal-title">Shipping & Delivery Policy</h2>
            <p class="legal-sub">Comprehensive information about shipping methods, delivery timelines, and special handling for medical products.</p>

            <h4>1. Order Processing and Handling</h4>
            <ul>
                <li><strong>Processing Time:</strong> Most orders are processed within 1-2 business days after payment confirmation</li>
                <li><strong>Prescription Orders:</strong> Orders requiring prescription verification may take additional time (typically 1-3 business days) while we verify your prescription with your healthcare provider</li>
                <li><strong>Business Days:</strong> Processing excludes weekends and public holidays</li>
                <li><strong>Order Confirmation:</strong> You will receive an email confirmation when your order is placed and another when it ships</li>
                <li><strong>Inventory:</strong> If an item is out of stock, you will be notified immediately. Backordered items will be shipped as soon as available, or you may cancel for a full refund</li>
            </ul>

            <h4>2. Available Shipping Methods</h4>
            <p>We offer the following shipping options (availability varies by location):</p>
            <ul>
                <li><strong>Standard Shipping:</strong> 5-7 business days delivery via USPS, UPS, or FedEx</li>
                <li><strong>Expedited Shipping:</strong> 2-3 business days delivery (additional charges apply)</li>
                <li><strong>Express Shipping:</strong> 1-2 business days delivery (higher rates, available for select locations)</li>
                <li><strong>Same-Day Delivery:</strong> Available in select metropolitan areas for orders placed before cutoff time (typically 12 PM local time)</li>
                <li><strong>Pharmacy Pickup:</strong> For prescription medications, you may choose to pick up at a partner pharmacy location</li>
            </ul>
            <p>Shipping methods and rates are displayed at checkout before payment.</p>

            <h4>3. Shipping Costs</h4>
            <ul>
                <li><strong>Free Shipping:</strong> Available on orders over $50 (standard shipping only, continental US)</li>
                <li><strong>Flat Rates:</strong> Standard flat rates apply based on shipping method and destination</li>
                <li><strong>Weight-Based:</strong> Some heavy or oversized items may have additional shipping charges</li>
                <li><strong>International Shipping:</strong> Calculated at checkout based on destination, weight, and customs requirements</li>
                <li><strong>Rush Handling:</strong> Additional fees may apply for rush processing or same-day shipping</li>
            </ul>

            <h4>4. Delivery Timeframes and Estimates</h4>
            <p><strong>Important Notes:</strong></p>
            <ul>
                <li>Delivery times are estimates only and not guaranteed</li>
                <li>Times start from the shipping date, not the order date</li>
                <li>Delays may occur due to weather, carrier issues, holidays, or incorrect address information</li>
                <li>We are not responsible for delays caused by carriers or external factors</li>
                <li>Peak seasons (holidays, flu season) may experience longer delivery times</li>
            </ul>
            <p><strong>Typical Delivery Windows:</strong></p>
            <ul>
                <li>Standard: 5-7 business days (most locations)</li>
                <li>Expedited: 2-3 business days</li>
                <li>Express: 1-2 business days (major cities only)</li>
                <li>Prescription medications: 3-5 business days (may vary by pharmacy)</li>
            </ul>

            <h4>5. Special Handling for Medical Products</h4>
            <p>Certain medical products require special shipping considerations:</p>
            <ul>
                <li><strong>Temperature-Sensitive Items:</strong> Insulin, some vaccines, and temperature-sensitive medications require cold chain shipping. Additional packaging and shipping fees may apply</li>
                <li><strong>Hazardous Materials:</strong> Items like oxygen canisters or certain chemicals require special handling and may have shipping restrictions</li>
                <li><strong>Fragile Equipment:</strong> Medical devices (blood pressure monitors, glucometers, etc.) are shipped with protective packaging</li>
                <li><strong>Perishable Items:</strong> Some medical supplies have expiration dates. We ship these with priority methods to ensure freshness</li>
                <li><strong>Controlled Substances:</strong> Certain prescription medications have additional shipping requirements and may not be available for shipment to all locations</li>
            </ul>

            <h4>6. Shipping Restrictions</h4>
            <p>We cannot ship to certain locations or certain products to specific areas due to:</p>
            <ul>
                <li>State and federal regulations (especially for controlled substances)</li>
                <li>Carrier restrictions (PO Boxes, military addresses, etc.)</li>
                <li>International export/import laws</li>
                <li>Product-specific licensing requirements</li>
            </ul>
            <p>If an item cannot be shipped to your address, you will be notified at checkout. Some products may only be available for in-store pickup or local delivery.</p>

            <h4>7. International Shipping</h4>
            <ul>
                <li><strong>Eligibility:</strong> Not all products are eligible for international shipping. Check product details or contact us</li>
                <li><strong>Customs and Duties:</strong> International orders may be subject to customs duties, taxes, and import fees. These are the responsibility of the recipient and are not included in our shipping charges</li>
                <li><strong>Documentation:</strong> We provide necessary commercial invoices and documentation for customs clearance</li>
                <li><strong>Shipping Times:</strong> International delivery typically takes 7-21 business days depending on destination and customs processing</li>
                <li><strong>Restricted Countries:</strong> Some countries may have restrictions on medical products. We comply with all export control regulations</li>
                <li><strong>Returns:</strong> International returns are more complex. Contact us before returning any international order</li>
            </ul>

            <h4>8. Tracking and Shipment Notifications</h4>
            <ul>
                <li><strong>Tracking Number:</strong> A tracking number is sent via email when your order ships</li>
                <li><strong>Delivery Confirmation:</strong> Most shipments include delivery confirmation and signature tracking for high-value items</li>
                <li><strong>Carrier Websites:</strong> You can track your package on the carrier's website (USPS, UPS, FedEx)</li>
                <li><strong>Delivery Updates:</strong> Sign up for carrier notifications for real-time updates</li>
                <li><strong>Missing Packages:</strong> If your package shows as delivered but you haven't received it, check with neighbors, building management, or contact the carrier before reaching out to us</li>
            </ul>

            <h4>9. Shipping Address Requirements</h4>
            <ul>
                <li><strong>Accuracy:</strong> Double-check your shipping address before submitting your order. We are not responsible for packages sent to incorrect addresses</li>
                <li><strong>Address Changes:</strong> Address changes can be made within 2 hours of order placement by contacting support. Once an order has shipped, address changes are not possible</li>
                <li><strong>PO Boxes:</strong> Some carriers do not deliver to PO Boxes. We may use USPS for PO Box deliveries when available</li>
                <li><strong>Military Addresses:</strong> APO/FPO/DPO addresses are accepted with appropriate shipping methods</li>
                <li><strong>Signature Required:</strong> Some shipments (especially high-value items or controlled substances) require a signature upon delivery</li>
            </ul>

            <h4>10. Delivery Attempts and Failed Deliveries</h4>
            <ul>
                <li><strong>Multiple Attempts:</strong> Carriers typically make 1-3 delivery attempts</li>
                <li><strong>Hold for Pickup:</strong> If delivery fails, packages may be held at a carrier location for pickup</li>
                <li><strong>Return to Sender:</strong> Packages that cannot be delivered will be returned to us after the carrier's holding period</li>
                <li><strong>Reshipping:</strong> If a package is returned due to delivery issues, you may be charged a return shipping fee and a reshipping fee to have it sent again</li>
                <li><strong>Missed Delivery:</strong> If you miss a delivery, follow the carrier's instructions for redelivery or pickup</li>
            </ul>

            <h4>11. Damaged or Lost Packages</h4>
            <p><strong>Damaged Packages:</strong></p>
            <ul>
                <li>If your package arrives damaged, refuse delivery or document the damage with photos</li>
                <li>Contact us within 48 hours of receipt with photos of the damage and packaging</li>
                <li>We will file a claim with the carrier and arrange for a replacement or refund</li>
            </ul>
            <p><strong>Lost Packages:</strong></p>
            <ul>
                <li>If your package shows as delivered but you haven't received it, allow 24 hours (some carriers mark as delivered before actual delivery)</li>
                <li>Check with neighbors, building management, or package rooms</li>
                <li>Contact the carrier to verify delivery details and location</li>
                <li>If the package is confirmed lost, we will file a claim with the carrier (typically takes 7-14 business days)</li>
                <li>Once a claim is approved, we will replace the order or issue a refund</li>
            </ul>

            <h4>12. Insurance and Liability</h4>
            <ul>
                <li><strong>Automatic Insurance:</strong> All shipments are automatically insured up to $100</li>
                <li><strong>Additional Coverage:</strong> For high-value items (over $500), additional insurance may be purchased at checkout</li>
                <li><strong>Carrier Liability:</strong> Our liability for lost or damaged packages is limited to the value of the order, not exceeding the carrier's maximum liability</li>
                <li><strong>Claim Process:</strong> Claims for lost or damaged packages must be filed within 30 days of expected delivery date</li>
            </ul>

            <h4>13. Pharmacy and Prescription Delivery</h4>
            <p>For prescription medications filled through our partner pharmacies:</p>
            <ul>
                <li><strong>Pharmacy Processing:</strong> After your prescription is approved, it is sent to a licensed pharmacy for fulfillment</li>
                <li><strong>Pharmacy Shipping:</strong> The pharmacy handles shipping using their own carriers and policies</li>
                <li><strong>Delivery Times:</strong> Pharmacy deliveries typically take 3-7 business days, but may vary</li>
                <li><strong>Signature Required:</strong> Most prescription medications require an adult signature upon delivery</li>
                <li><strong>Pharmacy Policies:</strong> Pharmacy-specific shipping policies apply. Contact the pharmacy directly for their delivery procedures</li>
                <li><strong>Delivery Issues:</strong> If you have issues with pharmacy delivery, contact the pharmacy first, then our support if needed</li>
            </ul>

            <h4>14. Local Delivery and Pickup Options</h4>
            <ul>
                <li><strong>Local Delivery:</strong> In select areas, we offer same-day or next-day local delivery for eligible products</li>
                <li><strong>Curbside Pickup:</strong> Available at our physical location (if applicable). Schedule pickup time through your account</li>
                <li><strong>In-Store Pickup:</strong> Pick up your order at our clinic or pharmacy location within 24 hours of notification</li>
                <li><strong>Identification:</strong> For prescription medications, bring valid ID and prescription information for pickup</li>
            </ul>

            <h4>15. Environmental and Disposal Considerations</h4>
            <ul>
                <li><strong>Eco-Friendly Packaging:</strong> We use recyclable and biodegradable packaging materials when possible</li>
                <li><strong>Cold Packs:</strong> Gel cold packs are reusable. Dispose of responsibly</li>
                <li><strong>Medication Disposal:</strong> Do not dispose of medications in regular trash. Use drug take-back programs or follow FDA disposal guidelines</li>
                <li><strong>Recycling:</strong> Please recycle packaging materials according to local regulations</li>
            </ul>

            <h4>16. Force Majeure</h4>
            <p>We are not liable for delays or failures in shipping caused by events beyond our reasonable control, including but not limited to:</p>
            <ul>
                <li>Natural disasters, severe weather, or acts of God</li>
                <li>Pandemics, public health emergencies, or government restrictions</li>
                <li>Labor disputes, strikes, or carrier disruptions</li>
                <li>War, terrorism, or civil unrest</li>
                <li>System failures or cyber attacks</li>
            </ul>

            <h4>17. Contact for Shipping Questions</h4>
            <p>For shipping inquiries, tracking issues, or delivery problems:</p>
            <ul>
                <li>Email: shipping@telehealthmedicine.com</li>
                <li>Phone: [Insert shipping support phone number]</li>
                <li>Hours: Monday–Friday, [Insert hours], Saturday: [Insert hours if applicable]</li>
                <li>Online: Through your account dashboard or Contact page</li>
                <li>Have your order number ready when contacting support</li>
            </ul>

            <h4>18. Policy Updates</h4>
            <p>We may update this Shipping Policy to reflect changes in our operations, carrier services, or regulations. The updated policy will be posted on this page with a revised "Last Updated" date. Continued use of our shipping services after changes constitutes acceptance of the updated policy.</p>

            <p style="margin-top: 30px; font-size: 0.9em; color: #64748b;"><em>Last Updated: March 2025</em></p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
