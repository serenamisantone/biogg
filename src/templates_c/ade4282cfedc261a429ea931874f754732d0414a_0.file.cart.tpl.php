<?php
/* Smarty version 4.3.0, created on 2023-10-19 22:57:13
  from 'C:\xampp\htdocs\biogg\src\templates\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_653198293bf6a5_62913557',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ade4282cfedc261a429ea931874f754732d0414a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\cart.tpl',
      1 => 1697749029,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_653198293bf6a5_62913557 (Smarty_Internal_Template $_smarty_tpl) {
?><!--cart section start-->
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
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cartProducts']->value, 'cartProduct');
$_smarty_tpl->tpl_vars['cartProduct']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cartProduct']->value) {
$_smarty_tpl->tpl_vars['cartProduct']->do_else = false;
?>
                        <?php $_smarty_tpl->_assignInScope('product', $_smarty_tpl->tpl_vars['cartProduct']->value['product']);?>
                        <tr  data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                            <td class="text-center thumbnail">
                                <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
" alt="product-thumb" class="img-fluid">
                            </td>
                            <td href="singleProduct.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="text-start product-title">
                                <h6 class="mb-0"><?php echo $_smarty_tpl->tpl_vars['product']->value->GetName();?>
</h6>
                            </td>
                            <td>
                                <div class="product-qty d-inline-flex align-items-center">
                                    <button class="decrease" data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                        <?php if ($_smarty_tpl->tpl_vars['cartProduct']->value['quantity'] <= 1) {?> disabled="disabled" <?php }?>>-</button>

                                    <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['cartProduct']->value['quantity'];?>
"
                                        data-quantity="<?php echo $_smarty_tpl->tpl_vars['cartProduct']->value['quantity'];?>
" data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                    <button class="increase" data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">+</button>
                                </div>

                            </td>
                            <td>
                                <span class="text-dark fw-bold me-2 d-lg-none">Unit Price:</span>
                                <span class="text-dark fw-bold"><?php echo $_smarty_tpl->tpl_vars['product']->value->GetPrice();?>
€</span>
                            </td>
                            <td>
                                <span class="text-dark fw-bold me-2 d-lg-none">Total Price:</span>
                                <span class="text-dark fw-bold"
                                    id="total-price-<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->GetPrice()*$_smarty_tpl->tpl_vars['cartProduct']->value['quantity'];?>
€</span>
                            </td>
                            <td>
                            <span class="text-dark fw-bold me-2 d-lg-none align_center">Cancella:</span>
                            <a href="#" class="btn btn-primary btn-sm ms-5 rounded-1" onclick="removeFromCartPage(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)" data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">Cancella</a>
                        </td>
                        
                        </tr>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tbody>
            </table>
        </div>
        <div class="row g-4">
           
            <div class="col-xl-5">
                <div class="cart-summery bg-white rounded-2 pt-4 pb-6 px-5 mt-4">
                    <table class="w-100">
                        <tr>
                            <td class="py-3">
                                <h5 class="mb-0 fw-medium">Subtotal</h5>
                            </td>
                            <td class="py-3">
                                <h5 class="mb-0 fw-semibold text-end">$1138,00</h5>
                            </td>
                        </tr>
                        <tr class="border-top">
                            <td class="py-3">
                                <h5 class="mb-0">Total</h5>
                            </td>
                            <td class="text-end py-3">
                                <h5 class="mb-0" id="final-total-price"><?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
€</h5>
                            </td>
                        </tr>
                    </table>
                    <p class="mb-5 mt-2">Shipping options will be updated during checkout.</p>
                    <div class="btns-group d-flex gap-3">
                        <button type="submit" class="btn btn-primary btn-md rounded-1">Confirm Order</button>
                        <a href="shop.php" type="button" 
                            class="btn btn-outline-secondary border-secondary btn-md rounded-1">Continue
                            Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--cart section end--><?php }
}
