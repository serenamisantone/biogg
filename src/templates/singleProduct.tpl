  <!--breadcrumb section start-->

  <!--breadcrumb section end-->

  <!--product details start-->
  <section class="product-details-area " style="padding-top: 20px; padding-bottom: 20px;">
      <div class="container">
          <div class="row g-4 ">
              <div class="col-xl-9 ">
                  <div class="product-details ">
                      <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                          <div class="row align-items-center ">
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

          </div>
      </div>
  </section>
<!--product details end-->