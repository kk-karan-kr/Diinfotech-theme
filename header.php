<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DI_Infotech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>




    <!-- Deferred marketing tags -->
    <script>
        (function() {
            var loaded = false;

            function loadMarketingTags() {
                if (loaded) {
                    return;
                }

                loaded = true;

                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({
                    'gtm.start': new Date().getTime(),
                    event: 'gtm.js'
                });

                var gtmScript = document.createElement('script');
                gtmScript.async = true;
                gtmScript.src = 'https://www.googletagmanager.com/gtm.js?id=GTM-P8WHLJQS';
                document.head.appendChild(gtmScript);

                ! function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');

                fbq('init', '796777747332567');
                fbq('track', 'PageView');
            }

            ['mousedown', 'mousemove', 'keydown', 'scroll', 'touchstart'].forEach(function(eventName) {
                window.addEventListener(eventName, loadMarketingTags, {
                    once: true,
                    passive: true
                });
            });

            window.addEventListener('load', function() {
                window.setTimeout(loadMarketingTags, 3500);
            });
        })();
    </script>
    <!-- End deferred marketing tags -->

    <?php if ( is_front_page() && ! defined( 'AIOSEO_VERSION' ) ) : ?>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [{
                    "@type": "Question",
                    "name": "What should I look for when choosing a digital marketing agency near me?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "When choosing a digital marketing agency near you, check if they understand your industry, offer a full range of digital marketing services, and have good reviews. It's also important that they provide clear communication and regular reporting. A digital marketing company in Delhi NCR with local knowledge can give you an advantage in targeting the right audience."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What business problems can digital marketing services help solve?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Digital marketing services can help grow your brand, attract more customers, and boost your online presence through SEO, social media marketing, PPC, or email marketing. These services help drive traffic, increase sales, and improve customer engagement."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Why should I hire a local digital marketing agency in Delhi?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Working with a digital marketing agency in Delhi gives you better access to their team, faster support, and a thorough understanding of the local market. Local agencies know how to run effective local SEO campaigns that reach area-specific customers more effectively."
                    }
                },
                {
                    "@type": "Question",
                    "name": "How long does it take to see results from digital marketing?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "SEO services typically take around 3-6 months, while performance marketing (PPC) can show results almost immediately. Social media marketing, email marketing and content marketing usually deliver noticeable growth in a few months."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Do you offer website development along with marketing services?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Yes! As a complete digital marketing agency in Delhi NCR, we offer website development including WordPress development, Shopify development, and complete e-commerce development, with great UI/UX design to increase engagement and conversions."
                    }
                },
                {
                    "@type": "Question",
                    "name": "What makes you a top digital marketing agency in Delhi?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "We offer end-to-end digital marketing services in Delhi including SEO, PPC, SMO, and more, all tailored to your business needs. With over 20 years of experience, we're proud to be known as a top digital marketing agency in Delhi."
                    }
                }
            ]
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "LocalBusiness",
            "name": "DI Infotech Leaders Pvt. Ltd.",
            "url": "https://diinfotech.com",
            "logo": "https://diinfotech.com/wp-content/themes/di-infotech/assets/img/logo.svg",
            "image": "https://diinfotech.com/wp-content/themes/di-infotech/assets/img/logo.svg",
            "description": "DI Infotech is a trusted digital marketing agency in Delhi offering SEO, social media marketing, PPC & web solutions to help businesses grow online.",
            "telephone": "+91-9810052141",
            "email": "info@diinfotech.com",
            "foundingDate": "2005",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "301, G-27, Pankaj Tower - IV, Commercial Complex, Vikaspuri",
                "addressLocality": "New Delhi",
                "addressRegion": "Delhi",
                "postalCode": "110018",
                "addressCountry": "IN"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 28.6406,
                "longitude": 77.0709
            },
            "areaServed": ["Delhi", "Delhi NCR", "India"],
            "sameAs": [
                "https://www.facebook.com/diinfotech",
                "https://www.linkedin.com/company/diinfotech",
                "https://www.instagram.com/diinfotech/"
            ],
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "opens": "09:00",
                "closes": "18:00"
            }
        }
    </script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "DI Infotech Leaders Pvt. Ltd.",
            "url": "https://diinfotech.com",
            "aggregateRating": {
                "@type": "AggregateRating",
                "ratingValue": "4.8",
                "reviewCount": "87",
                "bestRating": "5",
                "worstRating": "1"
            },
            "review": [{
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Mahesh Gupta"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "DI Infotech transformed our beauty brand with expert Social Media Marketing and Performance Ads. Their campaigns skyrocketed our brand visibility and engagement."
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Naman Prakash"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "Their SEO expertise brought us top rankings, while the newly developed website improved conversions and credibility."
                },
                {
                    "@type": "Review",
                    "author": {
                        "@type": "Person",
                        "name": "Rohit Singh"
                    },
                    "reviewRating": {
                        "@type": "Rating",
                        "ratingValue": "5",
                        "bestRating": "5"
                    },
                    "reviewBody": "Their Google Ads and Social Media Ad campaigns targeted high-intent buyers, bringing us consistent, high-quality leads."
                }
            ]
        }
    </script>
    <?php endif; ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Meta Pixel (noscript) -->
    <noscript><img height="1" width="1" style="display:none" alt=""
            src="https://www.facebook.com/tr?id=796777747332567&amp;ev=PageView&amp;noscript=1"></noscript>
    <!-- End Meta Pixel (noscript) -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P8WHLJQS" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="<?php echo ( is_singular('services') || is_page_template('single-our_servives.php') ) && function_exists('get_field') && 'modular_v2' === get_field('service_layout_mode') ? '#main-content' : '#primary'; ?>"><?php esc_html_e('Skip to content', 'di-infotech'); ?></a>


        <!-- cursor section start  -->

        <div id="cursor"></div>
        <div id="cursor-border"></div>

        <!-- cursor section end  -->


        <section class="viewport">
            <div class="scroll-container">

                <!-- header section start  -->
                <header class="header">
                    <div class="container">
                        <div class="row v-center justify-content-between">
                            <div class="header-item item-left">
                                <div class="logo">
                                    <a href="<?php echo get_home_url(); ?>"><img
                                            src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg"
                                            alt="Diinfotech" width="261" height="72" decoding="async"></a>
                                </div>
                            </div>
                            <!-- menu start here -->
                            <div class="header-item item-center">
                                <div class="menu-overlay"></div>
                                <nav class="menu">
                                    <div class="mobile-menu-head">
                                        <div class="go-back"><i class="fa fa-angle-left"></i></div>
                                        <div class="current-menu-title"></div>
                                        <div class="mobile-menu-close">&times;</div>
                                    </div>
                                    <!-- desktop view -->

                                    <ul class="menu-main">
                                        <li>
                                            <a href="<?php echo get_home_url(); ?>">Home</a>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Services <i class="fa fa-angle-down"></i></a>

                                            <div class="sub-menu mega-menu mega-menu-column-4">

                                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link active" id="pills-Digital-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-Digital"
                                                            type="button" role="tab" aria-controls="pills-Digital"
                                                            aria-selected="true">Digital Marketing</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-Web-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-Web"
                                                            type="button" role="tab" aria-controls="pills-Web"
                                                            aria-selected="false">Web
                                                            Development</button>
                                                    </li>

                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-seo-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-seo"
                                                            type="button" role="tab" aria-controls="pills-seo"
                                                            aria-selected="false">SEO</button>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <button class="nav-link" id="pills-Ventures-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-Ventures"
                                                            type="button" role="tab" aria-controls="pills-Ventures"
                                                            aria-selected="false">Our Ventures</button>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-Digital"
                                                        role="tabpanel" aria-labelledby="pills-Digital-tab">

                                                        <div class="mega_menu_wrp">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="about_small_details">
                                                                        <!-- <div class="menu_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/digital-marketing-header.gif"
                                                                                alt="Diinfotech" width="640" height="640" loading="lazy" decoding="async">
                                                                        </div> -->
                                                                        <div class="menu_bottom_text">
                                                                            <h4>Digital Marketing</h4>
                                                                            <p>Partnering with DI Infotech ensures
                                                                                higher conversions, increased revenue,
                                                                                and sustained growth. Our data-driven
                                                                                strategies boost visibility, attract the
                                                                                right audience, and maximize sales. From
                                                                                brand strategy and Social Media to web
                                                                                development and eCommerce, we develop
                                                                                targeted campaigns that turn visitors
                                                                                into loyal customers and grow your
                                                                                business ahead of the competition.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="drop_menu">
                                                                        <!-- desktop menu  -->
                                                                        <div class="flex-inner ">
                                                                            <div class="nav nav-pills me-3"
                                                                                id="v-pills-tab" role="tablist"
                                                                                aria-orientation="vertical">
                                                                                <button class="nav-link active"
                                                                                    id="v-pills-Performance-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Performance"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Performance"
                                                                                    aria-selected="true">Social Media
                                                                                    Marketing
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-Per-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Per"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Per"
                                                                                    aria-selected="false">Performance
                                                                                    Marketing <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div></button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-Media-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Media"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Media"
                                                                                    aria-selected="false">Email
                                                                                    Marketing <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div></button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-Brand-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Brand"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Brand"
                                                                                    aria-selected="false">Brand
                                                                                    Management <div
                                                                                        class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div></button>

                                                                            </div>
                                                                            <div class="tab-content"
                                                                                id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active"
                                                                                    id="v-pills-Performance"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-Performance-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Social media builds brand
                                                                                            authority, engagement, and
                                                                                            sales. We create expert-led
                                                                                            campaigns on Facebook,
                                                                                            Instagram, and LinkedIn,
                                                                                            ensuring high reach,
                                                                                            targeted visibility, and
                                                                                            increased conversions.
                                                                                            Through strategic content,
                                                                                            paid ads, and audience
                                                                                            interaction, we position
                                                                                            your brand as an industry
                                                                                            leader that connects and
                                                                                            sells.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/social-media-marketing-agency-in-delhi/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-Per" role="tabpanel"
                                                                                    aria-labelledby="v-pills-Per-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Performance marketing
                                                                                            delivers measurable growth
                                                                                            by targeting high-intent
                                                                                            customers. We optimize ad
                                                                                            spend, track performance,
                                                                                            and refine strategies to
                                                                                            maximize ROI. Whether PPC,
                                                                                            display ads, or remarketing,
                                                                                            we ensure every click turns
                                                                                            into revenue. Our strategic
                                                                                            execution drives
                                                                                            conversions, expands brand
                                                                                            reach, and boosts long-term
                                                                                            profitability.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/performance-marketing-agency/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-Media" role="tabpanel"
                                                                                    aria-labelledby="v-pills-Media-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Email marketing remains a
                                                                                            top-performing strategy for
                                                                                            customer retention and
                                                                                            conversions. We craft
                                                                                            personalized campaigns,
                                                                                            automate sequences, and
                                                                                            optimize content to engage
                                                                                            leads. By delivering timely,
                                                                                            relevant messages, we turn
                                                                                            prospects into paying
                                                                                            customers and increase
                                                                                            repeat sales, ensuring a
                                                                                            consistent revenue stream
                                                                                            for your business.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/email-marketing-service/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-Brand" role="tabpanel"
                                                                                    aria-labelledby="v-pills-Brand-tab">
                                                                                    <div class="about_dropmenu">
                                                                                        <p>A powerful brand builds
                                                                                            trust, credibility, and
                                                                                            lasting customer
                                                                                            relationships. Our brand
                                                                                            management solutions refine
                                                                                            messaging, enhance digital
                                                                                            presence, and boost
                                                                                            visibility. From social
                                                                                            branding to reputation
                                                                                            management, we ensure your
                                                                                            business stands out,
                                                                                            attracts the right audience,
                                                                                            and drives long-term growth
                                                                                            in a competitive
                                                                                            marketplace.</p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/strategic-brand-management/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Mobile Menu-->
                                                                        <div class="flex-inner desktop_none">
                                                                            <div class="nav ">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/social-media-marketing-agency-in-delhi/">Social
                                                                                            Media Marketing
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/performance-marketing-agency/">Performance
                                                                                            Marketing
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>


                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/email-marketing-service/">Email
                                                                                            Marketing
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/strategic-brand-management/">Brand
                                                                                            Managment
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="tab-pane fade" id="pills-Web" role="tabpanel"
                                                        aria-labelledby="pills-Web-tab">
                                                        <div class="mega_menu_wrp">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="about_small_details">
                                                                        <!-- <div class="menu_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/web-dev-header.gif"
                                                                                alt="Diinfotech" width="640" height="640" loading="lazy" decoding="async">
                                                                        </div> -->
                                                                        <div class="menu_bottom_text">
                                                                            <h4>Web Development</h4>
                                                                            <p>Building a high-converting website isn’t
                                                                                just about design; it’s about strategy,
                                                                                performance, and user experience. At DI
                                                                                Infotech, we craft fast, scalable, and
                                                                                conversion-optimized websites that help
                                                                                businesses establish authority, attract
                                                                                visitors, and drive maximum sales.
                                                                                Whether you need a corporate website, an
                                                                                eCommerce platform, or a custom web
                                                                                application, we deliver solutions that
                                                                                turn clicks into customers.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="drop_menu">
                                                                        <!-- desktop menu  -->
                                                                        <div class="flex-inner">
                                                                            <div class="nav flex-column nav-pills me-3"
                                                                                id="v-pills-tab" role="tablist"
                                                                                aria-orientation="vertical">
                                                                                <button class="nav-link active"
                                                                                    id="v-pills-eco_devlopment-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-eco_devlopment"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-eco_devlopment"
                                                                                    aria-selected="true">Website
                                                                                    Development
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-web_devlopment-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-web_devlopment"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-web_devlopment"
                                                                                    aria-selected="false">Ecommerce
                                                                                    Website
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-ui_ux_design-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-ui_ux_design"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-ui_ux_design"
                                                                                    aria-selected="false">UI/UX
                                                                                    Designing <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div></button>

                                                                            </div>
                                                                            <div class="tab-content"
                                                                                id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active"
                                                                                    id="v-pills-eco_devlopment"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-eco_devlopment-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>A business website isn’t just
                                                                                            an online presence—it’s a
                                                                                            sales machine. We develop
                                                                                            SEO-friendly, fast-loading,
                                                                                            and responsive websites that
                                                                                            enhance brand credibility,
                                                                                            improve user engagement, and
                                                                                            maximize lead conversions.
                                                                                            Every design is optimized to
                                                                                            attract customers, increase
                                                                                            retention, and drive
                                                                                            measurable business growth.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/website-development-company-in-india/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-web_devlopment"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-web_devlopment-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>A high-performing eCommerce
                                                                                            store is key to online
                                                                                            success. We build fully
                                                                                            optimized Shopify,
                                                                                            WooCommerce, and custom
                                                                                            eCommerce platforms designed
                                                                                            for seamless navigation,
                                                                                            faster checkout, and secure
                                                                                            transactions. Our
                                                                                            development strategies focus
                                                                                            on increasing conversions,
                                                                                            improving customer
                                                                                            experience, and scaling your
                                                                                            revenue.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/ecommerce-development-company-in-india/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-ui_ux_design"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-ui_ux_design-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>User experience can make or
                                                                                            break your brand’s success.
                                                                                            Our UI/UX design process
                                                                                            creates intuitive,
                                                                                            conversion-focused, and
                                                                                            visually engaging interfaces
                                                                                            that drive user engagement.
                                                                                            We optimize customer
                                                                                            journeys, improve usability,
                                                                                            and enhance accessibility,
                                                                                            ensuring every interaction
                                                                                            translates into higher
                                                                                            retention and more sales.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/ui-ux-design-agency/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                        <!-- Mobile Menu-->
                                                                        <div class="flex-inner desktop_none">
                                                                            <div class="nav ">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/website-development-company-in-india/">Website
                                                                                            Development
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/ecommerce-development-company-in-india/">Ecommerce
                                                                                            Website
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>


                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane fade" id="pills-seo" role="tabpanel"
                                                        aria-labelledby="pills-seo-tab">
                                                        <div class="mega_menu_wrp">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="about_small_details">
                                                                        <!-- <div class="menu_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/seo-header.gif"
                                                                                alt="Diinfotech" width="640" height="640" loading="lazy" decoding="async">
                                                                        </div> -->
                                                                        <div class="menu_bottom_text">
                                                                            <h4>Search Engine Optimization (SEO)</h4>
                                                                            <p>Rank higher, attract the right audience,
                                                                                and drive conversions with DI Infotech’s
                                                                                expert SEO strategies. We optimize
                                                                                websites for search engines, ensuring
                                                                                top rankings, high organic traffic, and
                                                                                consistent business growth. From on-page
                                                                                SEO to technical improvements, we make
                                                                                your brand popular, profitable and grow
                                                                                your business ahead of the competition.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="drop_menu">
                                                                        <!-- desktop menu  -->
                                                                        <div class="flex-inner">
                                                                            <div class="nav flex-column nav-pills me-3"
                                                                                id="v-pills-tab" role="tablist"
                                                                                aria-orientation="vertical">
                                                                                <button class="nav-link active"
                                                                                    id="v-pills-Website_seo-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Website_seo"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Website_seo"
                                                                                    aria-selected="true">Website SEO
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-ecommerce_seo-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-ecommerce_seo"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-ecommerce_seo"
                                                                                    aria-selected="false">Ecommerce SEO
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-geo-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-geo"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-geo"
                                                                                    aria-selected="false">
                                                                                    Generative Engine Optimization
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>


                                                                            </div>
                                                                            <div class="tab-content"
                                                                                id="v-pills-tabContent">
                                                                                <div class="tab-pane fade show active"
                                                                                    id="v-pills-Website_seo"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-Website_seo-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>A strong website is only
                                                                                            valuable if people can find
                                                                                            it. Our Website SEO services
                                                                                            enhance site structure,
                                                                                            keyword targeting, and
                                                                                            content strategy to boost
                                                                                            search rankings. We
                                                                                            implement technical
                                                                                            optimizations, backlink
                                                                                            strategies, and performance
                                                                                            improvements that drive
                                                                                            traffic, generate leads, and
                                                                                            position your business as an
                                                                                            industry authority.</p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/seo-company-in-india/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-ecommerce_seo"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-ecommerce_seo-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Selling online requires more
                                                                                            than a great product- it
                                                                                            demands visibility. Our
                                                                                            Ecommerce SEO optimised
                                                                                            product pages, improves
                                                                                            search rankings, and
                                                                                            increases discoverability.
                                                                                            Through category SEO,
                                                                                            conversion optimization, and
                                                                                            user experience
                                                                                            enhancements, we help online
                                                                                            stores attract high-intent
                                                                                            buyers, increase sales, and
                                                                                            scale profitability.</p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/ecommerce-seo-marketing/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-geo" role="tabpanel"
                                                                                    aria-labelledby="v-pills-geo-tab">
                                                                                    <div class="about_dropmenu">
                                                                                        <p>Our experts team focuses on
                                                                                            making optimize content for
                                                                                            LLMs, optimizing the website
                                                                                            structure, and performing
                                                                                            strong SEO to build
                                                                                            authority. Choose us to grow
                                                                                            your business online
                                                                                            presence and get ready for
                                                                                            the future of AI searches.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="<?php echo get_home_url(); ?>/services/generative-engine-optimization/">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>


                                                                            </div>
                                                                        </div>
                                                                        <!-- Mobile Menu-->
                                                                        <div class="flex-inner desktop_none">
                                                                            <div class="nav ">
                                                                                <ul>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/ecommerce-seo-marketing/">
                                                                                            Website SEO
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/ecommerce-development-company-in-india/">Ecommerce
                                                                                            SEO
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a
                                                                                            href="<?php echo get_home_url(); ?>/services/generative-engine-optimization/">Generative
                                                                                            Engine Optimization
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>


                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pills-Ventures" role="tabpanel"
                                                        aria-labelledby="pills-Ventures-tab">
                                                        <div class="mega_menu_wrp">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="about_small_details">
                                                                        <!-- <div class="menu_icon">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ventures-header.gif"
                                                                                alt="Diinfotech" width="640" height="640" loading="lazy" decoding="async">
                                                                        </div> -->
                                                                        <div class="menu_bottom_text">
                                                                            <h4>Our Ventures</h4>
                                                                            <p>DI Infotech goes beyond digital marketing
                                                                                to provide solutions that help
                                                                                businesses grow, scale, and manage
                                                                                operations more efficiently. Our
                                                                                ventures are designed to increase brand
                                                                                visibility, strengthen customer
                                                                                engagement, and simplify business
                                                                                processes, ensuring long-term success.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-7">
                                                                    <div class="drop_menu">
                                                                        <!-- desktop menu  -->
                                                                        <div class="flex-inner">
                                                                            <div class="nav flex-column nav-pills me-3"
                                                                                id="v-pills-tab" role="tablist"
                                                                                aria-orientation="vertical">
                                                                                <!--   <button class="nav-link active"
                                                                                    id="v-pills-Influence-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Influence"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Influence"
                                                                                    aria-selected="true">Influence Marketing
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button> -->


                                                                                <!--     <button class="nav-link"
                                                                                    id="v-pills-YaadRakho-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-YaadRakho"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-YaadRakho"
                                                                                    aria-selected="false">YaadRakho
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button> -->
                                                                                <button class="nav-link"
                                                                                    id="v-pills-Courses-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Courses"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Courses"
                                                                                    aria-selected="false">DI Infotech
                                                                                    Courses
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                                <button class="nav-link"
                                                                                    id="v-pills-Pratibhashali-tab"
                                                                                    data-bs-toggle="pill"
                                                                                    data-bs-target="#v-pills-Pratibhashali"
                                                                                    type="button" role="tab"
                                                                                    aria-controls="v-pills-Pratibhashali"
                                                                                    aria-selected="false">Pratibhashali
                                                                                    Initiative
                                                                                    <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                            alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                    </div>
                                                                                </button>
                                                                            </div>
                                                                            <div class="tab-content"
                                                                                id="v-pills-tabContent">
                                                                                <!--     <div class="tab-pane fade show active"
                                                                                    id="v-pills-Influence" role="tabpanel"
                                                                                    aria-labelledby="v-pills-Influence-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Drive more sales and expand your reach with result-driven influencer marketing. We connect your brand with trusted voices in your industry, ensuring real engagement from potential buyers. Our campaigns are designed to boost credibility, increase brand awareness, and generate measurable revenue.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="https://influencermarketing.solutions/" target="_blank">Discover More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div> -->

                                                                                <!--  <div class="tab-pane fade"
                                                                                    id="v-pills-YaadRakho" role="tabpanel"
                                                                                    aria-labelledby="v-pills-YaadRakho-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Missed deadlines cost businesses money and opportunities. Yaad Rakho ensures you never forget critical tasks, from business license renewals to important client follow-ups. Our human-verified reminder system keeps your operations running smoothly, preventing losses and maximizing productivity.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="https://yaadrakho.com/" target="_blank">Discover More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div> -->
                                                                                <div class="tab-pane fade show active"
                                                                                    id="v-pills-Courses" role="tabpanel"
                                                                                    aria-labelledby="v-pills-Courses-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Build job-ready skills and
                                                                                            grow with expert-led,
                                                                                            AI-integrated training
                                                                                            programs. We offer practical
                                                                                            learning in digital
                                                                                            marketing, designing, web
                                                                                            development, and more which
                                                                                            are tailored to help you
                                                                                            succeed in today’s job
                                                                                            market. Gain confidence, get
                                                                                            certified, and unlock new
                                                                                            career opportunities.
                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="https://diinfotech.com/courses/"
                                                                                                target="_blank">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                <div class="tab-pane fade"
                                                                                    id="v-pills-Pratibhashali"
                                                                                    role="tabpanel"
                                                                                    aria-labelledby="v-pills-Pratibhashali-tab">

                                                                                    <div class="about_dropmenu">
                                                                                        <p>Empowering underprivileged
                                                                                            children with free computer
                                                                                            and English conversation
                                                                                            courses. We believe every
                                                                                            child deserves the right to
                                                                                            learn, grow, and build a
                                                                                            future. Our mission is to
                                                                                            remove financial barriers
                                                                                            and provide essential
                                                                                            digital and communication
                                                                                            skills for a brighter
                                                                                            tomorrow.

                                                                                        </p>

                                                                                        <div class="main_btn ">
                                                                                            <a class="bg_yellow"
                                                                                                href="https://pratibhashali.org/"
                                                                                                target="_blank">Discover
                                                                                                More <i
                                                                                                    class="fa-solid fa-arrow-right"></i></a>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <!-- Mobile Menu-->
                                                                        <div class="flex-inner desktop_none">
                                                                            <div class="nav ">
                                                                                <ul>
                                                                                    <!--  <li>
                                                                                        <a target="_blank" href="https://influencermarketing.solutions/">
                                                                                            Influence Marketing
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li> -->
                                                                                    <!--    <li>
                                                                                        <a target="_blank" href="https://yaadrakho.com/">YaadRakho
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li> -->
                                                                                    <li>
                                                                                        <a target="_blank"
                                                                                            href="https://diinfotech.com/courses/">DI
                                                                                            Infotech Courses
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a target="_blank"
                                                                                            href="https://pratibhashali.org/">Pratibhashali
                                                                                            Initiative
                                                                                            <div class="yellow_arrow">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/yellow_arrow.png"
                                                                                                    alt="Diinfotech" width="150" height="149" loading="lazy" decoding="async">
                                                                                            </div>
                                                                                        </a>
                                                                                    </li>

                                                                                </ul>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </li>

                                        <li>
                                            <a href="<?php echo get_home_url(); ?>/portfolio">Portfolio</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo get_home_url(); ?>/about">About Us</a>
                                        </li>

                                        <li>
                                            <a href="<?php echo get_home_url(); ?>/contact">Contact Us</a>
                                        </li>
                                    </ul>

                                    <!-- mobile view -->


                                </nav>
                            </div>
                            <!-- menu end here -->
                            <div class="header-item item-right">

                                <!-- mobile menu trigger -->
                                <div class="mobile-menu-trigger">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>

                <!-- header section end  -->
