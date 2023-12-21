<!--main content wrapper start-->
<div class="main-wrapper">

    <!--shop grid section start-->
    <section class="gshop-gshop-grid" style="padding-top: 20px; padding-bottom: 20px;">
        <div class="container" id="products-container">
            <div class="row g-4">
                <div class="col-xl-3">
                    <div class="gshop-sidebar bg-white rounded-2 overflow-hidden">
                        <div class="sidebar-widget search-widget bg-white py-5 px-4"
                            style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="widget-title d-flex">
                                <h6 class="mb-0 flex-shrink-0">Search Now</h6>
                                <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                            </div>
                            <form class="search-form d-flex align-items-center mt-4" action="shop.php" method="GET">
                                <input type="text" name="searchQuery" id="searchQuery" placeholder="Search...">
                                <button class="submit-icon-btn-secondary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </form>

                        </div>
                        <div class="sidebar-widget category-widget bg-white py-5 px-4 border-top">
                            <div class="widget-title d-flex">
                                <h6 class="mb-0 flex-shrink-0">Categorie</h6>
                                <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                            </div>
                            <ul class="widget-nav mt-4">
                                {foreach $all_categories as $category}
                                    <li>
                                        <a href="shop.php?categoryId={$category->getId()}"
                                            class="d-flex justify-content-between align-items-center">
                                            {$category->getName()}
                                        </a>
                                    </li>
                                {/foreach}
                            </ul>

                        </div>


                    </div>
                </div>
                <div class="col-xl-9">
                    <div class="shop-grid">
                        <div
                            class="listing-top d-flex align-items-center justify-content-between flex-wrap gap-3 bg-white rounded-2 px-4 py-2 mb-6">
                            <p class="mb-0 fw-bold">Showing 1-9 of {$total_products} results</p>

                        </div>

                        <div class="row g-4 justify-content-center" id="products-section">
                            {foreach $all_products as $product}
                                {assign var="isInWishlist" value=false}
                                {foreach $product_wishlist as $wproduct}
                                    {if $wproduct->getId() == $product->getId()}
                                        {assign var="isInWishlist" value=true}
                                        {break}
                                    {/if}
                                {/foreach}
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">

                                        {if $product->getOffersString() neq null}
                                            <span
                                                class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">{$product->getOffersString()}</span>
                                        {/if}

                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="assets/img/products/{$product->getImage()}" alt="apple"
                                                class="img-fluid">
                                            <button class="add_wishlist_btn"
                                                onclick="heartWishlist(event,this, {$product->getId()})">
                                                <i class="{if $isInWishlist} fas {else}far {/if} fa-heart" style="color:red"
                                                    ; data-isInWishlist="{if $isInWishlist}true{else}false{/if}"></i>
                                            </button>

                                        </div>
                                        <div class="card-content">
                                            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                                                {assign var="category" value=$product->getCategory()}
                                                <a href="#"
                                                    class="d-inline-block text-muted fs-xxs">{$category -> getName()} </a>
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
                                                    <button type="button"
                                                        class="btn btn-outline-secondary d-block btn-md addToCartButton"
                                                        data-product-id="{$product->getId()}">Aggiungi al carrello</button>

                                                    <!-- Icona del cuore della wishlist -->

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {/foreach}

                        </div>
                        <ul class="template-pagination d-flex align-items-center mt-6">
                            {for $page = 1 to $total_pages}
                                {if $page == $current_page}
                                    <li><a href="shop.php?page={$page}" style=" background-color: #4CAF50;
                                color: white; ">{$page}</a></li>
                                {else}
                                    <li><a href="shop.php?page={$page}">{$page}</a></li>
                                {/if}
                            {/for}
                            {if $current_page < $total_pages}
                                <li><a href="shop.php?page={$current_page + 1}"><i class="fas fa-arrow-right"></i></a></li>
                            {/if}
                        </ul>



                    </div>


                </div>
            </div>

        </div>
    </section>
</div>

<!--shop grid section end-->