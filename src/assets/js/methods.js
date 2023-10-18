function heartWishlist(button, productId) {
  var icon = button.querySelector('i');
  // Leggi il valore di isInWishlist dall'attributo data
  var isInWishlist = icon.getAttribute("data-isInWishlist") === "true";
  if (isInWishlist) {
    var url = "/biogg/src/myWishlist.php"; // URL predefinito per l'aggiunta alla lista dei desideri
  } else {
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
          alert("Prodotto rimosso dalla wishlist con successo");
          // Cambia l'icona a cuore vuoto (rimozione dalla lista dei desideri)
          icon.className = "far fa-heart";
          icon.setAttribute("data-isInWishlist", "false");
        } else {
          alert("Prodotto aggiunto alla wishlist con successo");
          // Cambia l'icona a cuore pieno (aggiunta alla lista dei desideri)
          icon.className = "fas fa-heart";
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

function removeFromWishlist(productId) {
  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "/biogg/src/myWishlist.php", // URL del tuo script PHP
    data: { product_id: productId },// Dati da passare al server
    success: function (response) {
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {
        alert("Prodotto rimosso dalla wishlist con successo!");
        var row = document.querySelector('a[data-product-id="' + productId + '"]').closest('tr');
        row.remove();
      } else {
        alert("Errore durante la rimozione del prodotto dalla wishlist: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante la rimozione del prodotto dalla wishlist.");
    }
  });

}

function removeFromCart(productId2) {

  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "index.php", // URL del tuo script PHP
    data: {productId: productId2},// Dati da passare al server
    success: function (response) {
     
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {
        
        var productToRemoveId = productId2;
        $("li.cart-product").each(function () {
          var itemProductId = $(this).find(".remove_cart_btn").data("product-id");
          if (itemProductId === productToRemoveId) {
            $(this).remove();
          }
        });
        var newTotalPrice = response.totalPrice;
        $("#cartTotal").text(newTotalPrice + " €");
      } 
      else {
       // console.log("vivimi senza paura"+response.message);
        alert("Errore durante la rimozione del prodotto dal carrello: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante la rimozione del prodotto dalla wishlist.");
    }
  });

}


    $(document).ready(function() {
        $(".decrease, .increase").click(function() {
            var productId = $(this).data("product-id");
            var quantityInput = $("input[data-product-id='" + productId + "']");
            var quantity = parseInt(quantityInput.data("quantity"));

            if ($(this).hasClass("decrease")) {
                if (quantity > 1) {
                    quantity--;
                }
            } else if ($(this).hasClass("increase")) {
                quantity++;
            }

            // Esegui la chiamata AJAX per aggiornare la quantità lato server
            $.ajax({
                type: "POST",
                url: "/biogg/src/cart.php", // Sostituisci con il percorso del tuo script PHP
                data: { productId: productId, quantity: quantity },
                success: function(response) {
                    if (response.success) {
                        // Aggiorna la quantità visualizzata nell'input e nei dati dell'input
                        quantityInput.val(quantity);
                        quantityInput.data("quantity", quantity);
                    } else {
                        alert("Errore durante l'aggiornamento della quantità: " + response.message);
                    }
                },
                error: function() {
                    alert("Si è verificato un errore durante l'aggiornamento della quantità.");
                }
            });
        });
    });



