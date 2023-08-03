<?php
/* Smarty version 4.3.0, created on 2023-07-25 12:00:21
  from 'C:\xampp\htdocs\biogg\src\templates\myAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64bf9d3555dbe9_75202051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53740b997e5bd7291a57dcb0def20ac803dc4f96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\myAccount.tpl',
      1 => 1690279218,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64bf9d3555dbe9_75202051 (Smarty_Internal_Template $_smarty_tpl) {
?>   <!--my account section-->
   <section class="my-account pt-6 pb-120">
   <div class="container">
      
       <div class="row g-4">
           <div class="col-xl-3">
               <div class="account-nav bg-white rounded py-5">
                   <h6 class="mb-4 px-4">My Account</h6>
                   <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                       <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['menuItems']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <li>
                           <a href="<?php echo $_smarty_tpl->tpl_vars['item']->value['script'];?>
"  data-bs-toggle="tab" >
                               <span class="me-2">
                               <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                           </a>
                       </li>
                       <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                      
                       <li>
                           <a href="logout.php">
                              
                               Log out
                           </a>
                       </li>
                   </ul>
               </div>
           </div>
           
      </div>
      <div class="col-xl-7">
      <div class="tab-content">
          <div class="tab-pane fade show active"> 
                <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['menu']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                </div>
                </div>
            </div>
            </div>
   </div>
</section>
<!--my account section end--><?php }
}
