<?php
/* Smarty version 4.3.0, created on 2023-09-12 15:06:11
  from 'C:\xampp\htdocs\biogg\src\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65006243700d39_88806130',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '531c5741a5b8e34a3f977ea692ddacc03b9be1f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\login.tpl',
      1 => 1690976415,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65006243700d39_88806130 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
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

    <!--preloader start-->
    <div id="preloader">
        <img src="assets/img/preloader.gif" alt="preloader" width="450" class="img-fluid">
    </div>
    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--login section start-->
        <section class="login-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-12 tt-login-img" data-background="assets/img/banner/login-banner.jpg"></div>
                    <div class="col-lg-5 col-12 bg-white d-flex p-0 tt-login-col shadow">
                        <form class="tt-login-form-wrap p-3 p-md-6 p-lg-6 py-7 w-100" action = "login.php" method = "post">
                            <div class="mb-7">
                                <a href="home.php">
                                    <img src="assets/img/logo.png" alt="logo">
                                </a>
                            </div>
                            <h2 class="mb-4 h3">Bentornato! <br> Accedi a <span class="text-secondary">BioGG</span>
                            </h2>
                            <div class="row g-3">
                                <div class="col-sm-12">
                                    <div class="input-field">
                                        <label class="fw-bold text-dark fs-sm mb-1"  >Username</label>
                                        <input placeholder="Inserisci la tua email" type="username" class="theme-input" name="username">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-field check-password">
                                        <label class="fw-bold text-dark fs-sm mb-1"  type="password">Password</label>
                                        <div class="check-password">
                                            <input type="password" placeholder="Password" class="theme-input"name="password">
                                            <span class="eye eye-icon"><i class="fa-solid fa-eye"></i></span>
                                            <span class="eye eye-slash"><i class="fa-solid fa-eye-slash"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4">
                            
                                <a href="#" class="fs-sm">Forgot Password</a>
                            </div>
                            <div class="row g-4 mt-4">
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-primary w-100" name="submit">Sign In</button>
                                </div>
                               
                            </div>
                            <p class="mb-0 fs-xs mt-4">Don't have an Account? <a href="signup.html">Sign Up</a>
                            </p>
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
    <?php echo '<script'; ?>
 src="assets/js/vendors/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/jquery-ui.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/swiper-bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/jquery.magnific-popup.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/simplebar.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/parallax-scroll.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/isotop.pkgd.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/countdown.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/range-slider.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/waypoints.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/vendors/counterup.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="assets/js/app.js"><?php echo '</script'; ?>
>
    <!--endbuild-->
</body>

</html><?php }
}
