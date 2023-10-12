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

// Controlla lo stato dei pulsanti all'avvio
checkButtonState();

function removeFromCart(productId, cartId) {
  // Esegui una chiamata AJAX per chiamare il metodo PHP di rimozione dal carrello
  $.ajax({
      type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
      url: "/biogg/src/index.php", // URL del tuo script PHP
      data: { productId: productId, cartId: cartId },// Dati da passare al server
      success: function(response) {
          // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
          if (response.success) {
              alert("Prodotto rimosso dal carrello con successo!");
          } else {
              alert("Errore durante la rimozione del prodotto dal carrello: " + response.message);
          }
      },
      error: function() {
          // Gestisci eventuali errori durante la chiamata AJAX
          alert("Si è verificato un errore durante la rimozione del prodotto dal carrello.");
      }
  });
}
