<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Oasis</title>
    <link rel="stylesheet" href="../../css/header_footer.css" />
    <link rel="stylesheet" href="../../css/index.css">
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div>
        <div class="blank">
            <div class="container">
                <div class="hero-section">
                    <h1>"Your Health Matters, We are here to help"</h1>
                </div>
                <div class="whats-new">
                    <h2>What's New</h2>
                    <div class="imge">
                        <img src="../../image/h1.jpg" alt="image">
                    </div>
                    <div class="slider">
                        <span class="prev">&lt;</span>
                        <div class="slide"></div>
                        <span class="next">&gt;</span>
                    </div>
                </div>


                <div class="details">
                    <div>
                        <h2>Meet Dr. Carson</h2>
                        <p>Protect yourself and others by wearing masks and washing hands frequently. Outdoor is safer
                            than
                            indoor for
                            gatherings or holding events. People who get sick with Coronavirus disease (COVID-19) will
                            experience mild to moderate
                            symptoms and recover without special treatments.
                            You can feel free to use this CSS template for your medical profession or health care
                            related
                            websites.
                            You can support us a little via PayPal if this template is good and useful for your work.
                        </p>
                    </div>
                    <div>
                        <div
                            class="featured-circle bg-white shadow-lg d-flex justify-content-center align-items-center">
                            <p class="featured-text"><span class="featured-number">12</span> Years of Experiences</p>
                        </div>
                    </div>
                </div>


                <div class="services">
                    <h2>What We Offer</h2>
                    <p>
                        Our online healthcare customer support service offers convenient appointment scheduling,
                        prescription refills, virtual consultations, and access to health resources, all in one
                        easy-to-use platform.
                    </p>
                    <div class="service-items">
                        <div class="item"><a href="login.php"><button type="button">Channeling</button></a></div>
                        <div class="item"><a href="#"><button type="button">Locator</button></a></div>
                        <div class="item"><a href="login.php"><button type="button">Consulting</button></a></div>
                        <div class="item"><a href="login.php"><button type="button">Refil</button></a></div>
                        <div class="item"><a href="blog.php"><button type="button">Learn</button></a></div>

                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'footer.php' ?>
</body>

</html>