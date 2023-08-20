<!--main content wrapper start-->
<div class="main-wrapper">
    <!--breadcrumb section start-->

    <!--breadcrumb section end-->

    <!--shop grid section start-->
    <section class="gshop-gshop-grid ptb-120">
        <div class="container">
            <div class="row g-4">
                <div class="col-xl-3">
                    <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                        <div class="sidebar-widget search-widget bg-white py-5 px-4">
                            <div class="widget-title d-flex">
                                <h6 class="mb-0 flex-shrink-0">Search Now</h6>
                                <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                            </div>
                            <form class="search-form d-flex align-items-center mt-4">
                                <input type="text" placeholder="Search...">
                                <button type="submit" class="submit-icon-btn-secondary"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top">
                            <div class="widget-title d-flex">
                                <h6 class="mb-0 flex-shrink-0">Categories</h6>
                                <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                            </div>
                            <ul class="widget-nav mt-4">
                                {foreach $all_categories as $category}
                                    <li><a href="#"
                                            class="d-flex justify-content-between align-items-center">{$category->getName()}</a>
                                    </li>
                                {{/foreach}}
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="shop-grid">
                        <div
                            class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-5 mb-6">
                            <p class="mb-0 fw-bold">Showing 1-12 of 45 results</p>

                        </div>
                        <div class="row g-4 justify-content-center">
                            {foreach $all_products as $product}
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">
                                        <span
                                            class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">-12%
                                            OFF</span>
                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="assets/img/products/{$product->getImage()}" alt="apple"
                                                class="img-fluid">
                                        </div>
                                        
                                        <div class="card-content">
                                            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                                                {assign var="category" value=$product->getCategory()}
                                                <a class="d-inline-block text-muted fs-xxs">{$category -> getName()}</a>
                                            </div>
                                            <a href="singleProduct.php?id={$product->getId()}"
                                                class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2" >{$product->getName()}</a>
                                            <h6 class="price text-danger mb-4">€{$product->getPrice()}</h6>
                                            <form action="shop.php" method="post">
                                            <input type="hidden" name="addProduct" value="{$product->getId()}">
                                            <button type="submit" class="btn btn-outline-secondary d-block btn-md">Add to Cart</button>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}

                        </div>
                        <ul class="template-pagination d-flex align-items-center mt-6">
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fas fa-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--shop grid section end-->