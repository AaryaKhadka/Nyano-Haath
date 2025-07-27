@extends('layouts.custom')

@section('title', 'Privacy Policy - Nyano Haath')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/privacy.css') }}">
@endsection

@section('content')
<body>
    <div class="container">
        <header>
            <h1>Nyano Haath</h1>
            <h2>Privacy & Policy</h2>
            <p class="last-updated">Last Updated: <span id="last-updated-date"></span></p>
        </header>

        <div class="policy-layout">
            <aside class="sidebar-nav">
                <h3>On This Page</h3>
                <ul>
                    <li><a href="#introduction">1. Introduction</a></li>
                    <li><a href="#information-we-collect">2. Information We Collect</a></li>
                    <li><a href="#how-we-use-your-information">3. How We Use Information</a></li>
                    <li><a href="#data-sharing">4. Data Sharing & Disclosure</a></li>
                    <li><a href="#data-security">5. Data Security & Retention</a></li>
                    <li><a href="#your-rights">6. Your Rights & Choices</a></li>
                    <li><a href="#cookie-policy">7. Cookie Policy</a></li>
                    <li><a href="#international-transfers">8. International Transfers</a></li>
                    <li><a href="#changes-to-policy">9. Changes to This Policy</a></li>
                    <li><a href="#contact-us">10. Contact Us</a></li>
                </ul>
            </aside>

            <main>
                <section id="introduction">
                    <h3>1. Introduction</h3>
                    <p>Welcome to Nyano Haath ("we," "our," "us"). We are dedicated to providing a secure, transparent, and user-friendly digital fundraising platform for individuals and organizations in Nepal. This Privacy Policy outlines our practices concerning the collection, use, processing, and disclosure of your information. It applies to all users of our services, including donors, campaign creators, and general visitors to our website (collectively, the "Services").</p>
                    <p>By accessing or using our Services, you signify that you have read, understood, and agree to our collection, storage, use, and disclosure of your personal information as described in this Privacy Policy and our Terms of Service.</p>
                </section>

                <section id="information-we-collect">
                    <h3>2. Information We Collect</h3>
                    <p>To operate effectively and provide you with a seamless experience, we collect information in several ways:</p>
                    
                    <h4>A. Information You Provide Directly</h4>
                    <ul>
                        <li><strong>Account Information:</strong> When you register for an account, we collect information such as your full name, email address, phone number, and a password.</li>
                        <li><strong>Campaign Information:</strong> If you create a fundraising campaign, we collect the information you provide for that campaign, including the campaign title, story, fundraising goal, images, and videos.</li>
                        <li><strong>Donor Information:</strong> When you make a donation, we collect your name, email address, and the donation amount. You may have the option to donate anonymously, in which case your name will not be publicly displayed.</li>
                        <li><strong>Communications:</strong> If you contact us directly for support or other inquiries, we may receive additional information about you, such as the contents of your message and any attachments you may provide.</li>
                    </ul>
                    
                    <h4>B. Financial Information</h4>
                    <p>To process donations, we partner with secure third-party payment gateways (e.g., eSewa, Khalti). When you donate, you provide your payment information directly to them. We do not store sensitive financial details like your full credit card number or bank account information. We do, however, receive a transaction token, a record of the donation (amount, date), and the last four digits of your card for verification purposes.</p>

                    <h4>C. Information We Collect Automatically</h4>
                    <ul>
                        <li><strong>Usage and Log Data:</strong> We automatically collect information when you access and use our Services. This includes your IP address, browser type, operating system, device information, pages viewed, links clicked, the length of time you visit our site, and the referring URL.</li>
                        <li><strong>Cookies and Similar Technologies:</strong> We use cookies and similar tracking technologies to track activity on our Services and hold certain information. Please see our Cookie Policy in Section 7 for more details.</li>
                    </ul>
                </section>

                <section id="how-we-use-your-information">
                    <h3>3. How We Use Your Information</h3>
                    <p>We use the information we collect for the following purposes:</p>
                    <ul>
                        <li><strong>To Provide and Operate the Services:</strong> To create and manage user accounts, process donations, host fundraising campaigns, and enable communication between users.</li>
                        <li><strong>For Trust and Safety:</strong> To verify accounts, prevent and investigate fraud, combat abuse, and enforce our Terms of Service. This is critical for maintaining the integrity of our fundraising platform.</li>
                        <li><strong>To Communicate with You:</strong> To send administrative information, such as transaction confirmations, donation receipts, security alerts, and updates to our policies. We may also respond to your comments and questions and provide customer support.</li>
                        <li><strong>For Analytics and Improvement:</strong> To understand how users interact with our Services, monitor and analyze trends, and to improve and develop new features and functionality. This data is typically used in an aggregated and anonymized form.</li>
                        <li><strong>To Comply with Legal Obligations:</strong> To adhere to applicable laws and regulations within Nepal, respond to lawful requests from public authorities, and for legal and financial auditing purposes.</li>
                    </ul>
                </section>

                <section id="data-sharing">
                    <h3>4. Data Sharing and Disclosure</h3>
                    <p>We are committed to not selling or renting your personal information. We may, however, share your information in the following limited circumstances:</p>
                    <ul>
                        <li><strong>With Fundraisers and the Public:</strong> When you donate, your name and the donation amount may be displayed on the campaign page, unless you choose to donate anonymously.</li>
                        <li><strong>With Third-Party Service Providers:</strong> We work with vendors and service providers who help us operate our platform. These include payment processors (eSewa, Khalti), cloud hosting providers, email delivery services, and analytics tools. These providers only have access to the information necessary to perform their functions and are contractually obligated to protect it.</li>
                        <li><strong>For Legal and Safety Reasons:</strong> We may disclose your information if we believe it's required by law, subpoena, or other legal process, or if we have a good faith belief that disclosure is reasonably necessary to protect the rights, property, or safety of Nyano Haath, our users, or the public.</li>
                        <li><strong>Business Transfers:</strong> In the event of a merger, acquisition, bankruptcy, or other sale of all or a portion of our assets, your information may be transferred as part of that transaction. We will notify you of any such change in ownership or control of your personal information.</li>
                    </ul>
                </section>
                
                <section id="data-security">
                    <h3>5. Data Security and Retention</h3>
                    <h4>A. Data Security</h4>
                    <p>We take the security of your data seriously and implement a range of security measures designed to protect it from unauthorized access, disclosure, alteration, and destruction. These measures include:</p>
                    <ul>
                        <li><strong>Encryption:</strong> Using SSL/TLS to encrypt data transmitted between your browser and our servers.</li>
                        <li><strong>Secure Development:</strong> Building our platform on secure technologies like Laravel and MySQL and following best practices for application security.</li>
                        <li><strong>Access Controls:</strong> Limiting internal access to personal data to authorized employees who require it to perform their job functions.</li>
                        <li><strong>Payment Security:</strong> Partnering with PCI-DSS compliant payment gateways to ensure your financial data is handled according to the highest industry standards.</li>
                    </ul>
                    <p>Despite these measures, no security system is impenetrable. We cannot guarantee the absolute security of our systems, but we are committed to promptly addressing any security incidents.</p>

                    <h4>B. Data Retention</h4>
                    <p>We retain your personal information for as long as is necessary to provide the Services, comply with our legal obligations, resolve disputes, and enforce our agreements. The retention period may vary depending on the type of information and the purpose for which it was collected. For example, we are required by law to retain transactional records for a certain period for financial auditing purposes.</p>
                </section>

                <section id="your-rights">
                    <h3>6. Your Rights and Choices</h3>
                    <p>You have certain rights and choices regarding your personal information. Depending on your location, these may include:</p>
                    <ul>
                        <li><strong>Right to Access and Update:</strong> You can review and update your account information by logging into your account settings.</li>
                        <li><strong>Right to Erasure (Deletion):</strong> You can request the deletion of your personal information by contacting us. Please note that we may need to retain certain information for legal or legitimate business purposes.</li>
                        <li><strong>Right to Data Portability:</strong> You may have the right to receive a copy of your data in a structured, machine-readable format.</li>
                        <li><strong>Opt-Out of Communications:</strong> You can opt out of receiving promotional emails from us by following the "unsubscribe" link provided in those emails. You will continue to receive essential transactional and administrative emails.</li>
                        <li><strong>Anonymity:</strong> You have the option to make anonymous donations where available.</li>
                    </ul>
                    <p>To exercise any of these rights, please contact us at <strong>privacy@nyanohaath.com</strong>.</p>
                </section>

                <section id="cookie-policy">
                    <h3>7. Cookie Policy</h3>
                    <p>Cookies are small text files stored on your device. We use them to operate and enhance your experience on our Services.</p>
                    <h4>Types of Cookies We Use:</h4>
                    <ul>
                        <li><strong>Strictly Necessary Cookies:</strong> These are essential for the website to function and cannot be switched off. They are usually set in response to actions made by you, such as logging in or filling in forms.</li>
                        <li><strong>Performance and Analytics Cookies:</strong> These cookies allow us to count visits and traffic sources so we can measure and improve the performance of our site. They help us know which pages are the most and least popular.</li>
                        <li><strong>Functionality Cookies:</strong> These enable the website to provide enhanced functionality and personalization, such as remembering your preferences or login details.</li>
                    </ul>
                    <h4>Managing Cookies</h4>
                    <p>Most web browsers allow you to control cookies through their settings. You can set your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, some parts of our Services may not function properly.</p>
                </section>

                <section id="international-transfers">
                    <h3>8. International Data Transfers</h3>
                    <p>While Nyano Haath is focused on Nepal, our technical infrastructure, such as cloud hosting servers, may be located in other countries. By using our Services, you consent to the transfer of your information to these countries, which may have different data protection laws than your country of residence. We will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy.</p>
                </section>

                <section id="changes-to-policy">
                    <h3>9. Changes to This Policy</h3>
                    <p>We may update this Privacy Policy from time to time. We will notify you of any significant changes by posting the new policy on this page and updating the "Last Updated" date. We encourage you to review this Privacy Policy periodically for any changes. Your continued use of our Services after any modification to this Privacy Policy will constitute your acceptance of such modification.</p>
                </section>

                <section id="contact-us">
                    <h3>10. Contact Us</h3>
                    <p>If you have any questions, comments, or concerns about this Privacy Policy or our data practices, please do not hesitate to contact us:</p>
                    <ul>
                        <li>By email: <strong>privacy@nyanohaath.com</strong></li>
                        <li>By visiting our contact page: <strong>[Link to Your Contact Page]</strong></li>
                        <li>By phone: <strong>[Your Phone Number]</strong></li>
                    </ul>
                </section>
            </main>
        </div>

        <footer  style="display: none;">
            <p style="display: none;">© <span id="current-year"></span> Nyano Haath. All Rights Reserved.</p>
        </footer>
    </div>
<script src="{{ asset('JS/privacy.js') }}"></script>
@endsection