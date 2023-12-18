function openProductsModal(idCart,idOrder) {
    console.log(idCart);
    $.ajax({
        type: "POST",
        url: '/biogg/src/customerAccount.php',
        data: { idCart: idCart , idOrder:idOrder},
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
    data=response.productsOrder;
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
        cell2.innerHTML = data[i].prezzo+'€';
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

