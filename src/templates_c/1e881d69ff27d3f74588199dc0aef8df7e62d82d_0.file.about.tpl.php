<?php
/* Smarty version 4.3.0, created on 2024-02-05 18:23:15
  from 'C:\xampp\htdocs\biogg\src\templates\about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65c119838001a7_10072576',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1e881d69ff27d3f74588199dc0aef8df7e62d82d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\about.tpl',
      1 => 1704196860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c119838001a7_10072576 (Smarty_Internal_Template $_smarty_tpl) {
?>  
 
    <!--main content wrapper start-->
    <div class="main-wrapper">
        
        <!--about section start-->
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_about']->value, 'about');
$_smarty_tpl->tpl_vars['about']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['about']->value) {
$_smarty_tpl->tpl_vars['about']->do_else = false;
?>
        <section class="pt-120 ab-about-section position-relative z-1 overflow-hidden">
            <img src="assets/img/shapes/mango.png" alt="mango" class="position-absolute mango z--1">
            <div class="container">
                <div class="row g-5 g-xl-4 align-items-center">
                    <div class="col-xl-6">
                        <div class="ab-left position-relative">
                            <img src="assets/img/about/<?php echo $_smarty_tpl->tpl_vars['about']->value->getImage();?>
" alt="image" class="img-fluid">
                            <div class="text-end">
                                <div class="ab-quote p-4 text-start">
                                    <h4 class="mb-0 fw-normal text-white"><?php echo $_smarty_tpl->tpl_vars['about']->value->getSlogan();?>
 <span class="fs-md fw-medium position-relative">Jim Rohn</span></h4>
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
                            <h2 class="mb-4"><?php echo $_smarty_tpl->tpl_vars['about']->value->getTitle();?>
</h2>
                            <p class="mb-8"><?php echo $_smarty_tpl->tpl_vars['about']->value->getDescription();?>
</p>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="image-box py-6 px-4 image-box-border">
                                        <div class="icon position-relative">
                                            <img src="assets/img/icons/hand-icon.svg" alt="hand icon" class="img-fluid">
                                        </div>
                                        <h4 class="mt-3">La nostra missione</h4>
                                        <p class="mb-0">
                                        <?php echo $_smarty_tpl->tpl_vars['about']->value->getMission();?>
</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="image-box py-6 px-4 image-box-border">
                                        <div class="icon position-relative">
                                            <img src="assets/img/icons/hand-icon.svg" alt="hand icon" class="img-fluid">
                                        </div>
                                        <h4 class="mt-3">La nostra visione</h4>
                                        <p class="mb-0"><?php echo $_smarty_tpl->tpl_vars['about']->value->getVision();?>
</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </section> <!--about section end-->
<p>
</p>
<?php }
}
