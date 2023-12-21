
$(document).ready(function () {
  $("#addAddressBtn").on("click", function () {
    // Raccogli i dati del modulo
    var formData = $("#addAddressForm").serializeArray();

    // Effettua la chiamata Ajax
    $.ajax({
      type: "POST",
      url: "/biogg/src/checkout.php", // Sostituisci con il percorso del tuo script PHP
      data: { addAddress: true, formData: JSON.stringify(formData) },
      success: function (response) {
        if (response) { // Gestisci la risposta dal server (puoi fare qualcosa qui dopo l'aggiunta nel database)

          location.reload();
        } else {
          alert('Errore durante l\'aggiunta:');
        }
      },
      error: function (error) {
        console.log("Errore nella chiamata Ajax: " + error.responseText);
      }
    });
  });
});

function openEditModal() {
  $('#editAddressModal').modal('show');
}



// Chiudi il modal se l'utente clicca al di fuori dell'area del modal di modifica
window.onclick = function (event) {
  var editModal = document.getElementById("editAddressModal");
  if (event.target == editModal) {
    editModal.style.display = "none";
  }
}

function populateEditForm(id, comune, civico, via, regione, provincia) {
  // Popolare i campi del modulo di modifica con i dettagli dell'indirizzo
  document.getElementById("editRegione").value = regione;
  document.getElementById("editProvincia").value = provincia;
  document.getElementById("editComune").value = comune;
  document.getElementById("editVia").value = via;
  document.getElementById("editCivico").value = civico;
  document.getElementById("editId").value = id;
}

// Funzione per salvare le modifiche all'indirizzo
function saveChangesAddress() {

  // Raccogli i dati del modulo
  var formData = $("#editAddressForm").serializeArray();
  // Effettua la chiamata Ajax
  $.ajax({
    type: "POST",
    url: "/biogg/src/checkout.php", // Sostituisci con il percorso del tuo script PHP
    data: { formData: JSON.stringify(formData), editAddress: true },
    success: function (response) {

      if (response.success) {
        location.reload();
      } else {
        alert('Errore durante l\'aggiunta al carrello: ' + response.message);
      }
    },
    error: function (error) {
      console.log("Errore nella chiamata Ajax: " + error.responseText);
    }
  });

  // Chiudi il modal di modifica dopo aver salvato le modifiche

}


function saveCard() {
  $("#errorMessages").hide().html("");
  // Raccogli i dati del modulo
  var formData = $("#creditCardForm").serializeArray();
  // Controlla la validità dei campi
  var nameInput = $("#creditCardForm input[name='name']");
  var cardNumberInput = $("#creditCardForm input[name='numberCard']");
  var expirationDateInput = $("#creditCardForm input[name='expirationDate']");
  var cvcInput = $("#creditCardForm input[name='cvc']");
  console.log("nome: " + nameInput[0].checkValidity());
  console.log("card: " + isValidCardNumber(cardNumberInput.val()));
  console.log("data: " + isValidExpirationDate(expirationDateInput.val()));
  console.log("cvc: " + isValidCVC(cvcInput.val()));

  if (
    nameInput[0].checkValidity() &&
    !isEmpty(nameInput.val()) &&
    isValidCardNumber(cardNumberInput.val()) &&
    isValidExpirationDate(expirationDateInput.val()) &&
    isValidCVC(cvcInput.val())) {
    // Imposta il valore di default della checkbox "save-card"

    var saveCard = $("#save-card").is(":checked");

    formData.push({ name: "save_card", value: saveCard });

    // Disabilita il pulsante durante la chiamata Ajax
    $("#submitBtn").prop("disabled", true);

    // Effettua la chiamata Ajax
    $.ajax({
      type: "POST",
      url: "/biogg/src/checkout.php",
      data: { formData: JSON.stringify(formData), addCreditCard: true },
      success: function (response) {
        // Riabilita il pulsante dopo la chiamata Ajax
        $("#submitBtn").prop("disabled", false);

        if (response.success) {
          if (saveCard) {
            console.log(response.message);
          } else {
            console.log(response.message);
          }
        } else {
          console.error("Errore durante l'aggiunta della carta di credito: " + response.message);
        }
      },
      error: function (error) {
        console.error("Errore nella chiamata Ajax: " + error.responseText);
      }
    });
  } else {
    // Almeno un campo obbligatorio non è stato compilato correttamente
    $("#errorMessages").show().html("Per favore, compila tutti i campi correttamente.");
  }
}


function isValidCardNumber(cardNumber) {
  var cardNumberRegex = /^\d{16}$/; // Formato con 16 cifre numeriche
  return cardNumberRegex.test(cardNumber);
}
// Funzione per verificare la validità del formato della data di scadenza (MM/AA)
function isValidExpirationDate(date) {
  var dateRegex = /^(0[1-9]|1[0-2])\/[0-9]{2}$/; // Formato MM/AA
  return dateRegex.test(date);
}
function isValidCVC(cvc) {
  var cvcRegex = /^\d{3}$/; // Formato con 3 cifre numeriche
  return cvcRegex.test(cvc);
}
function isEmpty(str) {
  return !str.trim();
}

// Assuming you have jQuery included in your project
function saveNewOrder() {
  console.log("sono qui")
  var selectedAddressRadio = $('input[name="tt-radio-shipment"]:checked');

  // Verifica se un indirizzo è stato selezionato
  if (selectedAddressRadio.length > 0) {
    // Ottieni l'ID dell'indirizzo dal data attributo
    var selectedAddressId = selectedAddressRadio.data('address-id');

    // Esegui altre operazioni o invia l'ID all'endpoint del server tramite AJAX
    console.log("ID dell'indirizzo selezionato:", selectedAddressId);

    // Continua con la tua logica per effettuare l'ordine
  } else {
    // Nessun indirizzo selezionato, gestisci di conseguenza
    console.log("Nessun indirizzo selezionato");
  }
  // Make an AJAX request to the server
  $.ajax({
    type: 'POST',
    url: '/biogg/src/orders.php',
    data: { selectedAddressId: selectedAddressId },
    success: function (response) {
      alert("ordine inviato");
      // Handle the success response from the server
      window.location.href = 'shop.php';
    },
    error: function (error) {
      // Handle errors
      console.error(error.responseText);
    }
  });
}
function saveChangesCard(cardId) {
  var name = document.getElementById("edit_name_" + cardId).value;
  var expirationDate = document.getElementById("edit_expiration_" + cardId).value;
  var cardNumber = document.getElementById("edit_cardnumber_" + cardId).value;
  console.log("name: " + isEmpty(name));
  console.log("card: " + isValidCardNumber(cardNumber));
  console.log("date: " + isValidExpirationDate(expirationDate));
  if (!isEmpty(name) &&
    isValidCardNumber(cardNumber) &&
    isValidExpirationDate(expirationDate)) {
    $.ajax({

      type: "POST",
      url: '/biogg/src/customerAccount.php',
      data: { updateCart: true, name: name, expirationDate: expirationDate, cardNumber: cardNumber, cardId: cardId },
      success: function (response) {
        // Gestisci la risposta del server
        if (response.success) {
          location.reload();


        } else {
          alert('Errore');
        }
      },
      error: function () {
        alert('Errore durante la richiesta AJAX.');
      }
    })
  }

}

function addCard() {
  $("#errorMessages").hide().html("");
  // Raccogli i dati del modulo
  var formData = $("#creditCardForm").serializeArray();
  // Controlla la validità dei campi
  var nameInput = $("#creditCardForm input[name='name']");
  var cardNumberInput = $("#creditCardForm input[name='numberCard']");
  var expirationDateInput = $("#creditCardForm input[name='expirationDate']");
  var cvcInput = $("#creditCardForm input[name='cvc']");
  console.log("nome: " + nameInput[0].checkValidity());
  console.log("card: " + isValidCardNumber(cardNumberInput.val()));
  console.log("data: " + isValidExpirationDate(expirationDateInput.val()));
  console.log("cvc: " + isValidCVC(cvcInput.val()));

  if (
    nameInput[0].checkValidity() &&
    !isEmpty(nameInput.val()) &&
    isValidCardNumber(cardNumberInput.val()) &&
    isValidExpirationDate(expirationDateInput.val()) &&
    isValidCVC(cvcInput.val())) {


      var saveCard = true;

      formData.push({ name: "save_card", value: saveCard });
  

    $("#submitBtn").prop("disabled", true);

    // Effettua la chiamata Ajax
    $.ajax({
      type: "POST",
      url: "/biogg/src/checkout.php",
      data: { formData: JSON.stringify(formData), addCreditCard: true },
      success: function (response) {
        // Riabilita il pulsante dopo la chiamata Ajax
        $("#submitBtn").prop("disabled", false);

        if (response.success) {
          
           location.reload();
          
        } else {
          console.error("Errore durante l'aggiunta della carta di credito: " + response.message);
        }
      },
      error: function (error) {
        console.error("Errore nella chiamata Ajax: " + error.responseText);
      }
    });
  } else {
    // Almeno un campo obbligatorio non è stato compilato correttamente
    $("#errorMessages").show().html("Per favore, compila tutti i campi correttamente.");
  }
}
