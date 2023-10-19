<?php
/* Smarty version 4.3.0, created on 2023-10-18 14:10:48
  from 'C:\xampp\htdocs\biogg\src\templates\shop.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_652fcb481304c0_84435452',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20dfaa9361f825ab0948e6e4bfe826acc9b490d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\shop.tpl',
      1 => 1697491135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_652fcb481304c0_84435452 (Smarty_Internal_Template $_smarty_tpl) {
?><head>
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<!--main content wrapper start-->
<div class="main-wrapper">
    <!--breadcrumb section start-->
    <div class="gstore-breadcrumb position-relative z-1 overflow-hidden mt--50">
        <img src="assets/img/shapes/bg-shape-6.png" alt="bg-shape"
            class="position-absolute start-0 z--1 w-100 bg-shape">
        <img src="assets/img/shapes/pata-xs.svg" alt="pata" class="position-absolute pata-xs z--1 vector-shape">
        <img src="assets/img/shapes/onion.png" alt="onion"
            class="position-absolute z--1 onion start-0 top-0 vector-shape">
        <img src="assets/img/shapes/frame-circle.svg" alt="frame circle"
            class="position-absolute z--1 frame-circle vector-shape">
        <img src="assets/img/shapes/leaf.svg" alt="leaf" class="position-absolute z--1 leaf vector-shape">
        <img src="assets/img/shapes/garlic-white.png" alt="garlic" class="position-absolute z--1 garlic vector-shape">
        <img src="assets/img/shapes/roll-1.png" alt="roll" class="position-absolute z--1 roll vector-shape">
        <img src="assets/img/shapes/roll-2.png" alt="roll" class="position-absolute z--1 roll-2 vector-shape">
        <img src="assets/img/shapes/pata-xs.svg" alt="roll" class="position-absolute z--1 pata-xs-2 vector-shape">
        <img src="assets/img/shapes/tomato-half.svg" alt="tomato"
            class="position-absolute z--1 tomato-half vector-shape">
        <img src="assets/img/shapes/tomato-slice.svg" alt="tomato"
            class="position-absolute z--1 tomato-slice vector-shape">
        <img src="assets/img/shapes/cauliflower.png" alt="tomato"
            class="position-absolute z--1 cauliflower vector-shape">
        <img src="assets/img/shapes/leaf-gray.png" alt="tomato" class="position-absolute z--1 leaf-gray vector-shape">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h1 class="mb-2 text-center">Shop</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                    <li><a href="#"
                                            class="d-flex justify-content-between align-items-center"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</a>
                                    </li>
                                <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

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
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['all_products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                <?php $_smarty_tpl->_assignInScope('isInWishlist', false);?>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['product_wishlist']->value, 'wproduct');
$_smarty_tpl->tpl_vars['wproduct']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['wproduct']->value) {
$_smarty_tpl->tpl_vars['wproduct']->do_else = false;
?>
                                    <?php if ($_smarty_tpl->tpl_vars['wproduct']->value->getId() == $_smarty_tpl->tpl_vars['product']->value->getId()) {?>
                                        <?php $_smarty_tpl->_assignInScope('isInWishlist', true);?>
                                        <?php break 1;?>
                                    <?php }?>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <div class="col-lg-4 col-md-6 col-sm-10">
                                    <div
                                        class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">
                                        <span
                                            class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">-12%
                                            OFF</span>
                                        <div class="thumbnail position-relative text-center p-4">
                                            <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
" alt="apple"
                                                class="img-fluid">
                                                <button class="add_wishlist_btn"
                                                onclick="heartWishlist(this, <?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)">
                                            <i class="<?php if ($_smarty_tpl->tpl_vars['isInWishlist']->value) {?> fas <?php } else { ?>far <?php }?> fa-heart" style="color:red";
                                            data-isInWishlist="<?php if ($_smarty_tpl->tpl_vars['isInWishlist']->value) {?>true<?php } else { ?>false<?php }?>"></i>
                                        </button>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                                                <?php $_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['product']->value->getCategory());?>
                                                <a href="#"
                                                    class="d-inline-block text-muted fs-xxs"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
 </a>
                                            </div>
                                            <div class="product-card">
                                                <div style="display: flex; align-items: center;">
                                                    <a href="#"
                                                        class="card-title fw-bold d-inline-block mb-2 tt-line-clamp tt-clamp-2"
                                                        style="flex: 1; text-decoration: none;">
                                                        <span class="product-name"><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <h6 class="price text-danger mb-4">€<?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>

                                            </h6>
                                            <form method="POST" action="shop.php">
                                                <input type="hidden" name="addProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                                <button type="submit"
                                                    class="btn btn-outline-secondary d-block btn-md">Aggiungi al
                                                    carrello</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

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
    </div>
</section>
<!--shop grid section end-->
<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.6.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="assets/js/methods.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  var isInWishlist = <?php echo $_smarty_tpl->tpl_vars['isInWishlist']->value;?>
; // Dichiarazione della variabile isInWishlist
  var productId = <?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
; // Dichiarazione della variabile productId
<?php echo '</script'; ?>
>

<?php }
}
