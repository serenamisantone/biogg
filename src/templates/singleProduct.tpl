<!--product details start-->
<section class="product-details-area " style="padding-top: 20px; padding-bottom: 20px;">
    <div class="container">
        <div class="row g-4">
            <!-- Prima colonna -->
            <div class="col-xl-8">
                <div class="product-details">
                    <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                        <div class="row align-items-center">
                            <div class="col-xl-6 align-self-end">
                                <div class="quickview-double-slider">
                                    <div class="text-center">
                                        <img src="assets/img/products/{$singleProduct ->getImage()}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="product-info">
                                    <h4 class="mt-1 mb-3">{$singleProduct->getName()}</h4>
                                    <div class="pricing mt-2">
                                        <span class="fw-bold fs-xs ">{$singleProduct-> getPrice()}€</span>
                                    </div>
                                    <div class="widget-title d-flex mt-4">
                                        {assign var="category" value=$singleProduct->getCategory()}
                                        <h6 class="mb-1 flex-shrink-0">Categoria:</h6>
                                        <a href="shop.php?categoryId={$category->getId()}"
                                            style="margin-left: 10px;">{$category->getName()}</a>
                                    </div>
                                    <div class="widget-title d-flex mt-4">
                                        {assign var="manufacturer" value=$singleProduct->getManufacturer()}
                                        <h6 class="mb-1 flex-shrink-0">Produttore:</h6>
                                        <a href="shop.php?manufacturerId={$manufacturer->getId()}"
                                            style="margin-left: 10px;">{$manufacturer->getName()}</a>
                                    </div>

                                    <div class="d-flex align-items-center gap-4 flex-wrap">
                                        <div class="d-inline-flex product-qty align-items-center updateQuantity"
                                            data-product-id="{$singleProduct->getId()}">
                                            <button class="decreaseFromSingleProduct">-</button>
                                            <input type="text" class="quantity-input" value="1"
                                                max="{$singleProduct->getStock()}" readonly>
                                            <button class="increaseFromSingleProduct"
                                                data-product-id="{$singleProduct->getId()}">+</button>
                                        </div>
                                        <a href="#" class="btn btn-secondary btn-md addToCartFromSingleProduct"
                                            data-product-id="{$singleProduct->getId()}"><span class="me-2"><i
                                                    class="fa-solid fa-bag-shopping"></i></span>Aggiungi al
                                            carrello</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-info-tab bg-white rounded-2 overflow-hidden pt-6 mt-4">
                        <ul class="nav nav-tabs border-bottom justify-content-center gap-5 pt-info-tab-nav">
                            <li><a href="#description" class="active" data-bs-toggle="tab">Descrizione</a></li>
                            <li><a href="#info" data-bs-toggle="tab">Altre informazioni</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active px-4 py-5" id="description">
                                <p>{$product_info->getDescription()} </p>
                            </div>
                            <div class="tab-pane fade px-4 py-5" id="info">
                                <h6 class="mb-2">Ingredienti:</h6>
                                <p class="mb-0">{$product_info ->getIngredients()}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Seconda colonna -->
            <div class="col-xl-4">
                <div class="sidebar-widget products-widget py-5 px-4 bg-white mt-4">
                    <div class="widget-title d-flex">
                        <h6 class="mb-0 flex-shrink-0">Potrebbero interessarti:</h6>
                        <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                    </div>
                    <div class="sidebar-products-list">
                        {foreach $categoryProducts as $categoryProduct}
                            <div
                                class="horizontal-product-card card-md d-sm-flex align-items-center bg-white rounded-2 gap-3 mt-4">
                                <div class="thumbnail position-relative rounded-2">
                                    <a href="#"><img src="assets/img/products/{$categoryProduct->getImage()}" alt="product"
                                            class="img-fluid"></a>
                                    <div
                                        class="product-overlay position-absolute start-0 top-0 w-100 h-100 d-flex align-items-center justify-content-center gap-2 rounded-2">
                                        <a href="singleProduct.php?id={$categoryProduct->getId()}" class="rounded-btn"><i
                                                class="fa-solid fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="card-content mt-3 mt-sm-0">
                                    <a href="singleProduct.php?id={$categoryProduct->getId()}"
                                        class="d-block fs-sm fw-bold text-heading title d-block">{$categoryProduct->getName()}</a>
                                    <div class="pricing mt-0">
                                        <span class="fw-bold fs-xxs text-danger">{$categoryProduct->getPrice()}€</span>
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
<!--product details end-->