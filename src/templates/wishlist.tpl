
        <!--wishlist section start-->
        <section class="wishlist-section" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wishlist-table w-100  bg-white">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Prodotto</th>
                                        <th class="text-center">Prezzo</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {foreach $wishlistItems as $item}
                                        <tr class="wishlist_product">
                                            <td class="text-center thumbnail">
                                                <img src="assets/img/products/{$item->getImage()}" alt="product-thumb"
                                                    class="img-fluid">
                                            </td>
                                            <td>
                                                <span
                                                    class="fw-bold text-secondary fs-xs">{$item->getCategory()->getName()}</span>
                                                <h6 class="mb-1 mt-1">{$item->getName()}</h6>
                                            </td>
                                            <td class="text-end">
                                                <span class="price fw-bold text-dark">€{$item->getPrice()}</s>
                                            </td>
                                            <td>

                                
                                                        <button type="button" class="btn btn-outline-secondary d-block btn-md addToCartButton"
                                                            data-product-id="{$item->getId()}">Aggiungi al carrello</button>
                                                   
                                            </td>
                                            <td>
                                                <a  class="btn btn-primary btn-sm ms-5 rounded-1 remove_cart_btn"
                                                    onclick="removeFromWishlist({$item->getId()})"
                                                    data-product-id="{$item->getId()}">Cancella</a>

                                            </td>

                                        </tr>
                                    {/foreach}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--wishlist section end-->


   