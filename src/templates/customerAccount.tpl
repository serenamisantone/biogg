<!--my account section-->
<section class="my-account pt-6 pb-120">
  <div class="container">

    <div class="profile-inf-right">
      <h4 class="mb-2">{$user->getName()} {$user->getSurname()}</h4>


      <div class="row g-4">
        <div class="col-xl-3">
          <div class="account-nav bg-white rounded py-5">
            <h6 class="mb-4 px-4">Gestisci Account</h6>
            <ul class="nav nav-tabs border-0 d-block account-nav-menu">
              <li>
                <a href="#manageAddresses" data-bs-toggle="tab" class="active">
                  <span class="me-2">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                        fill="#4EB529" />
                    </svg>
                  </span>
                  Indirizzi
                </a>
              </li>
              <li>
                <a href="#order-history" data-bs-toggle="tab">
                  <span class="me-2">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                        fill="#4EB529" />
                    </svg>
                  </span>
                  Storico ordini
                </a>
              </li>

              <li>
                <a href="#payments" data-bs-toggle="tab">
                  <span class="me-2">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                        fill="#4EB529" />
                    </svg>
                  </span>

                  Metodi di pagamento
                </a>
              </li>
              <li>
                <a href="#update-profile" data-bs-toggle="tab">
                  <span class="me-2">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                        fill="#4EB529" />
                    </svg>
                  </span>
                  Modifica profilo
                </a>
              </li>

              <li>
                <a href="logout.php">
                  <span class="me-2">
                    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0.332031 1.33333V0.666667C0.332031 0.3 0.632031 0 0.998698 0H12.332C12.6987 0 12.9987 0.3 12.9987 0.666667V1.33333C12.9987 1.7 12.6987 2 12.332 2H0.998698C0.632031 2 0.332031 1.7 0.332031 1.33333ZM12.332 3.33333H0.998698C0.632031 3.33333 0.332031 3.63333 0.332031 4V8C0.332031 8.36667 0.632031 8.66667 0.998698 8.66667H12.332C12.6987 8.66667 12.9987 8.36667 12.9987 8V4C12.9987 3.63333 12.6987 3.33333 12.332 3.33333ZM0.998698 12H12.332C12.6987 12 12.9987 11.7 12.9987 11.3333V10.6667C12.9987 10.3 12.6987 10 12.332 10H0.998698C0.632031 10 0.332031 10.3 0.332031 10.6667V11.3333C0.332031 11.7 0.632031 12 0.998698 12Z"
                        fill="#4EB529" />
                    </svg>
                  </span>
                  Log out
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-9">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="manageAddresses">
              <div class="address-book bg-white rounded p-5">
                <div class="row g-6">

                  <h6 class="mb-4 px-4">Indirizzi</h6>

                  <div id="existingAddressesContainer">
                    <div class="row g-4">
                      {foreach $addresses as $index1 => $address1}
                        <div class="col-lg-6 col-sm-6">
                          <div class="tt-address-content">
                            <input class="tt-custom-radio" data-address-id="{$address1->getId()}" name="tt-radio-shipment"
                              id="tt-radio-shipment-{$index1 + 1}">
                            <label for="tt-radio-shipment-{$index1 + 1}"
                              class="tt-address-info bg-white  p-4 position-relative">

                              <strong>{$address1->getComune()} </strong>
                              <address class="fs-sm mb-0">
                                n. {$address1->getCivico()}, Via {$address1->getVia()} <br>
                                {$address1->getRegione()}, {$address1->getProvincia()}
                              </address>
                              <a href="#" class="tt-edit-address  position-absolute"
                                onclick="openEditModal(); populateEditForm('{$address1->getId()}','{$address1->getComune()}', '{$address1->getCivico()}', '{$address1->getVia()}', '{$address1->getRegione()}', '{$address1->getProvincia()}');">Modifica</a>

                              <a class="fa-solid fa-trash-can  " onclick="deleteAddress({$address1->getId()})"></a>
                            </label>
                          </div>
                        </div>
                      {/foreach}
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-5 mb-4">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addAddressModal2" class="btn btn-primary mt-4 ">
                      <span class="me-2"><i class="fas fa-plus"></i></span>
                      Aggiungi Indirizzo
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="order-history">
              <div class="recent-orders bg-white rounded py-5">
                <h6 class="mb-4 px-4">I tuoi ordini</h6>
                <div class="table-responsive">
                  <table class="order-history-table table">
                    <tr>
                      <th>Numero ordine</th>
                      <th>Data di emissione</th>
                      <th>Stato ordine</th>
                      <th>Totale</th>
                      <th class="text-center"></th>
                    </tr>
                    {foreach $userOrders as $userOrder}
                      <tr>
                        <td>{$userOrder->getOrderId()}</td>
                        <td>{$userOrder->getDate()}</td>
                        <td>{$userOrder->getStatus()}</td>
                        <td class="text-secondary">{$userOrder->getTotal()}€</td>
                        <td class="text-center">
                          <a href="#" class="view-invoice fs-xs"
                            onclick="openProductsModal({$userOrder->getShoppingCart()},{$userOrder->getOrderId()})">
                            <i class="fas fa-eye"></i>
                          </a>

                        </td>
                      </tr>
                    {/foreach}
                  </table>

                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="payments">
              <div class="payment-methods bg-white rounded py-5 px-4">
                <h6 class="mb-4">Metodi di pagamento</h6>
                <div class="table-responsive">
                  <table class="payments-list-table table">
                    <tr>

                      <th>Nome</th>
                      <th>Numero carta</th>
                      <th>Data di scadenza</th>
                      <th class="text-center"></th>
                    </tr>
                    {foreach $userCards as $userCard}
                      <tr>

                        <td>{$userCard->getName()}</td>
                        <td>************{$userCard->getLastFourDigits()}</td>
                        <td>{$userCard->getExpirationDate()}</td>
                        <td class="text-center">
                          <a type="button" class=" fa fa-pen" data-bs-toggle="modal"
                            data-bs-target="#editCard_{$userCard->getId()}"></a> &nbsp;&nbsp;
                          <a class="fa fa-trash-can  " onclick="deleteCard({$userCard->getId()})"></a>
                        </td>
                      </tr>

                      <!-- Modal Modifica Carta -->
                      <div class="modal fade" id="editCard_{$userCard->getId()}" tabindex="-1"
                        aria-labelledby="editModalLabel_{$userCard->getId()}" aria-hidden="true">
                        <!-- Contenuto del modal per modificare una carta -->
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-body">
                              <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                              <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
                                <h2 class="modal-title fs-5 mb-3">Modifica Carta</h2>
                                <div class="row align-items-center g-4 mt-3">
                                  <form id="editForm3_{$userCard->getId()}" enctype="multipart/form-data">
                                    <input type="text" id="edit_name_{$userCard->getId()}" class="edit-input"
                                      value="{$userCard->getName()}">
                                    <input type="text" id="edit_cardnumber_{$userCard->getId()}" class="edit-input"
                                      value="{$userCard->getCardNumber()}">
                                    <input type="text" id="edit_expiration_{$userCard->getId()}" class="edit-input"
                                      value="{$userCard->getExpirationDate()}">
                                    <button type="button" onclick="saveChangesCard({$userCard->getId()})"
                                      class="btn btn-primary btn-sm">Salva</button>
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    {/foreach}
                  </table>
                </div>
                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddCard" class="btn btn-primary mt-4">
                  <span class="me-2"><i class="fas fa-plus"></i></span>
                  Aggiungi carta
                </a>
              </div>
            </div>

            <div class="tab-pane fade" id="update-profile">
              <div class="update-profile bg-white py-5 px-4">
                <h6 class="mb-4">Modifica Profilo</h6>
                <form class="profile-form">
                  <div class="row g-4">
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Nome</label>
                        <input type="text" name="name" value={$user->getName()} />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Cognome</label>
                        <input type="text" name="surname" value={$user->getSurname()} />
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Email</label>
                        <input type="email" name="email" value={$user->getEmail()} />
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Username</label>
                        <input type="text" name="username" value={$user->getUsername()} />
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary mt-6" onclick=updateProfile()>
                    Modifica profilo
                  </button>
                </form>
              </div>
              <div class="change-password bg-white py-5 px-4 mt-4 rounded">
                <h6 class="mb-4">Cambia Password</h6>
                <form class="password-reset-form">
                  <div class="row g-4">
                    
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Password attuale</label>
                        <input type="password" name= "password"  required />
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Nuova Password</label>
                        <input type="password" name="newpassword"  required/>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <label>Ripeti Password</label>
                        <input type="password" name= "confirmpassword"  required />
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-primary mt-6" onclick="updatePassword({$user->getUserId()})">
                    Conferma
                  </button>
                </form>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>

    <!--my account section end-->
    <div class="modal fade" id="addAddressModal2">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

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
                    <button type="button" id="addAddressBtn" class="btn btn-secondary btn-md me-3">Salva</button>

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
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
              <h2 class="modal-title fs-5 mb-3">Modifica Indirizzo</h2>
              <div class="row align-items-center g-4 mt-3">
                <form id="editAddressForm" method="post">
                  <div class="row g-4">
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <input type="text" id="editRegione" name="regione" placeholder="Nuova Regione">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <input type="text" id="editProvincia" name="provincia" placeholder="Nuova Provincia">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <input type="text" id="editComune" name="comune" placeholder="Nuovo Comune">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="label-input-field">
                        <input type="text" id="editVia" name="via" placeholder="Nuova Via">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="label-input-field">
                        <input type="text" id="editCivico" name="civico" placeholder="Nuovo Civico">
                      </div>
                    </div>
                    <input type="text" hidden id="editId" name="addressId" placeholder="Nuova Regione">
                  </div>
                  <div class="mt-6 d-flex">
                    <button type="button" id="saveEditAddressBtn" class="btn btn-secondary btn-md me-3"
                      onclick="saveChangesAddress()">Salva</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="productsModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
              <div style="padding-bottom:50px">
                <h4 class="mb-4">Order Tracking</h4>
                <ol id="progress-bar" class="fs-xs tt-steps">
                  <li class="tt-step" id="confermato-step">CONFERMATO</li>
                  <li class="tt-step" id="preparazione-step">IN PREPARAZIONE</li>
                  <li class="tt-step" id="spedito-step">SPEDITO</li>
                  <li class="tt-step" id="consegnato-step">CONSEGNATO</li>
                </ol>
              </div>
            </div>
            <h4 class="mb-4 ">Prodotti dell'ordine</h6>
              <div class="table-responsive">
                <table class="order-history-table table">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Prezzo</th>
                      <th>Quantità</th>
                    </tr>
                  </thead>
                  <tbody id="tableBody"></tbody>
                </table>
              </div>
              <table class="w-100">
                <tr>
                  <td class="py-3">
                    <h5 class="mb-0">Totale</h5>
                  </td>
                  <td class="text-end py-3">
                    <h5 class="mb-0" id="order-total-price">€</h5>
                  </td>
                </tr>
              </table>

          </div>
        </div>
      </div>
    </div>
    <!-- Modal Aggiungi Card -->
    <div class="modal fade" id="modalAddCard" tabindex="-1" aria-labelledby="addModalLabelCard" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body">
            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="gstore-product-quick-view bg-white rounded-3 py-6 px-4">
              <h2 class="modal-title fs-5 mb-3">Aggiungi Carta</h2>
              <div class="row align-items-center g-4 mt-3">
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
                        <input type="text" name="numberCard" id="cardNumberInput" placeholder="Numero Carta"
                          maxlength="16" title="Inserisci solo numeri">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="label-input-field mt-0">
                        <input type="text" name="expirationDate" id="expirationDateInput" placeholder="MM/AA"
                          maxlength="5">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="label-input-field mt-0">
                        <input type="text" name="cvc" placeholder="CVC" maxlength="3">
                      </div>
                    </div>

                  </div>
                  <div class="d-flex align-items-center gap-2 mt-4 flex-wrap">
                  </div>
                  <div class="mt-6 d-flex">
                    <button type="button" id="submitBtn" class="btn btn-secondary btn-md me-3"
                      onclick="addCard()">Salva</button>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>