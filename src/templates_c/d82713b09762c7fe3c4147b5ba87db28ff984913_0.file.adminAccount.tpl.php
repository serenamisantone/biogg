<?php
/* Smarty version 4.3.0, created on 2023-12-03 13:14:13
  from 'C:\xampp\htdocs\biogg\src\templates\adminAccount.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_656c711547eaa3_03238948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd82713b09762c7fe3c4147b5ba87db28ff984913' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\adminAccount.tpl',
      1 => 1701097456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_656c711547eaa3_03238948 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
    <!--main content wrapper start-->
    <body>
    <div class="main-wrapper">
        <div class="row g-4">
            <div class="col-xl-3">
                <div class="account-nav bg-white rounded py-5">
                    <h6 class="mb-4 px-4">Manage My Account</h6>
                    <ul class="nav nav-tabs border-0 d-block account-nav-menu">
                        <li>
                            <a href="adminAccount.php#products" data-bs-toggle="tab" class="active">
                            <span class="me-2">
                            <svg
                              width="16"
                              height="16"
                              viewBox="0 0 16 16"
                              fill="none"
                              xmlns="http://www.w3.org/2000/svg"
                            >
                              <path
                                d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                fill="#212B36"
                              />
                              <path
                                d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                fill="#212B36"
                              />
                              <path
                                d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                fill="#212B36"
                              />
                              <path
                                d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                fill="#212B36"
                              />
                            </svg>
                            </span>
                                    Prodotti
                                </a>
                            </li>
                            <li>
                                <a href="adminAccount.php#aggiungi-prodotto" data-bs-toggle="tab">
                                <span class="me-2">
                                <svg
                                  width="16"
                                  height="16"
                                  viewBox="0 0 16 16"
                                  fill="none"
                                  xmlns="http://www.w3.org/2000/svg"
                                >
                                  <path
                                    d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                                    fill="#212B36"
                                  />
                                  <path
                                    d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                                    fill="#212B36"
                                  />
                                  <path
                                    d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                                    fill="#212B36"
                                  />
                                  <path
                                    d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                                    fill="#212B36"
                                  />
                                </svg>
                                </span>
                        Aggiungi prodotto
                    </a>
                </li>
                <li id="categoryTab">
                    <a href="adminAccount.php#category" data-bs-toggle="tab" >
                        <span class="me-2">
                        <svg
                          width="16"
                          height="16"
                          viewBox="0 0 16 16"
                          fill="none"
                          xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                            d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                            fill="#212B36"
                          />
                          <path
                            d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                            fill="#212B36"
                          />
                          <path
                            d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                            fill="#212B36"
                          />
                        </svg>
                        </span>
                        Categorie
                    </a>
                </li>
                <li>
                <a href="adminAccount.php#add-category" data-bs-toggle="tab">
                    <span class="me-2">
                    <svg
                      width="16"
                      height="16"
                      viewBox="0 0 16 16"
                      fill="none"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M3.33333 1.99341H6C6.35362 1.99341 6.69276 2.13388 6.94281 2.38393C7.19286 2.63398 7.33333 2.97312 7.33333 3.32674V5.99341C7.33333 6.34703 7.19286 6.68617 6.94281 6.93622C6.69276 7.18627 6.35362 7.32674 6 7.32674H3.33333C2.97971 7.32674 2.64057 7.18627 2.39052 6.93622C2.14048 6.68617 2 6.34703 2 5.99341V3.32674C2 2.97312 2.14048 2.63398 2.39052 2.38393C2.64057 2.13388 2.97971 1.99341 3.33333 1.99341Z"
                        fill="#212B36"
                      />
                      <path
                        d="M10 1.99341H12.6667C13.0203 1.99341 13.3594 2.13388 13.6095 2.38393C13.8595 2.63398 14 2.97312 14 3.32674V5.99341C14 6.34703 13.8595 6.68617 13.6095 6.93622C13.3594 7.18627 13.0203 7.32674 12.6667 7.32674H10C9.64638 7.32674 9.30724 7.18627 9.05719 6.93622C8.80714 6.68617 8.66667 6.34703 8.66667 5.99341V3.32674C8.66667 2.97312 8.80714 2.63398 9.05719 2.38393C9.30724 2.13388 9.64638 1.99341 10 1.99341Z"
                        fill="#212B36"
                      />
                      <path
                        d="M6 8.66008H3.33333C2.97971 8.66008 2.64057 8.80055 2.39052 9.0506C2.14048 9.30065 2 9.63979 2 9.99341V12.6601C2 13.0137 2.14048 13.3528 2.39052 13.6029C2.64057 13.8529 2.97971 13.9934 3.33333 13.9934H6C6.35362 13.9934 6.69276 13.8529 6.94281 13.6029C7.19286 13.3528 7.33333 13.0137 7.33333 12.6601V9.99341C7.33333 9.63979 7.19286 9.30065 6.94281 9.0506C6.69276 8.80055 6.35362 8.66008 6 8.66008Z"
                        fill="#212B36"
                      />
                      <path
                        d="M10 8.66008H12.6667C13.0203 8.66008 13.3594 8.80055 13.6095 9.0506C13.8595 9.30065 14 9.63979 14 9.99341V12.6601C14 13.0137 13.8595 13.3528 13.6095 13.6029C13.3594 13.8529 13.0203 13.9934 12.6667 13.9934H10C9.64638 13.9934 9.30724 13.8529 9.05719 13.6029C8.80714 13.3528 8.66667 13.0137 8.66667 12.6601V9.99341C8.66667 9.63979 8.80714 9.30065 9.05719 9.0506C9.30724 8.80055 9.64638 8.66008 10 8.66008Z"
                        fill="#212B36"
                      />
                    </svg>
                    </span>
                    Aggiungi Categoria
                </a>
            </li>
            </ul>
        </div>
    </div>
                               
                    <div class="col-xl-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="products">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Prezzo</th>
                                            <th>Categoria</th>
                                            <th>Stock</th>
                                            <th>Online</th>
                                            <th>Immagine</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data_products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
</td>
                                                <?php $_smarty_tpl->_assignInScope('category', $_smarty_tpl->tpl_vars['product']->value->getCategory());?>
                                                <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getIsOnline();?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
</td>
                                                <td>
                                                <form id="editForm_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" enctype="multipart/form-data" class="edit-form" style="display: none;">
                                                <input type="text" id="edit_name_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
">
                                                <input type="text" id="edit_price_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getPrice();?>
">
                                                <select id="edit_category_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" name="edit_category" class="edit-select">
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                                                        <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</option>
                                                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </select>
                                                <input type="text" id="edit_stock_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getStock();?>
">
                                                <select id="edit_online_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="edit-select">
                                                <option value="0" <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsOnline() == 0) {?>selected<?php }?>>Offline</option>
                                                <option value="1" <?php if ($_smarty_tpl->tpl_vars['product']->value->getIsOnline() == 1) {?>selected<?php }?>>Online</option>
                                                </select>
                                                <div id="drop-area">
                                                <input type="text" id="edit_image_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" class="edit-input" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->getImage();?>
">
                                                <input type="file" id="fileInput2_<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
" name="image" class="custom-file-input" required> 
                                            </div>
                                                    
                                                    <button onclick="saveChanges(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)" class="btn btn-primary btn-sm">Salva</button>
                                                    <button type="button" onclick="cancelEdit(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)" class="btn btn-secondary btn-sm">Annulla</button>
                                                </form>


            <button onclick="toggleEditForm(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)" class="btn btn-primary btn-sm btn-edit-product" data-productId="<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
">
                Modifica
            </button>
                                                <button onclick="deleteProduct(<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
)" class="btn btn-secondary btn-sm">Elimina</button>
                                            </td>
                                                
                                            </tr>
                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


<div class="tab-pane fade" id="aggiungi-prodotto">
    <div class="container-fluid bg-light py-4">
        <div class="container bg-white p-4 rounded">
        <h2 class="text-center mb-4 text-secondary display-4">Aggiungi un nuovo prodotto</h2>

            <form id="addProductForm" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="product_name"class="text-primary">Nome:</label>
                    <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Inserisci il nome" required>
                </div>

                <div class="form-group">
                    <label for="product_price"class="text-primary">Prezzo:</label>
                    <input type="number" id="product_price" name="product_price" class="form-control" step="0.01" placeholder="Inserisci il prezzo" required>
                </div>

                <div class="form-group">
                    <label for="product_category"class="text-primary">Categoria:</label>
                    <select id="product_category" name="product_category" class="custom-select" required>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                            <option value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</option>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="product_stock"class="text-primary">Quantità in magazzino:</label>
                    <input type="number" id="product_stock" name="product_stock" class="form-control" placeholder="Inserisci la quantità" required>
                </div>

                <div class="form-group">
                    <label class="text-primary">Disponibile online:</label>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="online_yes" name="product_online" class="custom-control-input" value="1" checked>
                        <label class="custom-control-label" for="online_yes">Sì</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" id="online_no" name="product_online" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="online_no">No</label>
                    </div>
                </div>
                <div id="drop-area">
                <label for="fileInput" class="text-primary">Immagine:</label>
                <input type="file" id="fileInput" name="image" class="custom-file-input" required> 
            </div>
            


                <button type="submit" class="btn btn-primary btn-block" onclick="addProduct()">Aggiungi Prodotto</button>
            </form>
        </div>
    </div>
</div>


<div class="tab-pane fade" id="category">
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <tr class = "category">
                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</td>
                    <td>
                        <button onclick="deleteCategory(<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
)" class="btn btn-primary btn-sm remove_cart_btn" data-category-id="<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
">Elimina</button>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</div>
</div>


<div class="tab-pane fade" id="add-category">
    <div class="container-fluid bg-light py-4">
        <div class="container bg-white p-4 rounded">
        <h2 class="text-center mb-4 text-secondary display-4">Aggiungi una nuova categoria</h2>
        <form id="addCategoryForm">
<div class="form-group">
                    <label for="category_name"class="text-primary">Nome:</label>
                    <input type="text" id="category_name" name="category_name" class="form-control" placeholder="Inserisci il nome" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block" onclick="addNewCategory()">Aggiungi Categoria</button>
                </form>
        </div>
    </div>
</div>
















                        </div>
                    </div><?php }
}
