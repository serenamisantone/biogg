function heartWishlist(event,button, productId) {
  event.preventDefault();
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
    data: { wishlist_product_id: productId },
    success: function (response) {


      if (response.success) {

        if (isInWishlist) {
          //  alert("Prodotto rimosso dalla wishlist con successo");
          // Cambia l'icona a cuore vuoto (rimozione dalla lista dei desideri)
          icon.className = "far fa-heart";
          icon.setAttribute("data-isInWishlist", "false");
        } else {
          //  alert("Prodotto aggiunto alla wishlist con successo");
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
    data: { wishlist_product_id: productId },// Dati da passare al server
    success: function (response) {
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {
        // alert("Prodotto rimosso dalla wishlist con successo!");
        /*  var row = document.querySelector('a[data-product-id="' + productId+'"]').closest('tr');
          row.remove();*/
        var productToRemoveId = productId;
        $(".wishlist_product").each(function () {
          var itemProductId = $(this).find(".remove_cart_btn").data("product-id");
          if (itemProductId === productToRemoveId) {
            $(this).remove();
          }
        });

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
    data: { productId: productId2 },// Dati da passare al server
    success: function (response) {
      var newTotalPrice;
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {

        var productToRemoveId = productId2;
        $("li.cart-product").each(function () {
          var itemProductId = $(this).find(".remove_cart_btn").data("product-id");
          if (itemProductId === productToRemoveId) {
            $(this).remove();
          }
        });
        // Aggiorna il prezzo totale complessivo, ad esempio, se hai un elemento separato per il totale
        newTotalPrice = response.updatedCartData.totalPrice;
        $("#cartTotal").text(newTotalPrice + " €");
      }
      else {
        alert("Errore durante la rimozione del prodotto dal carrello: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante la rimozione del prodotto dalla wishlist.");
    }
  });

}
function removeFromCartPage(productId2) {

  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "index.php", // URL del tuo script PHP
    data: { productId: productId2 },// Dati da passare al server
    success: function (response) {

      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {

        updateCart(response);

        var newTotalPrice = response.updatedCartData.totalPrice;
        $("#final-total-price").text(newTotalPrice + "€");

        var row = document.querySelector('tr[data-product-id="' + productId2 + '"]');
        if (row) {
          row.remove();
        }
      }
      else {
        // console.log("vivimi senza paura"+response.message);
        alert("Errore durante la rimozione del prodotto dal carrello: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante la rimozione del prodotto dalla cart page.");
    }
  });

}


$(document).ready(function () {
  $(".decrease, .increase").click(function () {
    var productId = $(this).data("product-id");
    var quantityInput = $("input[data-product-id='" + productId + "']");
    var actualQuantity = parseInt(quantityInput.data("quantity"));

    var qunatityToAdd = 0;
    if ($(this).hasClass("decrease")) {

      qunatityToAdd--;

    } else if ($(this).hasClass("increase")) {
      qunatityToAdd++;
      $(".decrease[data-product-id='" + productId + "']").removeAttr("disabled");
    }

    // Esegui la chiamata AJAX per aggiornare la quantità lato server
    $.ajax({
      type: "POST",
      url: "/biogg/src/cart.php", // Sostituisci con il percorso del tuo script PHP
      data: { productId: productId, quantity: qunatityToAdd },
      success: function (response) {
        if (response.success) {
          updateCart(response);
          // Aggiorna la quantità visualizzata nell'input e nei dati dell'input
          actualQuantity = actualQuantity + qunatityToAdd;
          quantityInput.val(actualQuantity);
          quantityInput.data("quantity", actualQuantity);
          console.log(response.price);
          var totalPriceElement = $("#total-price-" + productId);

          // Calcola il nuovo prezzo moltiplicando il prezzo unitario per la nuova quantità

          totalPriceElement.text(response.price + "€");


          // Aggiorna il prezzo totale complessivo, ad esempio, se hai un elemento separato per il totale
          var newTotalPrice = response.updatedCartData.totalPrice;
          $("#final-total-price").text(newTotalPrice + "€");
          if (actualQuantity <= 1) {
            $(".decrease[data-product-id='" + productId + "']").prop("disabled", true);
          } else {
            $(".decrease[data-product-id='" + productId + "']").prop("disabled", false);
          }



        } else {
          alert("Errore durante l'aggiornamento della quantità: " + response.message);
        }
      },
      error: function () {
        alert("Si è verificato un errore durante l'aggiornamento della quantità.");
      }
    });
  });

});


$(document).ready(function () {
  // Associa un gestore di eventi al click del pulsante "Aggiungi al carrello"
  $('.addToCartButton').click(function () {
    // Recupera l'ID del prodotto dal campo nascosto
    var productId = $(this).data('product-id');

    // Esegui una richiesta AJAX per chiamare il file shop.php
    $.ajax({
      type: "POST",
      url: '/biogg/src/shop.php',
      data: { cart_product_id: productId, quantity_to_add: '1' }, // Passa l'ID del prodotto
      success: function (response) {
        // Gestisci la risposta del server
        if (response.success) {
          // Estrai i dati dal JSON
          updateCart(response);



          // Mostra un messaggio di successo
        } else {
          alert('Errore durante l\'aggiunta al carrello.');
        }
      },
      error: function () {
        alert('Errore durante la richiesta AJAX.');
      }
    });
  });

});

function category(categoryId) {
  $.ajax({
    type: "GET",
    url: "/biogg/src/shop.php",
    data: { categoryId: categoryId },
    success: function (response) {
      updateProductsSection(response);
    },
  });
}
function updateProductsSection(products) {
  $('#products-section').empty();
  products.forEach(function (product) {

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
    if (buttonProductId == productId) {
      editForm.style.display = (editForm.style.display === 'none') ? 'block' : 'none';
    } else {
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
  const fileInput = document.getElementById(`fileInput2_${productId}`);
  const file = fileInput.files[0];
  // Costruire l'oggetto con i dati modificati
  const formData = new FormData();
  formData.append('productId', productId);
  formData.append('editedName', editedName);
  formData.append('editedPrice', editedPrice);
  formData.append('editedCategory', editedCategory);
  formData.append('editedStock', editedStock);
  formData.append('editedOnline', editedOnline);
  formData.append('editedImage', file);
  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "/biogg/src/adminAccount.php", // URL del tuo script PHP
    data: formData,// Dati da passare al server
    contentType: false,
    processData: false,
    success: function (response) {
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {
        window.location.href = "/biogg/src/adminAccount.php";
        //alert("Modifiche salvate");
      } else {
        // alert("Errore: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante il salavataggio.");
    }
  });
}


function updateCart(cartData) {
  // Estrai i dati dal JSON
  var updatedCartData = cartData.updatedCartData;

  // Seleziona l'elemento del carrello
  var cartContainer = document.getElementById('cartContainer');

  // Seleziona l'ul del carrello
  var cartList = cartContainer.querySelector('.cartList');

  // Crea una stringa HTML per ogni prodotto nel carrello
  var cartHTML = '';
  for (var i = 0; i < updatedCartData.cartProduct.length; i++) {
    var product = updatedCartData.cartProduct[i];
    cartHTML += '<li class="d-flex align-items-center cart-product">';
    cartHTML += '<div class="thumb-wrapper"><a href="#"><img src="assets/img/products/' + product.image + '" alt="products" class="img-fluid"></a></div>';
    cartHTML += '<div class="items-content ms-3"><a href="singleProduct.php?id=' + product.id + '"><h6 class="mb-1">' + product.name + '</h6></a>';
    cartHTML += '<div class="products_meta d-flex align-items-center"><div><span class="price text-primary fw-semibold">' + product.price + '€</span>';
    cartHTML += '<span class="count">x ' + product.quantity + '&nbsp;</span></div>';
    cartHTML += '<a class="remove_cart_btn" onclick="removeFromCart(' + product.id + ')" data-product-id="' + product.id + '"><i class="fas fa-trash-alt"></i></a></div></div></li>';
  }

  // Aggiorna il contenuto dell'ul del carrello
  cartList.innerHTML = cartHTML;

  // Aggiorna il totale del carrello
  var cartTotal = cartContainer.querySelector('#cartTotal');
  cartTotal.textContent = updatedCartData.totalPrice + ' €';
}


function addProduct() {
  console.log("funzione addProduct chiamata");

  // Ottenere i valori modificati dai campi di input
  const name = document.getElementById('product_name').value;
  const price = document.getElementById('product_price').value;
  const category = document.getElementById('product_category').value;
  const stock = document.getElementById('product_stock').value;
  const online = document.getElementById('online_yes').checked ? 1 : 0;
  const fileInput = document.getElementById('fileInput');
  const file = fileInput.files[0];
  console.log(file);

  // Invia una richiesta AJAX solo quando tutti i campi obbligatori sono compilati
  if (name && price && category && stock !== null) {
    const formData = new FormData();
    formData.append('name', name);
    formData.append('price', price);
    formData.append('category', category);
    formData.append('stock', stock);
    formData.append('isOnline', online);
    formData.append('image', file);

    $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // Gestisci la risposta dal server
        if (response.success) {
          window.location.href = "/biogg/src/adminAccount.php";
          // Se la risposta è positiva, esegui ulteriori azioni
        } else {
          alert("Errore: " + response.message);
        }
      },
      error: function () {
        alert("Si è verificato un errore durante l'aggiunta.");
      }
    });
  } else {
    alert("Compila tutti i campi prima di aggiungere il prodotto.");
  }
}


function cancelEdit(productId) {
  // Nascondi il form
  const form = document.getElementById(`editForm_${productId}`);
  form.style.display = 'none';

}



function deleteProduct(productId) {
  const confirmation = confirm("Sei sicuro di voler eliminare questo prodotto?");

  if (!confirmation) {
    return;
  }

  // Esegui la chiamata AJAX per eliminare il prodotto
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_product", productId: productId },
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        //alert("Prodotto eliminato con successo.");
        // Puoi anche aggiornare la visualizzazione della tabella o fare altre azioni necessarie
        const rowId = `editForm_${productId}`;
        $("#" + rowId).closest('tr').remove();
        window.location.href = "/biogg/src/adminAccount.php";
      } else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione del prodotto.");
    }
  });
}



function deleteCategory(categoryId) {
  const confirmation = confirm("Sei sicuro di voler eliminare questa categoria?");

  if (!confirmation) {
    return;
  }

  // Esegui la chiamata AJAX per eliminare il prodotto
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_category", categoryId: categoryId },
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        //alert("Prodotto eliminato con successo.");
        // Puoi anche aggiornare la visualizzazione della tabella o fare altre azioni necessarie
        const rowId = `categoryRow_${categoryId}`;
        $("#" + rowId).remove();
        location.reload();
        window.location.hash = '#category';

      } else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione della categoria.");
    }
  });
}

function deleteCategory(categoryId) {
  const confirmation = confirm("Sei sicuro di voler eliminare questa categoria?");
  
  if (!confirmation) {
      return;
  }

  // Esegui la chiamata AJAX per eliminare la categoria
  $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php",
      data: { action: "delete_category", categoryId: categoryId },
      success: function(response) {
          // Gestisci la risposta dal server
          if (response.success) {
              // Rimuovi l'elemento visuale dalla tabella
              var categoryToRemoveId = categoryId;
              $(".category").each(function () {
                var itemCategoryId = $(this).find(".remove_cart_btn").data("category-id");
                if (itemCategoryId === categoryToRemoveId) {
                  $(this).remove();
                }
              });
          } else {
              alert("Errore: " + response.message);
          }
      },
      error: function() {
          alert("Si è verificato un errore durante l'eliminazione della categoria.");
      }
  });
}

  

  function addNewCategory() {
    // Ottieni il valore del nome della categoria dal campo di input
    var categoryName = document.getElementById('category_name').value;
    $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php", // Sostituisci con il percorso del tuo script PHP
      data: { categoryName: categoryName},
      success: function (response) {
        if (response.success) {
          location.reload();

      } else {

      }
    }
  });
}

// Assume che tu abbia già del codice per gestire gli eventi di clic
// sui pulsanti "increase" e "decrease".

// Aggiungi un event listener al pulsante "Aggiungi al carrello"
document.querySelector('.addToCartFromSingleProduct').addEventListener('click', function (event) {
  // Ottieni il valore della quantità
  var quantity = parseInt(document.querySelector('.quantity-input').value, 10);
  // Ottieni l'ID del prodotto
  var productId = this.getAttribute('data-product-id');

  $.ajax({
    type: "POST",
    url: '/biogg/src/shop.php',
    data: { cart_product_id: productId, quantity_to_add: quantity }, // Passa l'ID del prodotto
    success: function (response) {
      // Gestisci la risposta del server
      if (response.success) {
               
      } else {
        alert('Errore durante l\'aggiunta al carrello.');
      }
    },
    error: function () {
      alert('Errore durante la richiesta AJAX.');
    }
  });
});

// Funzione per l'evento clic sul pulsante "Decrease"
function decreaseQuantity() {
  var input = document.querySelector('.quantity-input');
  var value = parseInt(input.value, 10);

  if (value > 1) {
    value--;
    input.value = value;
  }
}

// Funzione per l'evento clic sul pulsante "Increase"
function increaseQuantity() {
  var input = document.querySelector('.quantity-input');
  var value = parseInt(input.value, 10);
  var maxStock = parseInt(input.getAttribute('max'), 10);

  if (value < maxStock) {
    value++;
    input.value = value;
  }
}

// Aggiungi gli event listener ai pulsanti
document.querySelector('.decreaseFromSingleProduct').addEventListener('click', decreaseQuantity);
document.querySelector('.increaseFromSingleProduct').addEventListener('click', increaseQuantity);


function sendResetLink() {
  // Ottieni il valore da input
  var usernameOrEmail = $('#usernameOrEmail').val();

  // Esegui la richiesta Ajax
  $.ajax({
      type: 'POST',
      url: 'forgotPassword.php',
      data: { usernameOrEmail: usernameOrEmail },
      success: function(response) {
          // Gestisci la risposta dal server
          alert(response); // Mostra un alert per esempio
      },
      error: function(error) {
          console.log('Errore nella richiesta Ajax:', error);
      }
  });
}
