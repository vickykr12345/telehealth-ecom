<?php require_once __DIR__ . '/auth.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing Information</title>
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
            <h2 class="legal-title">Billing Information</h2>
            <p class="legal-sub">Comprehensive guide to payment processing, consultation fees, and prescription billing for telehealth services.</p>

            <h4>1. Consultation Fees and Pricing</h4>
            <p>Our telehealth consultation fees are transparent and vary based on:</p>
            <ul>
                <li><strong>Service Type:</strong> General consultations, specialist consultations, mental health services, or follow-up visits</li>
                <li><strong>Provider Specialty:</strong> Different specialties may have different fee structures</li>
                <li><strong>Duration:</strong> Standard (15-20 minutes) vs. extended consultations (30+ minutes)</li>
                <li><strong>Insurance Coverage:</strong> Fees may be partially or fully covered by your insurance plan</li>
            </ul>
            <p>All consultation fees are clearly displayed before you book an appointment. There are no hidden charges.</p>

            <h4>2. Accepted Payment Methods</h4>
            <p>We accept the following payment methods for your convenience:</p>
            <ul>
                <li><strong>Credit/Debit Cards:</strong> Visa, Mastercard, American Express, Discover</li>
                <li><strong>Digital Wallets:</strong> PayPal, Apple Pay, Google Pay (where available)</li>
                <li><strong>Bank Transfers:</strong> Direct bank transfers for corporate or insurance payments</li>
                <li><strong>Health Savings Accounts (HSA/FSA):strong> Most HSA and FSA cards are accepted</li>
                <li><strong>Insurance Billing:</strong> Direct billing to participating insurance providers</li>
            </ul>
            <p>All payment transactions are processed through secure, PCI-compliant payment gateways. We do not store your full credit card information on our servers.</p>

            <h4>3. Insurance and Billing</h4>
            <p>We work with many major insurance providers to make telehealth services accessible:</p>
            <ul>
                <li><strong>Insurance Verification:</strong> You can verify your insurance coverage during the booking process or through your account dashboard</li>
                <li><strong>Co-pays and Deductibles:</strong> Any applicable co-pay or deductible amounts will be displayed before you confirm your appointment</li>
                <li><strong>Direct Billing:</strong> For in-network insurance plans, we bill the insurance company directly. You are responsible for any non-covered services or out-of-network fees</li>
                <li><strong>Out-of-Network:</strong> For out-of-network services, you may need to pay at the time of service and submit a claim to your insurance for reimbursement</li>
                <li><strong>Insurance Documentation:</strong> We provide superbills and necessary documentation for insurance claims</li>
            </ul>
            <p><strong>Important:</strong> Insurance coverage varies by plan and state. It is your responsibility to understand your benefits. We recommend verifying your coverage before booking.</p>

            <h4>4. Prescription Billing</h4>
            <p>Prescription services are billed separately from consultations when applicable:</p>
            <ul>
                <li><strong>E-Prescribing:</strong> Electronic prescriptions are sent directly to your preferred pharmacy</li>
                <li><strong>Medication Costs:</strong> You are responsible for the cost of medications, which is determined by the pharmacy and your insurance</li>
                <li><strong>Prescription Refills:</strong> Refill requests may require a follow-up consultation, which incurs the standard consultation fee</li>
                <li><strong>Controlled Substances:</strong> Certain medications, especially controlled substances, may have additional requirements and may not be available through telehealth depending on state and federal regulations</li>
                <li><strong>Pharmacy Network:</strong> We partner with major pharmacy networks for seamless prescription fulfillment. You may choose your preferred pharmacy during the consultation</li>
            </ul>

            <h4>5. Medical Products and Supplies</h4>
            <p>When purchasing medical products through our shop:</p>
            <ul>
                <li><strong>Product Pricing:</strong> All product prices are listed clearly, including any applicable taxes</li>
                <li><strong>Shipping Costs:</strong> Shipping charges are calculated at checkout based on your location and selected shipping method</li>
                <li><strong>Payment Timing:</strong> Payment is required at the time of order for all product purchases</li>
                <li><strong>Insurance:</strong> Some medical products may be covered by insurance or HSA/FSA accounts. You may need to submit receipts for reimbursement</li>
                <li><strong>Bulk Orders:</strong> For bulk or corporate orders, contact our billing team for customized pricing</li>
            </ul>

            <h4>6. Payment Timing and Authorization</h4>
            <ul>
                <li><strong>Pre-payment:</strong> Most telehealth consultations require payment at the time of booking to secure your appointment</li>
                <li><strong>Post-consultation:</strong> For insurance patients, payment may be collected after insurance adjudication</li>
                <li><strong>Authorization Holds:</strong> We may place an authorization hold on your card at the time of booking. The actual charge will be processed after the consultation or according to your insurance processing timeline</li>
                <li><strong>Failed Payments:</strong> If a payment fails, you will be notified and given an opportunity to update your payment method. Unpaid balances may result in appointment cancellation or account suspension</li>
            </ul>

            <h4>7. Refunds and Cancellations</h4>
            <p>Our refund policy for consultations and products:</p>
            <ul>
                <li><strong>Cancellation by Patient:</strong>
                    <ul>
                        <li>Cancellations made at least 24 hours before the scheduled appointment: Full refund</li>
                        <li>Cancellations made less than 24 hours before: 50% refund of consultation fee</li>
                        <li>No-shows: No refund, full consultation fee applies</li>
                    </ul>
                </li>
                <li><strong>Cancellation by Provider:</strong> If we cancel your appointment, you will receive a full refund or the option to reschedule without additional charge</li>
                <li><strong>Technical Issues:</strong> If technical problems prevent the consultation from occurring, we will work with you to reschedule or issue a refund</li>
                <li><strong>Product Returns:</strong> Refer to our Return Policy for medical product return eligibility and refund procedures</li>
                <li><strong>Refund Processing:</strong> Refunds are typically processed within 5-10 business days to the original payment method</li>
            </ul>

            <h4>8. Billing Disputes and Inquiries</h4>
            <p>If you have a question or dispute regarding a charge:</p>
            <ul>
                <li>Contact our billing department within 60 days of the transaction date</li>
                <li>Provide your order/consultation ID, date of service, and a detailed description of the issue</li>
                <li>We will investigate and respond within 10 business days</li>
                <li>While a dispute is under investigation, please continue to make any required payments to avoid service interruption</li>
                <li>If you have an issue with a charge on your credit card statement, contact your card issuer immediately</li>
            </ul>

            <h4>9. Price Changes</h4>
            <p>We reserve the right to update our pricing at any time. However:</p>
            <ul>
                <li>Booked appointments are guaranteed at the price at the time of booking</li>
                <li>Price changes will apply to new bookings only</li>
                <li>Current patients will be notified of significant price changes via email or account notification</li>
                <li>Insurance contracts may have separate pricing agreements</li>
            </ul>

            <h4>10. Tax Information</h4>
            <ul>
                <li>All prices displayed are inclusive of applicable taxes unless otherwise noted</li>
                <li>Tax rates may vary based on your location and the type of service</li>
                <li>For tax-exempt organizations, please provide tax exemption documentation before payment</li>
                <li>We are not responsible for additional customs duties or taxes on international shipments</li>
            </ul>

            <h4>11. International Patients</h4>
            <p>For patients outside our primary service area:</p>
            <ul>
                <li>Payments must be made in USD</li>
                <li>International credit cards are accepted (additional bank fees may apply)</li>
                <li>Currency conversion rates are determined by your bank or card issuer</li>
                <li>Some services may not be available in certain countries due to licensing restrictions</li>
                <li>International shipping for medical products may have additional charges and longer delivery times</li>
            </ul>

            <h4>12. Security and Fraud Prevention</h4>
            <p>To protect your payment information and prevent fraud:</p>
            <ul>
                <li>All transactions are encrypted using SSL/TLS technology</li>
                <li>We employ fraud detection systems to monitor suspicious activity</li>
                <li>You may be asked to verify your identity for certain transactions</li>
                <li>We reserve the right to decline transactions that appear fraudulent</li>
                <li>Never share your payment details via email or phone unless you initiated the contact</li>
            </ul>

            <h4>13. Account Balances and Payment History</h4>
            <p>You can view your complete billing history and any outstanding balances through your account dashboard. We recommend reviewing your billing statements regularly to ensure accuracy. If you believe there is an error, contact us immediately.</p>

            <h4>14. Contact for Billing Questions</h4>
            <p>For any billing-related questions, please contact us:</p>
            <ul>
                <li>Email: billing@telehealthmedicine.com</li>
                <li>Phone: [Insert billing phone number]</li>
                <li>Hours: Monday–Friday, [Insert hours]</li>
                <li>Through your account dashboard messaging system</li>
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
