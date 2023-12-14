  <!--breadcrumb section start-->

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


                                      <div class=" text-center">
                                          <img src="assets/img/products/{$singleProduct ->getImage()}"
                                              class="img-fluid">
                                      </div>

                                  </div>
                              </div>


                              <div class="col-xl-6">
                                  <div class="product-info">
                                      <h4 class="mt-1 mb-3">{$singleProduct->getName()}</h4>

                                      <div class="pricing mt-2">
                                          <span class="fw-bold fs-xs ">{$singleProduct-> getPrice()}€</span>

                                      </div>
                                      <div class="widget-title d-flex mt-4">
                                          <h6 class="mb-1 flex-shrink-0">Descrizione</h6>
                                          <span
                                              class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                                      </div>
                                      <ul class="d-flex flex-column gap-2">
                                          {assign var="features" value = $product_info -> getFeatures()}
                                          {foreach $features as $feature }
                                              <li><span class="me-2 text-primary"><i
                                                          class="fa-solid fa-circle-check"></i></span>{$feature['title']}
                                              </li>

                                          {/foreach}
                                          <li></li>
                                      </ul>
                                      <div class="d-flex align-items-center gap-4 flex-wrap">
                                          <div class="d-inline-flex product-qty align-items-center updateQuantity"
                                              data-product-id="{$singleProduct->getId()}">
                                              <button class="decreaseFromSingleProduct">-</button>
                                              <input type="text" class="quantity-input" value="1"
                                                  max="{$singleProduct->getStock()}" readonly>
                                              <button class="increaseFromSingleProduct"
                                                  data-product-id="{$singleProduct->getId()}">+</button>
                                          </div>
                                          <a href="cart.php" class="btn btn-secondary btn-md addToCartFromSingleProduct"
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
                                  <p class="mb-4">{$product_info->getDescription()}</p>
                                  <table class="w-100 product-info-table">
                                  {assign var="features" value = $product_info -> getFeatures()}
                                      <tr>
                                          {foreach $features as $feature }
                                              <td class="text-dark fw-semibold">{$feature['title']}</td>
                                              <td>{$feature['description']}</td>
                                          </tr>
                                      {/foreach}
                                      </table>
                                 
                              </div>
                              <div class="tab-pane fade px-4 py-5" id="info">
                                  <h6 class="mb-2">Ingredienti:</h6>
                                  <p class="mb-0">{$product_info ->getIngredients()}</p>

                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-xl-3 col-lg-6 col-md-8">
                  <div class="gshop-sidebar">
                      <div class="sidebar-widget info-sidebar bg-white rounded-3 py-3">
                          <div class="sidebar-info-list d-flex align-items-center gap-3 p-4">
                              <span
                                  class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                  <i class="fa-solid fa-truck-fast"></i>
                              </span>
                              <div class="info-right">
                                  <h6 class="mb-1 fs-md">Spedizione gratuita</h6>
                                  <span class="fw-medium fs-xs">Per ordini superiori a 50€</span>
                              </div>
                          </div>
                          <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                              <span
                                  class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                  <i class="fa-solid fa-circle-dollar-to-slot"></i>
                              </span>
                              <div class="info-right">
                                  <h6 class="mb-1 fs-md">100% Money Back</h6>
                                  <span class="fw-medium fs-xs">Garanzia prodotto assicurata</span>
                              </div>
                          </div>
                          <div class="sidebar-info-list d-flex align-items-center gap-3 p-4 border-top">
                              <span
                                  class="icon-wrapper d-inline-flex align-items-center justify-content-center rounded-circle text-primary">
                                  <i class="fa-regular fa-heart"></i>
                              </span>
                              <div class="info-right">
                                  <h6 class="mb-1 fs-md">Sicurezza e protezione</h6>
                                  <span class="fw-medium fs-xs">Chiamaci sempre e ovunque</span>
                              </div>
                          </div>
                      </div>
                      <div class="sidebar-widget banner-widget mt-4 p-0 border-0">
                          <div class="vertical-banner text-center bg-white rounded-2"
                              data-background="assets/img/banner/banner-4.jpg"
                              style="background-image: url(&quot;assets/img/banner/banner-4.jpg&quot;);">
                              <h5 class="mb-1">Fresh &amp; Organic Spice</h5>
                              <div class="d-flex align-items-center justify-content-center gap-2">
                                  <span
                                      class="hot-badge bg-danger fw-bold fs-xs position-relative text-white">HOT</span>
                                  <span class="offer-title text-danger fw-bold">30% Off</span>
                              </div>
                              <a href="#" class="explore-btn text-primary fw-bold">Shop Now<span class="ms-2"><i
                                          class="fas fa-arrow-right"></i></span></a>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </section>
<!--product details end-->