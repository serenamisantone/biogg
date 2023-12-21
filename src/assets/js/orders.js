function openProductsModal(idCart, idOrder) {
    console.log(idCart);
    $.ajax({
        type: "POST",
        url: '/biogg/src/customerAccount.php',
        data: { idCart: idCart, idOrder: idOrder },
        success: function (response) {
            // Gestisci la risposta del server
            if (response.success) {
                populateTable(response);
                updateOrderProgress(response.orderStatus);
                var modal = new bootstrap.Modal(document.getElementById('productsModal'));
                modal.show();

            } else {
                alert('Errore durante prodotti');
            }
        },
        error: function () {
            alert('Errore durante la richiesta AJAX.');
        }
    })

}
// Funzione per popolare la tabella
function populateTable(response) {
    data = response.productsOrder;
    var tableBody = document.getElementById("tableBody");
    tableBody.innerHTML = ''; // Pulisce il contenuto precedente

    // Itera attraverso l'array di dati
    for (var i = 0; i < data.length; i++) {
        var row = tableBody.insertRow();
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        // Aggiungi i dati alle celle della riga
        cell1.innerHTML = data[i].name;
        cell2.innerHTML = data[i].prezzo + '€';
        cell3.innerHTML = data[i].quantity;
    }
    var orderTotalPriceElement = document.getElementById("order-total-price");
    if (orderTotalPriceElement) {
        orderTotalPriceElement.innerHTML = '€' + response.orderTotal;
    }
}
function updateOrderProgress(orderStatus) {
    var confermatoStep = document.getElementById("confermato-step");
    var shippedStep = document.getElementById("spedito-step");
    var preparazioneStep = document.getElementById("preparazione-step");
    var consegnatoStep = document.getElementById("consegnato-step");

    confermatoStep.classList.remove("active", "tt-step-done");
    shippedStep.classList.remove("active", "tt-step-done");
    preparazioneStep.classList.remove("active", "tt-step-done");
    consegnatoStep.classList.remove("active", "tt-step-done");


    // Imposta i passi in base allo stato dell'ordine
    switch (orderStatus) {
        case "CONFERMATO":
            confermatoStep.classList.add("tt-step-done");
            preparazioneStep.classList.add("active");

            break; // Nessuna azione richiesta
        case "IN PREPARAZIONE":
            confermatoStep.classList.add("tt-step-done");
            preparazioneStep.classList.add("tt-step-done");
            shippedStep.classList.add("active");
            break;
        case "SPEDITO":
            confermatoStep.classList.add("tt-step-done");
            preparazioneStep.classList.add("tt-step-done");
            shippedStep.classList.add("tt-step-done");
            consegnatoStep.classList.add("active");
            break;
        case "CONSEGNATO":
            confermatoStep.classList.add("tt-step-done");
            preparazioneStep.classList.add("tt-step-done");
            shippedStep.classList.add("tt-step-done");
            consegnatoStep.classList.add("tt-step-done");
            break;
        default:
            break;
    }
}

function deleteAddress(addressId){
    $.ajax({
        type: "POST",
        url: '/biogg/src/customerAccount.php',
        data: { addressId:addressId, deleteAddress:true},
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

function deleteCard(cardId){
    $.ajax({
        type: "POST",
        url: '/biogg/src/customerAccount.php',
        data: { cardId:cardId, deleteCard:true},
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

function updateProfile() {
    // Recupera i valori dai campi di input
    var name = $("input[name='name']").val();
    var surname = $("input[name='surname']").val();
    var email = $("input[name='email']").val();
    var username = $("input[name='username']").val();
  
    // Puoi aggiungere ulteriori controlli sui dati se necessario
  
    // Crea un oggetto con i dati del profilo
    
  
    // Esegui la chiamata AJAX
    $.ajax({
      type: "POST",
      url: "/biogg/src/customerAccount.php", // Sostituisci con il percorso del tuo script di aggiornamento del profilo
      data: {updateProfile:true, name:name, surname:surname, email:email, username:username},
      success: function(response) {
        // Gestisci la risposta dal server
        if (response.success) {
            location.reload();
          alert("Profilo aggiornato con successo!");
        } else {
          alert("Errore nell'aggiornamento del profilo: " + response.message);
        }
      },
      error: function() {
        alert('Errore durante la richiesta AJAX.');
      }
    });
  }

  function updatePassword(userId) {
    // Recupera i valori dai campi di input
    var password = $("input[name='password']").val();
    var newPassword = $("input[name='newpassword']").val();
    var confirmPassword = $("input[name='confirmpassword']").val();
  
    if (newPassword !== confirmPassword) {
        alert("Le password non coincidono.");
        return;
    }
    // Esegui la chiamata AJAX
    $.ajax({
      type: "POST",
      url: "/biogg/src/customerAccount.php", // Sostituisci con il percorso del tuo script di aggiornamento del profilo
      data: {updatePassword:true, userId:userId, password:password, newPassword:newPassword, confirmPassword:confirmPassword},
      success: function(response) {
        // Gestisci la risposta dal server
        if (response.success) {
            location.reload();
          alert("Password aggiornata con successo!");
        } else {
          alert("Errore nell'aggiornamento della password: " + response.message);
        }
      },
      error: function() {
        alert('Errore durante la richiesta AJAX.');
      }
    });
  }