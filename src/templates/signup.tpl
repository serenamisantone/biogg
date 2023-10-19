<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--meta-->
    <meta name="description" content="Grostore Grocery  eCommerce html template. Multivendor responsive eCommerce template">
    <meta name="author" content="ThemeTags">
    <meta name="keywords" content="Grostore Grocery  ecommerce, admin template, online shop, e-commerce, ecommerce template, marketplace, modern, responsive,  business, mobile, bootstrap, html5, css3, js, gallery, slider, touch, creative, clean">
    <!--favicon icon-->
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>Grostore - Signup - Grostore Grocery eCommerce HTML Template</title>

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
</head>

<body>

    <!--main content wrapper start-->
    <div class="main-wrapper">


        <!--login section start-->
        <section class="login-section py-5">
            <div class="container">
            {if isset($error_message)}
                <div class="alert alert-danger" role="alert">{$error_message}</div>
            {/if}
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 tt-login-img" data-background="assets/img/login/logo.jpeg"></div>
                    <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                        <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" action= "signup.php" method= "post">
                            <div class="text-center mb-7">
                                <a href="index.php"><img src="assets/img/login/logo2.jpeg" alt="logo"></a>
                            </div>
                            <h4 class="mb-3">Registrati</h4>
                            <p class="fs-xs">Already have an account? <a href="login.php" class="text-secondary">Sign in</a></p>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="input-field">
                                        <input type="text" name= "name" placeholder="First name" class="theme-input">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-field">
                                        <input type="text" name= "surname" placeholder="Last name" class="theme-input">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <input type="email" name="email" placeholder="Email address" class="theme-input">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <input type="text" name="username" placeholder="Username" class="theme-input">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field check-password">
                                        <input type="password" name="password" placeholder="Password" class="theme-input">
                                        <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                        <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-4 mt-4">
                                <div class="col-sm-6 text-center">
                                    <button type="submit" class="btn btn-primary mx-auto d-block">Create account</button>
                                </div>
                                <div>
                            <p class="mb-0 fs-xxs mt-4 text-center">By signing up, I agree to <a href="#" class="text-dark">Terms of Use and Privacy Policy</a></p>
                            </div>
                            </div>
                            </form>
                            
                    </div>
                </div>
            </div>
        </section>
        <!--login section end-->

    </div>
    <!--main content wrapper end-->


    <!--scroll bottom to top button start-->
    <button class="scroll-top-btn">
        <i class="fa-regular fa-hand-pointer"></i>
    </button>
    <!--scroll bottom to top button end-->
    <!--build:js-->
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/jquery-ui.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendors/simplebar.min.js"></script>
    <script src="assets/js/vendors/parallax-scroll.js"></script>
    <script src="assets/js/vendors/isotop.pkgd.min.js"></script>
    <script src="assets/js/vendors/countdown.min.js"></script>
    <script src="assets/js/vendors/range-slider.js"></script>
    <script src="assets/js/vendors/waypoints.js"></script>
    <script src="assets/js/vendors/counterup.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--endbuild-->
</body>

</html>