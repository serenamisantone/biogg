<!--checkout section start-->
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
                                {foreach $addresses as $index1 => $address1}
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="tt-address-content">
                                            <input type="radio" class="tt-custom-radio" {if $index1 === 0}checked{/if}
                                                name="tt-radio-shipment" id="tt-radio-shipment-{$index1 + 1}">
                                            <label for="tt-radio-shipment-{$index1 + 1}"
                                                class="tt-address-info bg-white rounded p-4 position-relative">
                                                <strong>{$address1->getComune()} </strong>
                                                <address class="fs-sm mb-0">
                                                    n. {$address1->getCivico()}, Via {$address1->getVia()} <br>
                                                    {$address1->getRegione()}, {$address1->getProvincia()}
                                                </address>
                                                <a href="#" class="tt-edit-address checkout-radio-link position-absolute"
   onclick="openEditModal(); populateEditForm('{$address1->getId()}','{$address1->getComune()}', '{$address1->getCivico()}', '{$address1->getVia()}', '{$address1->getRegione()}', '{$address1->getProvincia()}');">Modifica</a>

                                                </label>
                                        </div>
                                    </div>
                                {/foreach}
                            </div>
                        </div>
                        <h4 class="mt-8">Payment Method</h4>
                        <div class="checkout-form mt-4 py-7 px-5 bg-white rounded-2">
                            <div class="form-title d-flex align-items-center mb-5">
                                <div class="theme-radio">
                                    <input type="radio" id="credit-card" name="payment-method" checked>
                                    <span class="custom-radio"></span>
                                </div>
                                <label class="h6 mb-0 ms-2" for="credit-card">Credit Card or Debit Card</label>
                            </div>
                            <form>
                                <div class="row g-4">
                                    <div class="col-sm-8">
                                        <div class="label-input-field">
                                            <label></label>
                                            <input type="text" placeholder="Nome Cognome">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="label-input-field mt-0">
                                            <input type="text" placeholder="Numero Carta">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="label-input-field mt-0">
                                            <input type="text" placeholder="MM/AA">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="label-input-field mt-0">
                                            <input type="text" placeholder="CVC">
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex align-items-center gap-2 mt-4 flex-wrap">
                                    <div class="checkbox d-flex align-items-center gap-2 me-3">
                                        <div class="theme-checkbox flex-shrink-0">
                                            <input type="checkbox" id="save-card">
                                            <span class="checkbox-field"><i class="fa-solid fa-check"></i></span>
                                        </div>
                                        <label for="save-card">Save this Credit Card for later use</label>
                                    </div>

                                </div>
                                <div class="mt-6 d-flex">
                                    <button type="submit" class="btn btn-secondary btn-md me-3">Use this Card</button>
                                    <button type="button"
                                        class="btn btn-outline-secondary border-secondary btn-md">Cancel</button>
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
                                                        <input type="text" id="editComune" name="comune"placeholder="Nuovo Comune">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editVia" name="via"placeholder="Nuova Via">
                                                    </div>
                                                </div>
                                                <div class="col-sm-2">
                                                    <div class="label-input-field">
                                                        <input type="text" id="editCivico" name="civico" placeholder="Nuovo Civico">
                                                    </div>
                                                </div>
                                                <input type="text" hidden id="editId" name="addressId"
                                                placeholder="Nuova Regione">
                                            </div>
                                            <div class="mt-6 d-flex">
                                                <button type="button" id="saveEditAddressBtn"
                                                    class="btn btn-secondary btn-md me-3" onclick="saveChanges()">Salva</button>
                                            </div>
                                        </form>
                                    </div>
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
                                <td>Items(2):</td>
                                <td class="text-end">$136,00</td>
                            </tr>
                            <tr>
                                <td>Shipping & handling:</td>
                                <td class="text-end">$3.99</td>
                            </tr>
                            <tr>
                                <td>Before tax:</td>
                                <td class="text-end">$336,04</td>
                            </tr>
                        </table>
                        <span class="sidebar-spacer d-block my-4 opacity-50"></span>
                        <div class="d-flex align-items-center justify-content-between">
                            <h6 class="mb-0 fs-md">Tax collected</h6>
                            <h6 class="mb-0 fs-md">$424.00</h6>
                        </div>
                        <button type="submit" class="btn btn-primary btn-md rounded mt-6 w-100">Place Order</button>
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