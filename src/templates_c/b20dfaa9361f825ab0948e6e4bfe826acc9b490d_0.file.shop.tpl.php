<?php
/* Smarty version 4.3.0, created on 2023-08-25 14:04:39
  from 'C:\xampp\htdocs\biogg\src\templates\shop.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64e898d782eb82_78081784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b20dfaa9361f825ab0948e6e4bfe826acc9b490d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\shop.tpl',
      1 => 1692363777,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64e898d782eb82_78081784 (Smarty_Internal_Template $_smarty_tpl) {
?><!--main content wrapper start-->
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
                                        </div>
                                        
                                        <div class="card-content">
                                            <div class="mb-2 tt-category tt-line-clamp tt-clamp-1">
                                                <?php $_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['product']->value->getCategory());?>
                                                <a class="d-inline-block text-muted fs-xxs"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</a>
                                            </div>
                                            <a href="singleProduct.php?id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                                                class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2" ><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</a>
                                            <h6 class="price text-danger mb-4">€<?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
</h6>
                                            <form action="shop.php" method="post">
                                            <input type="hidden" name="addProduct" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                                            <button type="submit" class="btn btn-outline-secondary d-block btn-md">Add to Cart</button>
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
    </section>
<!--shop grid section end--><?php }
}
