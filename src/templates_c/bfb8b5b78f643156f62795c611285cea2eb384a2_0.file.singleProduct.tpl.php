<?php
/* Smarty version 4.3.0, created on 2023-08-11 16:49:33
  from 'C:\xampp\htdocs\biogg\src\templates\singleProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64d64a7df1f3b5_21583539',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfb8b5b78f643156f62795c611285cea2eb384a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\singleProduct.tpl',
      1 => 1691765371,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64d64a7df1f3b5_21583539 (Smarty_Internal_Template $_smarty_tpl) {
?>  <!--breadcrumb section start-->
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
  
</div>
<!--breadcrumb section end-->

<!--product details start-->
<section class="product-details-area ptb-120">
  <div class="container">
      <div class="row g-4">
          <div class="col-xl-9">
              <div class="product-details">
                  <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                      <div class="row align-items-center g-4">
                          <div class="col-xl-6 align-self-end">
                              <div class="quickview-double-slider">
                                  <div class="quickview-product-slider swiper">
                                      <div class="swiper-wrapper">
                                          <div class="swiper-slide text-center">
                                              <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product_info']->value->getImage1();?>
"  class="img-fluid">
                                          </div>
                                         
                                          <div class="swiper-slide text-center">
                                              <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product_info']->value->getImage2();?>
"  class="img-fluid">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="product-thumbnail-slider swiper mt-80">
                                      <div class="swiper-wrapper">
                                          <div class="swiper-slide product-thumb-single rounded-2 d-flex align-items-center justify-content-center">
                                              <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product_info']->value->getImage1();?>
" alt="jam" class="img-fluid">
                                          </div>
                                          <div class="swiper-slide product-thumb-single rounded-2 d-flex align-items-center justify-content-center">
                                              <img src="assets/img/products/<?php echo $_smarty_tpl->tpl_vars['product_info']->value->getImage2();?>
" alt="jam" class="img-fluid">
                                          </div>                                       
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="col-xl-6">
                              <div class="product-info">
                                  <h4 class="mt-1 mb-3"><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h4>
                                
                                  <div class="pricing mt-2">
                                      <span class="fw-bold fs-xs "><?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
€</span>
                                     
                                  </div>
                                  <div class="widget-title d-flex mt-4">
                                      <h6 class="mb-1 flex-shrink-0">Descrizione</h6>
                                      <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                  </div>
                                  <p class="mb-3"><?php echo $_smarty_tpl->tpl_vars['product']->value->getCaption();?>
 </p>                               
                                  <ul class="d-flex flex-column gap-2">   
                                  <?php $_smarty_tpl->_assignInScope('features', $_smarty_tpl->tpl_vars['product_info']->value->getFeatures());?>
                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'feature');
$_smarty_tpl->tpl_vars['feature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->do_else = false;
?>
                                      <li><span class="me-2 text-primary"><i class="fa-solid fa-circle-check"></i></span><?php echo $_smarty_tpl->tpl_vars['feature']->value['title'];?>
</li>
                                      
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                                    <li></li> 
                                  </ul>                           
                                  <div class="d-flex align-items-center gap-4 flex-wrap">
                                      <div class="product-qty d-flex align-items-center">
                                          <button id="decrement">-</button>
                                          <input type="number" value="1" min="1" max = <?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
 data-max = <?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
 id="quantity" disabled>
                                          <button id="increment">+</button>
                                      </div>
                                      <a href="#" class="btn btn-secondary btn-md"><span class="me-2"><i
                                      class="fa-solid fa-bag-shopping"></i></span>Add to Cart</a>
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
                              <h6 class="mb-2">Dettagli:</h6>
                              <p class="mb-4"><?php echo $_smarty_tpl->tpl_vars['product_info']->value->getDescription();?>
</p>
                              
                              <h6 class="mb-2">Ingredienti:</h6>
                              <p class="mb-0"><?php echo $_smarty_tpl->tpl_vars['product_info']->value->getIngredients();?>
</p>
                          </div>
                          <div class="tab-pane fade px-4 py-5" id="info">
                             
                              <table class="w-100 product-info-table">
                              <?php $_smarty_tpl->_assignInScope('features', $_smarty_tpl->tpl_vars['product_info']->value->getFeatures());?>
                              <tr>
                                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['features']->value, 'feature');
$_smarty_tpl->tpl_vars['feature']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->do_else = false;
?>
                                        <td class="text-dark fw-semibold"><?php echo $_smarty_tpl->tpl_vars['feature']->value['title'];?>
</td>
                                      <td><?php echo $_smarty_tpl->tpl_vars['feature']->value['description'];?>
</td>
                                      </tr>
                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                  
                              </table>
                          </div>
                         
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-8">
              <div class="gshop-sidebar">
                  <div class="sidebar-widget info-sidebar bg-white rounded-3 py-3">
                      <div class="sidebar-info-list d-flex align-items-center gap-3 p-4">
                          <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                          <i class="fa-solid fa-truck-fast"></i>
                      </span>
                          <div class="info-right">
                              <h6 class="mb-1 fs-md">Spedizione gratuita</h6>
                              <span class="fw-medium fs-xs">Per ordini superiori a 50€</span>
                          </div>
                      </div>
                      <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                          <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                          <i class="fa-solid fa-circle-dollar-to-slot"></i>
                      </span>
                          <div class="info-right">
                              <h6 class="mb-1 fs-md">100% Money Back</h6>
                              <span class="fw-medium fs-xs">Garanzia prodotto assicurata</span>
                          </div>
                      </div>
                      <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                          <span class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                          <i class="fa-regular fa-heart"></i>
                      </span>
                          <div class="info-right">
                              <h6 class="mb-1 fs-md">Sicurezza e protezione</h6>
                              <span class="fw-medium fs-xs">Chiamaci sempre e ovunque</span>
                          </div>
                      </div>
                  </div>
                  <div class="sidebar-widget banner-widget mt-4 p-0 border-0">
                      <div class="vertical-banner text-center bg-white rounded-2" data-background="assets/img/banner/banner-4.jpg" style="background-image: url(&quot;assets/img/banner/banner-4.jpg&quot;);">
                          <h5 class="mb-1">Fresh &amp; Organic Spice</h5>
                          <div class="d-flex align-items-center justify-content-center gap-2">
                              <span class="hot-badge bg-danger fw-bold fs-xs position-relative text-white">HOT</span>
                              <span class="offer-title text-danger fw-bold">30% Off</span>
                          </div>
                          <a href="#" class="explore-btn text-primary fw-bold">Shop Now<span class="ms-2"><i class="fas fa-arrow-right"></i></span></a>
                      </div>
                  </div>
                  
              </div>
          </div>
      </div>
  </div>
</section>
<!--product details end-->

<?php }
}
