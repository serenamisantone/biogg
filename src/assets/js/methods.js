const decrementButton = document.getElementById('decrement');
const incrementButton = document.getElementById('increment');
const quantityInput = document.getElementById('quantity');

function updateQuantity(increment) {
  let currentValue = parseInt(quantityInput.value);
  if (increment) {
    quantityInput.value = currentValue + 1;
  } else {
    if (currentValue > 1) {
      quantityInput.value = currentValue - 1;
    }
  }
  checkButtonState();
}

function checkButtonState() {
  const currentValue = parseInt(quantityInput.value);
  const maxQuantity = parseInt(quantityInput.getAttribute('data-max')); // Leggi il valore da attributo data-max
  decrementButton.disabled = currentValue <= 1;
  incrementButton.disabled = currentValue >= maxQuantity;
}

decrementButton.addEventListener('click', () => {
  updateQuantity(false);
});

incrementButton.addEventListener('click', () => {
  updateQuantity(true);
});

$(document).on('click', '.remove-product', function(e) {
  e.preventDefault(); // Previeni il comportamento predefinito del link
  var idProduct = $(this).data('product-id');
  var idCart = $(this).data('cart-id');

  $.ajax({
      type: 'POST',
      url: '/biogg/src/index.php?action=removeProduct',
      data: { idProduct: idProduct, idCart: idCart },
      success: function(response) {
          // Analizza la risposta JSON
          var jsonResponse = JSON.parse(response);
          if (jsonResponse.success) {
              // Rimozione riuscita, aggiorna la visualizzazione del carrello
              // Puoi utilizzare jQuery per selezionare l'elemento del carrello da rimuovere.
              // Ad esempio, $(this).closest('.product-container').remove();
              alert("tutto ok: " + jsonResponse.message);
          } else {
              // Errore durante la rimozione
              alert("Errore durante la rimozione del prodotto dal carrello: " + jsonResponse.message);
          }
      }
  });
});
