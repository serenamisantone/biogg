<?php
/* Smarty version 4.3.0, created on 2024-01-25 11:41:02
  from 'C:\xampp\htdocs\biogg\src\templates\checkout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_65b23abee42193_07853052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79e51f21eea22b78bba96bd300317034c012cd03' => 
    array (
      0 => 'C:\\xampp\\htdocs\\biogg\\src\\templates\\checkout.tpl',
      1 => 1702298884,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b23abee42193_07853052 (Smarty_Internal_Template $_smarty_tpl) {
?><!--checkout section start-->
<div class="main-wrapper">
    <div class="checkout-section ptb-120">
        <div class="container">

            <div class="row g-4">
                <div class="col-xl-8">
                    <div class="checkout-steps">
                        <div class="d-flex justify-content-between">
                            <h4 class="mb-5">Shipment Address</h4>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addAddressModal" class="fw-semibold"><i
                                    class="fas fa-plus me-1"></i> Aggiungi Indirizzo</a>
                        </div>
                        <div id="existingAddressesContainer">
                            <div class="row g-4">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['addresses']->value, 'address1', false, 'index1');
$_smarty_tpl->tpl_vars['address1']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index1']->value => $_smarty_tpl->tpl_vars['address1']->value) {
$_smarty_tpl->tpl_vars['address1']->do_else = false;
?>
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="tt-address-content">
                                            <input type="radio" class="tt-custom-radio"
                                                data-address-id="<?php echo $_smarty_tpl->tpl_vars['address1']->value->getId();?>
" <?php if ($_smarty_tpl->tpl_vars['index1']->value === 0) {?>checked<?php }?>
                                                name="tt-radio-shipment" id="tt-radio-shipment-<?php echo $_smarty_tpl->tpl_vars['index1']->value+1;?>
">
                                            <label for="tt-radio-shipment-<?php echo $_smarty_tpl->tpl_vars['index1']->value+1;?>
"
                                                class="tt-address-info bg-white rounded p-4 position-relative">
                                                <strong><?php echo $_smarty_tpl->tpl_vars['address1']->value->getComune();?>
 </strong>
                                                <address class="fs-sm mb-0">
                                                    n. <?php echo $_smarty_tpl->tpl_vars['address1']->value->getCivico();?>
, Via <?php echo $_smarty_tpl->tpl_vars['address1']->value->getVia();?>
 <br>
                                                    <?php echo $_smarty_tpl->tpl_vars['address1']->value->getRegione();?>
, <?php echo $_smarty_tpl->tpl_vars['address1']->value->getProvincia();?>

                                                </address>
                                                <a href="#" class="tt-edit-address checkout-radio-link position-absolute"
                                                    onclick="openEditModal(); populateEditForm('<?php echo $_smarty_tpl->tpl_vars['address1']->value->getId();?>
','<?php echo $_smarty_tpl->tpl_vars['address1']->value->getComune();?>
', '<?php echo $_smarty_tpl->tpl_vars['address1']->value->getCivico();?>
', '<?php echo $_smarty_tpl->tpl_vars['address1']->value->getVia();?>
', '<?php echo $_smarty_tpl->tpl_vars['address1']->value->getRegione();?>
', '<?php echo $_smarty_tpl->tpl_vars['address1']->value->getProvincia();?>
');">Modifica</a>

                                            </label>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </div>
                        </div>
                        <h4 class="mt-8">Payment Method</h4>
                        <?php if (!empty($_smarty_tpl->tpl_vars['creditCards']->value)) {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['creditCards']->value, 'singleCard', false, 'index');
$_smarty_tpl->tpl_vars['singleCard']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['index']->value => $_smarty_tpl->tpl_vars['singleCard']->value) {
$_smarty_tpl->tpl_vars['singleCard']->do_else = false;
?>
                                <div
                                    class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-4">
                                    <div class="radio-left d-inline-flex align-items-center">
                                        <div class="theme-radio">
                                            <input type="radio" name="payment-method" class="payment-method-radio"
                                                <?php if ($_smarty_tpl->tpl_vars['index']->value === 0) {?>checked<?php }?>>
                                            <span class="custom-radio"></span>
                                        </div>
                                        <label class="ms-2 h6 mb-0">Carta <?php echo $_smarty_tpl->tpl_vars['singleCard']->value->getLastFourDigits();?>
</label>
                                    </div>
                                </div>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>

                        <div class="checkout-form mt-4 py-7 px-5 bg-white rounded-2">
                            <div class="form-title d-flex align-items-center mb-5">
                                <label class="h6 mb-0 ms-2" for="credit-card">Aggiungi Credit Card or Debit Card</label>
                            </div>

                            <form id="creditCardForm" method="post">
                                <div id="errorMessages" class="alert alert-danger" style="display: none;"></div>

                                <div class="row g-4">
                                    <div class="col-sm-8">
                                        <div class="label-input-field">
                                            <input type="text" name="name" placeholder="Nome Cognome">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="label-input-field mt-0">
                                            <input type="text" name="numberCard" id="cardNumberInput"
                                                placeholder="Numero Carta" maxlength="16" title="Inserisci solo numeri">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="label-input-field mt-0">
                                            <input type="text" name="expirationDate" id="expirationDateInput"
                                                placeholder="MM/AA" maxlength="5">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="label-input-field mt-0">
                                            <input type="text" name="cvc" placeholder="CVC" maxlength="3">
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center gap-2 mt-4 flex-wrap">
                                    <div class="checkbox d-flex align-items-center gap-2 me-3">
                                        <div class="theme-checkbox flex-shrink-0">
                                            <input type="checkbox" id="save-card">
                                            <span class="checkbox-field"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                        <label for="save-card">Salva questa carta per usarla anche in futuro</label>
                                    </div>

                                </div>
                                <div class="mt-6 d-flex">
                                    <button type="button" id="submitBtn" class="btn btn-secondary btn-md me-3"
                                        onclick="saveCard()">Usa questa carta</button>

                                </div>
                            </form>
                        </div>


                        <div
                            class="checkout-radio d-flex align-items-center justify-content-between gap-3 bg-white rounded p-4 mt-4">
                            <div class="radio-left d-inline-flex align-items-center">
                                <div class="theme-radio">
                                    <input type="radio" id="paypal" name="payment-method">
                                    <span class="custom-radio"></span>
                                </div>
                                <label for="paypal" class="ms-2 h6 mb-0">Paypal</label>
                            </div>
                            <div class="radio-right text-end">
                                <img src="assets/img/brands/paypal-black.png" alt="paypal" class="img-fluid">
                            </div>
                        </div>
                    </div>

                    <!--add address modal start-->

                </div>
                <div class="modal fade" id="addAddressModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                                <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                    <h2 class="modal-title fs-5 mb-3">Aggiungi un nuovo indirizzo</h2>
                                    <div class="row align-items-center g-4 mt-3">
                                        <form id="addAddressForm" method="post">
                                            <div class="row g-4">
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" name="regione" placeholder="Regione">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" name="provincia" placeholder="Provincia">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" name="comune" placeholder="Comune">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" name="via" placeholder="Via">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="label-input-field">
                                                        <input type="text" name="civico" placeholder="Civico">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-6 d-flex">
                                                <button type="button" id="addAddressBtn"
                                                    class="btn btn-secondary btn-md me-3">Salva</button>

                                            </div>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editAddressModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                                <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                    <h2 class="modal-title fs-5 mb-3">Modifica Indirizzo</h2>
                                    <div class="row align-items-center g-4 mt-3">
                                        <form id="editAddressForm" method="post">
                                            <div class="row g-4">
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editRegione" name="regione"
                                                            placeholder="Nuova Regione">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editProvincia" name="provincia"
                                                            placeholder="Nuova Provincia">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editComune" name="comune"
                                                            placeholder="Nuovo Comune">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editVia" name="via"
                                                            placeholder="Nuova Via">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editCivico" name="civico"
                                                            placeholder="Nuovo Civico">
                                                    </div>
                                                </div>
                                                <input type="text" hidden id="editId" name="addressId"
                                                    placeholder="Nuova Regione">
                                            </div>
                                            <div class="mt-6 d-flex">
                                                <button type="button" id="saveEditAddressBtn"
                                                    class="btn btn-secondary btn-md me-3"
                                                    onclick="saveChangesAddress()">Salva</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-4">
                    <div class="checkout-sidebar">
                        <div class="sidebar-widget checkout-sidebar py-6 px-4 bg-white rounded-2">
                            <div class="widget-title d-flex">
                                <h5 class="mb-0 flex-shrink-0">Order Summery</h5>
                                <span class="hr-line w-100 position-relative d-block align-self-end ms-1"></span>
                            </div>
                            <table class="sidebar-table w-100 mt-5">
                                <tr>
                                    <td>Subtotale</td>
                                    <td class="text-end">€<?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
</td>
                                </tr>
                                <tr>
                                    <td>Costi di spedizione</td>
                                    <td class="text-end">€7,00</td>
                                </tr>

                            </table>
                            <span class="sidebar-spacer d-block my-4 opacity-50"></span>
                            <div class="d-flex align-items-center justify-content-between">
                                <h6 class="mb-0 fs-md">Totale (IVA inclusa)</h6>
                                <h6 class="mb-0 fs-md">€<?php echo $_smarty_tpl->tpl_vars['totalPricePlusShipmentCost']->value;?>
</h6>
                            </div>

                            <button type="button" class="btn btn-primary btn-md rounded mt-6 w-100" onclick="saveNewOrder()">Place
                                Order</button>
                            <p class="mt-3 mb-0 fs-xs">By Placing your order your agree to our company <a
                                    href="#">Privacy-policy</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--checkout section end-->
<?php }
}
