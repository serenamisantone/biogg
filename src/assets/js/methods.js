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
function category(categoryId){
  console.log(categoryId);
  $.ajax({
    type: "GET",
    url:"/biogg/src/shop.php",
    data:{ categoryId: categoryId},
    success: function (response){
      console.log('Response from server:', response);
        updateProductsSection(response);
    },
  });
}
function updateProductsSection(products) {
  $('#products-section').empty();
  products.forEach(function (product) {
    console.log('Product:', product);

    //Crea un nuovo elemento di prodotto con tutte le informazioni
    var productElement = '<div class="col-lg-4 col-md-6 col-sm-10">';
    productElement += '<div class="vertical-product-card rounded-2 position-relative border-0 bg-white bg-white">';
    productElement += '<span class="offer-badge text-white fw-bold fs-xxs bg-danger position-absolute start-0 top-0">-12% OFF</span>';
    productElement += '<div class="thumbnail position-relative text-center p-4">';
    productElement += '<img src="assets/img/products/' + product.image + '" alt="' + product.name + '" class="img-fluid">';
    productElement += '<button class="add_wishlist_btn" onclick="heartWishlist(this, ' + product.id + ')">';
    productElement += '<i class="' + (product.isInWishlist ? 'fas' : 'far') + ' fa-heart" style="color:red" data-isInWishlist="' + product.isInWishlist + '"></i>';
    productElement += '</button>';
    productElement += '</div>';
    productElement += '<div class="card-content">';
    productElement += '<div class="mb-2 tt-category tt-line-clamp tt-clamp-1">';
    productElement += '<a href="#" class="d-inline-block text-muted fs-xxs">' + product.category + '</a>';
    productElement += '</div>';
    productElement += '<div class="product-card">';
    productElement += '<div style="display: flex; align-items: center;">';
    productElement += '<a href="singleProduct.php?id=' + product.id + '" class="card-title fw-bold d-block mb-2 tt-line-clamp tt-clamp-2" style="flex: 1; text-decoration: none;">';
    productElement += '<span class="product-name">' + product.name + '</span>';
    productElement += '</a>';
    productElement += '</div>';
    productElement += '</div>';
    productElement += '<h6 class="price text-danger mb-4">€' + product.price + '</h6>';
    productElement += '<form method="POST" action="shop.php">';
    productElement += '<input type="hidden" name="addProduct" value="' + product.id + '">';
    productElement += '<button type="submit" class="btn btn-outline-secondary d-block btn-md">Aggiungi al carrello</button>';
    productElement += '</form>';
    productElement += '</div>';
    productElement += '</div>';
    productElement += '</div>';

    // Aggiungi il nuovo elemento di prodotto al DOM
    $('#products-section').append(productElement);
  });
}
function toggleEditForm(productId) {
  const editForm = document.getElementById(`editForm_${productId}`);
  const editButtons = document.querySelectorAll(`.btn-edit-product`);
  editButtons.forEach(button => {
    const buttonProductId = button.getAttribute('data-productId');
    console.log(buttonProductId);
      if (buttonProductId == productId) {
        editForm.style.display = (editForm.style.display === 'none') ? 'block' : 'none';
      }else{
          const otherEditForm = document.getElementById(`editForm_${buttonProductId}`);
          otherEditForm.style.display = 'none';
      }
  });
}
function saveChanges(productId) {
  // Ottenere i valori modificati dai campi di input
  const editedName = document.getElementById(`edit_name_${productId}`).value;
  const editedPrice = document.getElementById(`edit_price_${productId}`).value;
  const editedCategory = document.getElementById(`edit_category_${productId}`).value;
  const editedStock = document.getElementById(`edit_stock_${productId}`).value;
  const editedOnline = document.getElementById(`edit_online_${productId}`).value;
  const editedImage = document.getElementById(`edit_image_${productId}`).value;

  // Costruire l'oggetto con i dati modificati
  const editedData = {
      id: productId,
      name: editedName,
      price: editedPrice,
      category: editedCategory,
      stock: editedStock,
      isOnline: editedOnline,
      image: editedImage
  };
  console.log(editedData);
  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "/biogg/src/adminAccount.php", // URL del tuo script PHP
    data: { edited_data: editedData },// Dati da passare al server
    success: function(response) {
        // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
        if (response.success) {
           alert("Modifiche salvate");
        } else {
            alert("Errore: " + response.message);
        }
    },
    error: function() {
        // Gestisci eventuali errori durante la chiamata AJAX
        alert("Si è verificato un errore durante il salavataggio2.");
    }
});

}