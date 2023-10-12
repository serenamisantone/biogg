<?php
/* Smarty version 4.3.0, created on 2023-10-13 00:02:05
  from 'C:\Users\fpall\Desktop\camillabiogg\htdocs\biogg\src\templates\wishlist.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65286cdd054300_61721259',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd1945c9f608ed3a6238805c4e134bf46e481a31' => 
    array (
      0 => 'C:\\Users\\fpall\\Desktop\\camillabiogg\\htdocs\\biogg\\src\\templates\\wishlist.tpl',
      1 => 1697148079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65286cdd054300_61721259 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<body>

    <!--main content wrapper start-->
    <div class="main-wrapper">



        <!--breadcrumb section start-->
        <div class="gstore-breadcrumb position-relative z-1 overflow-hidden mt--50">
            <img src="assets/img/shapes/bg-shape-6.png" alt="bg-shape" class="position-absolute start-0 z--1 w-100 bg-shape">
            <img src="assets/img/shapes/pata-xs.svg" alt="pata" class="position-absolute pata-xs z--1 vector-shape">
            <img src="assets/img/shapes/onion.png" alt="onion" class="position-absolute z--1 onion start-0 top-0 vector-shape">
            <img src="assets/img/shapes/frame-circle.svg" alt="frame circle" class="position-absolute z--1 frame-circle vector-shape">
            <img src="assets/img/shapes/leaf.svg" alt="leaf" class="position-absolute z--1 leaf vector-shape">
            <img src="assets/img/shapes/garlic-white.png" alt="garlic" class="position-absolute z--1 garlic vector-shape">
            <img src="assets/img/shapes/roll-1.png" alt="roll" class="position-absolute z--1 roll vector-shape">
            <img src="assets/img/shapes/roll-2.png" alt="roll" class="position-absolute z--1 roll-2 vector-shape">
            <img src="assets/img/shapes/pata-xs.svg" alt="roll" class="position-absolute z--1 pata-xs-2 vector-shape">
            <img src="assets/img/shapes/tomato-half.svg" alt="tomato" class="position-absolute z--1 tomato-half vector-shape">
            <img src="assets/img/shapes/tomato-slice.svg" alt="tomato" class="position-absolute z--1 tomato-slice vector-shape">
            <img src="assets/img/shapes/cauliflower.png" alt="tomato" class="position-absolute z--1 cauliflower vector-shape">
            <img src="assets/img/shapes/leaf-gray.png" alt="tomato" class="position-absolute z--1 leaf-gray vector-shape">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-content">
                            <h2 class="mb-2 text-center">Wishlist Page</h2>
                            <nav>
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item fw-bold" aria-current="page"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item fw-bold" aria-current="page">Page</li>
                                    <li class="breadcrumb-item fw-bold" aria-current="page">Wishlist Page</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--breadcrumb section end-->


        <!--wishlist section start-->
        <section class="wishlist-section ptb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="wishlist-table bg-white">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">Prodotto</th>
                                        <th class="text-center">Prezzo</th>
                                        <th class="text-center"></th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['wishlistItems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                    <tr>    
                                        <td class="text-center thumbnail">
                                            <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['item']->value->getImage();?>
" alt="product-thumb" class="img-fluid">
                                        </td>
                                        <td>
                                            <span class="fw-bold text-secondary fs-xs"><?php echo $_smarty_tpl->tpl_vars['item']->value->getCategory()->getName();?>
</span>
                                            <h6 class="mb-1 mt-1"><?php echo $_smarty_tpl->tpl_vars['item']->value->getName();?>
</h6>
                                        </td>
                                        <td class="text-end">
                                            <span class="price fw-bold text-dark">€<?php echo $_smarty_tpl->tpl_vars['item']->value->getPrice();?>
</s>
                                        </td>
                                        <td>
                                        <a href="#" class="btn btn-secondary btn-sm ms-5 rounded-1">Aggiungi al carrello</a>
                                        <a href="#" class="btn btn-primary btn-sm ms-5 rounded-1" onclick="removeFromWishlist(<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
)"data-product-id="<?php echo $_smarty_tpl->tpl_vars['item']->value->getId();?>
">Cancella</a>

                                    </td>
                                    
                                    </tr>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--wishlist section end-->


    </div>

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
 src="assets/js/methods.js"><?php echo '</script'; ?>
>
    <!--endbuild-->
</body>

</html>

<?php }
}
