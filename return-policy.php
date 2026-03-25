<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Policy</title>
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
            <h2 class="legal-title">Return & Refund Policy</h2>
            <p class="legal-sub">Clear guidelines for returns, refunds, and cancellations for telehealth services and medical products.</p>

            <h4>1. Scope of This Policy</h4>
            <p>This policy applies to:</p>
            <ul>
                <li>Medical products and supplies purchased through our online shop</li>
                <li>Telehealth consultation services (virtual visits with healthcare providers)</li>
                <li>Prescription services and medication orders</li>
                <li>Digital products, if any (e.g., health records, reports)</li>
            </ul>
            <p>This policy does not cover services provided by third-party providers or pharmacies not directly affiliated with our platform.</p>

            <h4>2. Medical Product Returns</h4>
            <p><strong>Eligibility Criteria:</strong></p>
            <ul>
                <li>Products must be unused, unopened, and in their original packaging with all seals intact</li>
                <li>Products must be in the same condition as when received</li>
                <li>Return requests must be submitted within 30 days of delivery date</li>
                <li>Proof of purchase (order number) is required</li>
            </ul>

            <h4>3. Non-Returnable Items (For Health & Safety)</h4>
            <p>Due to health, safety, and regulatory requirements, the following items cannot be returned once opened or used:</p>
            <ul>
                <li>Prescription medications (once dispensed and shipped)</li>
                <li>Over-the-counter medications and supplements</li>
                <li>Personal care items (thermometers, blood pressure monitors, etc.) if the seal is broken</li>
                <li>Disposable medical supplies (masks, gloves, syringes, test strips, etc.)</li>
                <li>Items marked as "Non-Returnable" on the product page</li>
                <li>Products that have been implanted, applied, or used for medical purposes</li>
                <li>Items that are perishable or have expiration dates that have passed</li>
            </ul>
            <p><strong>Exception:</strong> If you receive a damaged, defective, or incorrect item, contact us within 48 hours of delivery for replacement or refund.</p>

            <h4>4. How to Request a Return</h4>
            <p>To initiate a return for eligible products:</p>
            <ol>
                <li>Log into your account and go to "Order History"</li>
                <li>Select the order containing the item(s) you wish to return</li>
                <li>Click "Request Return" and follow the prompts</li>
                <li>Print the return shipping label (if provided) and include the return authorization form</li>
                <li>Package the item securely with all original packaging and accessories</li>
                <li>Ship the package to the address provided (prepaid if eligible)</li>
            </ol>
            <p><strong>Note:</strong> Return shipping costs may apply unless the return is due to our error (wrong item, defective product). We will provide a prepaid shipping label for eligible returns.</p>

            <h4>5. Refund Process for Products</h4>
            <ul>
                <li><strong>Inspection:</strong> Returned items are inspected upon receipt to ensure they meet eligibility requirements</li>
                <li><strong>Refund Timeline:</strong> Once the return is approved and the item is received, refunds are processed within 5-10 business days</li>
                <li><strong>Refund Method:</strong> Refunds are issued to the original payment method. Store credit may be offered as an alternative</li>
                <li><strong>Partial Refunds:</strong> If only some items from an order are returned, the refund amount will be adjusted accordingly</li>
                <li><strong>Shipping Costs:</strong> Original shipping costs are refundable only if the return is due to our error. Return shipping costs are the responsibility of the customer unless otherwise stated</li>
            </ul>

            <h4>6. Consultation Service Cancellations & Refunds</h4>
            <p><strong>Cancellation by Patient:</strong></p>
            <ul>
                <li>More than 24 hours before scheduled appointment: Full refund</li>
                <li>12-24 hours before: 50% refund of consultation fee</li>
                <li>Less than 12 hours or no-show: No refund (full consultation fee applies)</li>
            </ul>
            <p><strong>Cancellation by Provider:</strong></p>
            <ul>
                <li>If we cancel your appointment, you will receive a full refund or the option to reschedule at no additional cost</li>
                <li>If a provider is late or unable to conduct the consultation, we will work with you to reschedule or issue a refund</li>
            </ul>
            <p><strong>Technical Issues:</strong></p>
            <ul>
                <li>If technical problems on our end prevent the consultation from occurring, we will reschedule or provide a full refund</li>
                <li>If technical issues are on your end (poor internet, device problems), our standard cancellation policy applies unless you reschedule</li>
            </ul>

            <h4>7. Prescription and Medication Refunds</h4>
            <p>Due to the nature of prescription medications:</p>
            <ul>
                <li>Once a prescription has been processed and sent to the pharmacy, it cannot be cancelled or returned</li>
                <li>If you have concerns about a prescribed medication, contact your provider before the prescription is filled</li>
                <li>Pharmacy policies regarding medication returns vary. Contact the pharmacy directly for their return policy</li>
                <li>We are not responsible for pharmacy return policies or medication disposal</li>
                <li>If a prescription error occurs on our part, we will work with you and the pharmacy to correct it at no cost</li>
            </ul>

            <h4>8. Subscription and Membership Services</h4>
            <p>If you have a subscription or membership plan:</p>
            <ul>
                <li>You may cancel your subscription at any time through your account settings or by contacting support</li>
                <li>Cancellation takes effect at the end of the current billing period; no refunds for partial months</li>
                <li>No prorated refunds for unused subscription time unless required by law</li>
                <li>All benefits remain active until the end of the paid period</li>
            </ul>

            <h4>9. Defective or Damaged Products</h4>
            <p>If you receive a defective, damaged, or incorrect product:</p>
            <ul>
                <li>Contact us within 48 hours of delivery with photos and your order number</li>
                <li>We will arrange for a replacement or full refund at our expense</li>
                <li>Do not attempt to use a defective medical device; contact us immediately</li>
                <li>For safety-critical items (e.g., medical devices, monitoring equipment), stop use immediately if you suspect a defect</li>
            </ul>

            <h4>10. Exchanges</h4>
            <p>We do not offer direct exchanges. To exchange an item for a different size, color, or model:</p>
            <ul>
                <li>Return the original item following the return process</li>
                <li>Place a new order for the desired item</li>
                <li>You will be refunded for the returned item once received</li>
                <li>If the new item is more expensive, you will be charged the difference</li>
            </ul>

            <h4>11. Late or Missing Returns</h4>
            <ul>
                <li>Return requests received after 30 days from delivery may be denied</li>
                <li>Items returned after the 30-day window may be sent back to you at your expense</li>
                <li>Refunds are only issued after we receive and inspect the returned item</li>
                <li>We are not responsible for lost or damaged return packages; use a trackable shipping method</li>
            </ul>

            <h4>12. Special Considerations for Medical Devices</h4>
            <p>For medical devices and equipment:</p>
            <ul>
                <li>Returns are subject to manufacturer warranties and restocking fees (if applicable)</li>
                <li>Calibrated devices must be returned in their original calibrated state</li>
                <li>Software-enabled devices must be returned with all original software and licenses</li>
                <li>Some devices may require a return authorization number (RMA) before shipping</li>
                <li>Read the product manual for specific return instructions for high-value medical equipment</li>
            </ul>

            <h4>13. Insurance and HSA/FSA Purchases</h4>
            <ul>
                <li>If you used insurance or HSA/FSA funds to purchase products, refunds may be issued to the original payment source</li>
                <li>You may be responsible for returning funds to your insurance or HSA/FSA administrator if required</li>
                <li>We recommend checking with your insurance or benefits provider about reimbursement rules</li>
            </ul>

            <h4>14. Disputes and Complaints</h4>
            <p>If you are not satisfied with our return or refund decision:</p>
            <ul>
                <li>Contact our customer support team to discuss your concerns</li>
                <li>Provide any additional documentation or information that supports your case</li>
                <li>We will review and respond within 5 business days</li>
                <li>If a resolution cannot be reached, you may contact your local consumer protection agency or seek legal remedies as applicable</li>
            </ul>

            <h4>15. Changes to This Policy</h4>
            <p>We reserve the right to update this Return Policy at any time. Changes will be posted on this page with an updated "Last Updated" date. The policy in effect at the time of your purchase will govern your return, unless a longer return period is offered voluntarily.</p>

            <h4>16. Contact Us</h4>
            <p>For return requests, refund inquiries, or questions about this policy:</p>
            <ul>
                <li>Email: returns@telehealthmedicine.com</li>
                <li>Phone: [Insert customer service phone number]</li>
                <li>Hours: Monday–Friday, [Insert hours], Saturday: [Insert hours if applicable]</li>
                <li>Online: Through your account dashboard or Contact page</li>
                <li>Mail: [Insert return address for products]</li>
            </ul>

            <p style="margin-top: 30px; font-size: 0.9em; color: #64748b;"><em>Last Updated: March 2025</em></p>
        </div>
    </div>
</section>

<?php include __DIR__ . '/partials/footer.php'; ?>
<script src="js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
