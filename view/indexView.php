<?php
include_once 'public/header.php';
?>
<!--
<div class="row justify-content-center align-content-center">
    <div class="col-11 col-sm-10 col-md-4 border">
        <legend class="text-center">Oficios y Proyectos</legend>
        <input id="user_name" class="form-control" type="text" placeholder="Nombre de usuario">
        <input id="user_pass" class="form-control" type="password" placeholder="Contraseña">
        <button id="logInBtn" onclick="logInUser($('#user_name').val(), $('#user_pass').val())" class="btn btn-primary">Iniciar Sesion</button>
        <br></br>
        <span id="respuesta" class="text-center"></span>
    </div>
</div>
-->

<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
    <div class="hero-post-slides owl-carousel">

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(public/img/bkg/back-1.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Haz de tu hogar un hermoso jardín</h2>
                            <p>Gracias por visitar Vivero Bren, acá encontrarás una gran variedad de plantas que harán de tu hogar un hermoso jardín.</p>
                            <div class="welcome-btn-group">
                                <a href="?controller=Login" class="btn alazea-btn mr-30">Iniciar sesión</a>
                                <a href="" class="btn alazea-btn active">Contáctanos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Hero Post -->
        <div class="single-hero-post bg-overlay">
            <!-- Post Image -->
            <div class="slide-img bg-img" style="background-image: url(public/img/bkg/back-3.jpg);"></div>
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <!-- Post Content -->
                        <div class="hero-slides-content text-center">
                            <h2>Haz de tu hogar un hermoso jardín</h2>
                            <p>Gracias por visitar Vivero alazea, acá encontrarás una gran variedad de plantas que harán de tu hogar un hermoso jardín.</p>
                            <div class="welcome-btn-group">
                                <a href="login.php" class="btn alazea-btn mr-30">Iniciar sesión</a>
                                <a href="" class="btn alazea-btn active">Contáctanos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ##### Hero Area End ##### -->

<!-- ##### Portfolio Area Start ##### -->
<section class="alazea-portfolio-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>Nuestro portafolio</h2>
                    <p>Conoce algunas de nuestras plantas</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="alazea-portfolio-filter">
                    <div class="portfolio-filter">
                        <button class="btn active" data-filter="*">All</button>
                        <button class="btn" data-filter=".design">Coffee Design</button>
                        <button class="btn" data-filter=".garden">Garden</button>
                        <button class="btn" data-filter=".home-design">Home Design</button>
                        <button class="btn" data-filter=".office-design">Office Design</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row alazea-portfolio"> <?php
            for ($i = 16; $i < 23; $i++) {
                ?> <!-- Single Portfolio Area -->
                <div class="col-12 col-sm-6 col-lg-3 single_portfolio_item design home-design wow fadeInUp" data-wow-delay="100ms">
                    <!-- Portfolio Thumbnail -->
                    <div class="portfolio-thumbnail bg-img" style="background-image: url(public/img/ptf/<?php echo $i; ?>.jpg);"></div>
                    <!-- Portfolio Hover Text -->
                    <div class="portfolio-hover-overlay">
                        <a href="public/img/ptf/<?php echo $i; ?>.jpg" class="portfolio-img d-flex align-items-center justify-content-center" title="Portfolio <?php echo $i % 16 + 1; ?>">
                            <div class="port-hover-text">
                                <h3>Minimal Flower Store</h3>
                                <h5>Office Plants</h5>
                            </div>
                        </a>
                    </div>
                </div> <?php
            } ?>
        </div>
    </div>
</section>
<!-- ##### Portfolio Area End ##### -->

<!-- ##### Product Area Start ##### -->
<section class="new-arrivals-products-area bg-gray section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Section Heading -->
                <div class="section-heading text-center">
                    <h2>NEW ARRIVALS</h2>
                    <p>We have the latest products, it must be exciting for you</p>
                </div>
            </div>
        </div>

        <div class="row">

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="shop-details.html"><img src="img/bg-img/9.jpg" alt=""></a>
                        <!-- Product Tag -->
                        <div class="product-tag">
                            <a href="#">Hot</a>
                        </div>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="shop-details.html">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="200ms">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="shop-details.html"><img src="img/bg-img/10.jpg" alt=""></a>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="shop-details.html">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="300ms">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="shop-details.html"><img src="img/bg-img/11.jpg" alt=""></a>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="shop-details.html">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <!-- Single Product Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single-product-area mb-50 wow fadeInUp" data-wow-delay="400ms">
                    <!-- Product Image -->
                    <div class="product-img">
                        <a href="shop-details.html"><img src="img/bg-img/12.jpg" alt=""></a>
                        <!-- Product Tag -->
                        <div class="product-tag sale-tag">
                            <a href="#">Hot</a>
                        </div>
                        <div class="product-meta d-flex">
                            <a href="#" class="wishlist-btn"><i class="icon_heart_alt"></i></a>
                            <a href="cart.html" class="add-to-cart-btn">Add to cart</a>
                            <a href="#" class="compare-btn"><i class="arrow_left-right_alt"></i></a>
                        </div>
                    </div>
                    <!-- Product Info -->
                    <div class="product-info mt-15 text-center">
                        <a href="shop-details.html">
                            <p>Cactus Flower</p>
                        </a>
                        <h6>$10.99</h6>
                    </div>
                </div>
            </div>

            <div class="col-12 text-center">
                <a href="#" class="btn alazea-btn">View All</a>
            </div>

        </div>
    </div>
</section>
<!-- ##### Product Area End ##### -->

<!-- ##### Contact Area Start ##### -->
<section class="contact-area section-padding-100-0">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 col-lg-5">
                <!-- Section Heading -->
                <div class="section-heading">
                    <h2>GET IN TOUCH</h2>
                    <p>Send us a message, we will call back later</p>
                </div>
                <!-- Contact Form Area -->
                <div class="contact-form-area mb-100">
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-name" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="contact-email" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="contact-subject" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn alazea-btn mt-15">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <!-- Google Maps -->
                <div class="map-area mb-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d22236.40558254599!2d-118.25292394686001!3d34.057682914027104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2c75ddc27da13%3A0xe22fdf6f254608f4!2z4Kay4Ka4IOCmj-CmnuCnjeCmnOCnh-CmsuCnh-CmuCwg4KaV4KeN4Kav4Ka-4Kay4Ka_4Kar4KeL4Kaw4KeN4Kao4Ka_4Kav4Ka84Ka-LCDgpq7gpr7gprDgp43gppXgpr_gpqgg4Kav4KeB4KaV4KeN4Kak4Kaw4Ka-4Ka34KeN4Kaf4KeN4Kaw!5e0!3m2!1sbn!2sbd!4v1532328708137" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Contact Area End ##### -->

<?php
include_once 'public/footer.php';
?>