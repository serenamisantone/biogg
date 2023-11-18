<!--cart section start-->
<section class="cart-section ptb-120">
    <div class="container">

        <div class="rounded-2 overflow-hidden">
            <table class="wishlist-table w-100  bg-white">
                <thead>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Price</th>
                    <th>Cancella</th>
                </thead>
                <tbody>
                    {foreach $cartProducts as $cartProduct }
                        {$product= $cartProduct['product']}
                        <tr  data-product-id="{$product->getId()}">
                            <td class="text-center thumbnail">
                                <img src="assets/img/products/{$product->getImage()}" alt="product-thumb" class="img-fluid">
                            </td>
                            <td href="singleProduct.php?id={$product->getId()}" class="text-start product-title">
                                <h6 class="mb-0">{$product->GetName()}</h6>
                            </td>
                            <td>
                                <div class="product-qty d-inline-flex align-items-center">
                                    <button class="decrease" data-product-id="{$product->getId()}"
                                        {if $cartProduct['quantity'] <= 1} disabled="disabled" {/if}>-</button>

                                    <input type="text" value="{$cartProduct['quantity']}"
                                        data-quantity="{$cartProduct['quantity']}" data-product-id="{$product->getId()}">
                                    <button class="increase" data-product-id="{$product->getId()}">+</button>
                                </div>

                            </td>
                            <td>
                                <span class="text-dark fw-bold me-2 d-lg-none">Unit Price:</span>
                                <span class="text-dark fw-bold">{$product->GetPrice()}€</span>
                            </td>
                            <td>
                                <span class="text-dark fw-bold me-2 d-lg-none">Total Price:</span>
                                <span class="text-dark fw-bold"
                                    id="total-price-{$product->getId()}">{$product->GetPrice()*$cartProduct['quantity']}€</span>
                            </td>
                            <td>
                            <span class="text-dark fw-bold me-2 d-lg-none align_center">Cancella:</span>
                            <a href="#" class="btn btn-primary btn-sm ms-5 rounded-1" onclick="removeFromCartPage({$product->getId()})" data-product-id="{$product->getId()}">Cancella</a>
                        </td>
                        
                        </tr>
                    {/foreach}
                </tbody>
            </table>
        </div>
        <div class="row g-4">
           
            <div class="col-xl-5">
                <div class="cart-summery bg-white rounded-2 pt-4 pb-6 px-5 mt-4">
                    <table class="w-100">
                        
                        <tr class="border-top">
                            <td class="py-3">
                                <h5 class="mb-0">Totale</h5>
                            </td>
                            <td class="text-end py-3">
                                <h5 class="mb-0" id="final-total-price">{$totalPrice}€</h5>
                            </td>
                        </tr>
                    </table>
                    <p class="mb-5 mt-2">I costi di spedizione verranno aggiunti durante il checkout.</p>
                    <div class="btns-group d-flex gap-3">
                        <button type="submit" class="btn btn-primary btn-md rounded-1">Conferma ordine</button>
                        <a href="shop.php" type="button" 
                            class="btn btn-outline-secondary border-secondary btn-md rounded-1">Continua con lo
                            Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cart section end-->