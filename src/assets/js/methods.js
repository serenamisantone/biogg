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



function heartWishlist(button, productId) {
  var icon = button.querySelector('i');
  // Leggi il valore di isInWishlist dall'attributo data
  var isInWishlist = icon.getAttribute("data-isInWishlist") === "true";
  if (isInWishlist) {
    var url = "/biogg/src/myWishlist.php"; // URL predefinito per l'aggiunta alla lista dei desideri
    } else{
      url = "/biogg/src/shop.php";
    }
  // Se isInWishlist è true, cambia l'URL per l'operazione di rimozione

  $.ajax({
    type: "POST",
    url: url,
    data: { product_id: productId },
    success: function (response) {


      if (response.success) {
        
        if (isInWishlist) {
        //  alert("Prodotto rimosso dalla wishlist con successo");
          // Cambia l'icona a cuore vuoto (rimozione dalla lista dei desideri)
          icon.className= "far fa-heart";
          icon.setAttribute("data-isInWishlist", "false");
        } else {
        //  alert("Prodotto aggiunto alla wishlist con successo");
          // Cambia l'icona a cuore pieno (aggiunta alla lista dei desideri)
          icon.className="fas fa-heart";
          icon.setAttribute("data-isInWishlist", "true");
          
        }
        // Aggiorna dinamicamente l'icona del cuore o l'interfaccia utente qui.
      } else {
        alert("Errore durante l'operazione: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'operazione");
    }
  });
}

function removeFromWishlist(productId){
  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "/biogg/src/myWishlist.php", // URL del tuo script PHP
    data: { product_id: productId },// Dati da passare al server
    success: function(response) {
        // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
        if (response.success) {
           // alert("Prodotto rimosso dalla wishlist con successo!");
            var row = document.querySelector('a[data-product-id="' + productId + '"]').closest('tr');
            row.remove();
        } else {
           // alert("Errore durante la rimozione del prodotto dalla wishlist: " + response.message);
        }
    },
    error: function() {
        // Gestisci eventuali errori durante la chiamata AJAX
        alert("Si è verificato un errore durante la rimozione del prodotto dalla wishlist.");
    }
});

}


function removeFromCart(productId, cartId) {
  console.log(productId,cartId);
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


