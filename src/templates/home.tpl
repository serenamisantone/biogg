<!--hero section start-->
<section class="gshop-hero pt-120 bg-white position-relative z-1 overflow-hidden">
    <img src="assets/img/shapes/leaf-shadow.png" alt="leaf" class="position-absolute leaf-shape z--1 rounded-circle">
    <img src="assets/img/shapes/hero-circle-sm.png" alt="circle" class="position-absolute hero-circle circle-sm z--1">
    <div class="container">
        <div class="gshop-hero-slider swiper">
            <div class="swiper-wrapper">
                {foreach $data_slider as $slider}
                    <div class="swiper-slide gshop-hero-single">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-xl-5 col-lg-8">
                                <div class="hero-left-content">
                                    <span class="gshop-subtitle fs-5 text-secondary mb-2 d-block">
                                        {$slider->getTitle()}</span>
                                    <h1 class="display-4 mb-3">{$slider->getCaption()}</h1>
                                    <p class="mb-7 fs-6">{$slider->getDescription()}</p>
                                    <div class="hero-btns d-flex align-items-center gap-3 gap-sm-5 flex-wrap">
                                        <a href="shop.php" class="btn btn-secondary">Shop<span class="ms-2"><i
                                                    class="fa-solid fa-arrow-right"></i></span></a>
                                        <a href="about.php" class="btn btn-primary">About Us<span class="ms-2"><i
                                                    class="fa-solid fa-arrow-right"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-7">
                                <div class="hero-right text-center position-relative z-1 mt-8 mt-xl-0">
                                    <img src="assets/img/home1/{$slider->getImage()}" alt="fruits"
                                        class="img-fluid position-absolute end-0 top-50 hero-img">
                                    <img src="assets/img/shapes/tree.png" alt="tree"
                                        class="img-fluid position-absolute tree z-1">
                                    <img src="assets/img/shapes/orange-1.png" alt="orange"
                                        class="position-absolute orange-1 z-1">
                                    <img src="assets/img/shapes/orange-2.png" alt="orange"
                                        class="position-absolute orange-2 z-1">
                                    <img src="assets/img/shapes/hero-circle-lg.png" alt="circle shape"
                                        class="img-fluid hero-circle">
                                </div>
                            </div>
                        </div>
                    </div>
                {{/foreach}}
            </div>
        </div>
    </div>
    <div class="at-header-social d-none d-sm-flex align-items-center position-absolute">
        <span class="title fw-medium">Follow on</span>
        <ul class="social-list ms-3">
            <li><a href="https://www.facebook.com"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.linkedin.com"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="https://www.youtube.com"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>
    <div class="gshop-hero-slider-pagination theme-slider-control position-absolute top-50 translate-middle-y z-5">
    </div>
</section>
<!--hero section end-->
<!-- on sale products section start-->
<section class="pt-8 pb-100 bg-white position-relative overflow-hidden z-1 trending-products-area">
<img src="assets/img/shapes/bg-shape-4.png" alt="bg shape" class="position-absolute start-0 bottom-0 w-100 z--1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5">
                <div class="section-title text-center text-xl-start">
                    <h3 class="mb-0">Top Trending Products</h3>
                </div>
            </div>

        </div>
        <div class="row justify-content-center g-4 mt-5 filter_group">
            {foreach $homeProducts as $product}
                {assign var="isInWishlist" value=false}
                {foreach $product_wishlist as $wproduct}
                    {if $wproduct->getId() == $product->getId()}
                        {assign var="isInWishlist" value=true}
                        {break}
                    {/if}
                {/foreach}
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-10 filter_item">

                    <div class="vertical-product-card rounded-2 position-relative">
                        <span
                            class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">{$product->getOffersString()}</span>
                        <div class="thumbnail position-relative text-center p-4">
                            <img src="assets/img/products/{$product->getImage()}" alt="apple" class="img-fluid">
                            <button class="add_wishlist_btn" onclick="heartWishlist(event,this, {$product->getId()})">
                                <i class="{if $isInWishlist} fas {else}far {/if} fa-heart" style="color:red" ;
                                    data-isInWishlist="{if $isInWishlist}true{else}false{/if}"></i>
                            </button>

                        </div>
                        <div class="card-content">
                            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                                {assign var="category" value=$product->getCategory()}
                                <a href="#" class="d-inline-block text-muted fs-xxs">{$category -> getName()} </a>
                            </div>
                            <div class="product-card" style="display: flex; flex-direction: column;">
                                <div class="accessory-card-content">
                                    <a href="singleProduct.php?id={$product->getId()}"
                                        class="card-title fw-bold d-inline-block mb-2 tt-line-clamp tt-clamp-2"
                                        style="flex: 1; text-decoration: none;">
                                        <span class="product-name">{$product->getName()}</span>
                                    </a>

                                    <h6
                                        class=" text-danger card-title fw-bold d-inline-block mb-2 tt-line-clamp tt-clamp-2 ">
                                        €{$product->getPrice()}</h6>
                                </div>

                                <form method="POST"
                                    style="display: flex; justify-content: space-between; align-items: center;">
                                    <!-- Pulsante "Aggiungi al carrello" -->
                                    <button type="button" class="btn btn-outline-secondary d-block btn-md addToCartButton"
                                        data-product-id="{$product->getId()}">Aggiungi al carrello</button>

                                    <!-- Icona del cuore della wishlist -->

                                </form>
                            </div>
                        </div>


                    </div>
                </div>

            {/foreach}
        </div>
    </div>
    </div>

    </div>
    </div>
</section>
<!-- on sale products section end-->
<!--feedback section start-->
<section class="ptb-80 bg-shade position-relative overflow-hidden z-1 feedback-section">
    <img src="assets/img/shapes/bg-shape-5.png" alt="bg shape" class="position-absolute start-0 bottom-0 z--1 w-100">
    <img src="assets/img/shapes/map-bg.png" alt="map" class="position-absolute start-50 top-50 translate-middle z--1">
    <img src="assets/img/shapes/fd-1.png" alt="shape" class="position-absolute z--1 fd-1">
    <img src="assets/img/shapes/fd-2.png" alt="shape" class="position-absolute z--1 fd-2">
    <img src="assets/img/shapes/fd-3.png" alt="shape" class="position-absolute z--1 fd-3">
    <img src="assets/img/shapes/fd-4.png" alt="shape" class="position-absolute z--1 fd-4">
    <img src="assets/img/shapes/fd-5.png" alt="shape" class="position-absolute z--1 fd-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-title text-center">
                    <h2 class="mb-6 text-secondary">Cosa dicono i nostri clienti</h2>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="gshop-feedback-slider-wrapper">
                    <div class="swiper gshop-feedback-thumb-slider">
                    </div>
                    <div class="swiper gshop-feedback-slider mt-4">
                        <div class="swiper-wrapper">
                            {foreach $all_reviews as $review}
                                <div class="swiper-slide feedback-single text-center">
                                    <p class="mb-1 fw-bold fs-5">{$review->getCaption()}</p>
                                    <div class="swiper-slide feedback-single text-center">
                                        <p class="mb-5 fs-6">{$review -> getDescription()} </p>
                                        {assign var="user" value=$review->getUser()}
                                        <span
                                            class="clients_name text-dark fw-bold d-block mb-1 fs-5">{$user-> getName()}</span>
                                        <ul class="star-rating fs-sm d-inline-flex align-items-center text-warning">
                                            {for $i=1 to 5}
                                                {if $i <= $review->getRate()}
                                                    <li><i class="fas fa-star"></i></li>
                                                {else}
                                                    <li><i class="far fa-star"></i></li>
                                                {/if}
                                            {/for}
                                        </ul>
                                    </div>
                                </div>
                            {{/foreach}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--feedback section end-->
<!--scroll bottom to top button start-->