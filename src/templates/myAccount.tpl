   <!--my account section-->
   <section class="my-account pt-6 pb-120">
   <div class="container">
      
       <div class="row g-4">
           <div class="col-xl-3">
               <div class="account-nav bg-white rounded py-5">
                   <h6 class="mb-4 px-4">My Account</h6>
                   <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                       {foreach $menuItems as $item }
                        <li>
                           <a href="{$item['script']}"  data-bs-toggle="tab" >
                               <span class="me-2">
                               {$item['name']}
                           </a>
                       </li>
                       {/foreach}
                      
                       <li>
                           <a href="logout.php">
                              
                               Log out
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
           
      </div>
      <div class="col-xl-9">
      <div class="tab-content">
          <div class="tab-pane fade show active"> 
                {include file = "{$menu}"}
                </div>
                </div>
            </div>
            </div>
   </div>
</section>
<!--my account section end-->