  
 
    <!--main content wrapper start-->
    <div class="main-wrapper">
        
        <!--about section start-->
        {foreach $data_about as $about}
        <section class="pt-120 ab-about-section position-relative z-1 overflow-hidden">
            <img src="assets/img/shapes/mango.png" alt="mango" class="position-absolute mango z--1">
            <div class="container">
                <div class="row g-5 g-xl-4 align-items-center">
                    <div class="col-xl-6">
                        <div class="ab-left position-relative">
                            <img src="assets/img/about/{$about->getImage()}" alt="image" class="img-fluid">
                            <div class="text-end">
                                <div class="ab-quote p-4 text-start">
                                    <h4 class="mb-0 fw-normal text-white">{$about->getSlogan()} <span class="fs-md fw-medium position-relative">Jim Rohn</span></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="ab-about-right">
                            <div class="subtitle d-flex align-items-center gap-3 flex-wrap">
                                <h6 class="mb-0 gshop-subtitle text-secondary">Perchè scegliere noi</h6>
                                <span>
                                  <svg width="78" height="16" viewBox="0 0 78 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <line x1="0.0138875" y1="7.0001" x2="72.0139" y2="8.0001" stroke="#FF7C08" stroke-width="2"/>
                                      <path d="M78 8L66 14.9282L66 1.0718L78 8Z" fill="#FF7C08"/>
                                  </svg>    
                              </span>
                            </div>
                            <h2 class="mb-4">{$about->getTitle()}</h2>
                            <p class="mb-8">{$about->getDescription()}</p>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="image-box py-6 px-4 image-box-border">
                                        <div class="icon position-relative">
                                            <img src="assets/img/icons/hand-icon.svg" alt="hand icon" class="img-fluid">
                                        </div>
                                        <h4 class="mt-3">La nostra missione</h4>
                                        <p class="mb-0">
                                        {$about->getMission()}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-box py-6 px-4 image-box-border">
                                        <div class="icon position-relative">
                                            <img src="assets/img/icons/hand-icon.svg" alt="hand icon" class="img-fluid">
                                        </div>
                                        <h4 class="mt-3">La nostra visione</h4>
                                        <p class="mb-0">{$about->getVision()}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {/foreach}
        </section> <!--about section end-->
<p>
</p>
