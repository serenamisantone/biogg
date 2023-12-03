
function heartWishlist(event, button, productId) {
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
    success: function (response) {
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
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione della categoria.");
    }
  });
}
function sendResetLink() {
  // Ottieni il valore da input
  var usernameOrEmail = $('#usernameOrEmail').val();
  console.log(usernameOrEmail);

  // Esegui la richiesta Ajax
  $.ajax({
    type: 'POST',
    url: '/biogg/src/forgotPassword.php',
    data: { usernameOrEmail: usernameOrEmail },
    success: function (response) {
      console.log(response);
      if (response.success) {
        window.location.href = "/biogg/src/login.php";
        // Se la risposta è positiva, esegui ulteriori azioni
      }
    },
    error: function (xhr, status, error) {
      console.log('Errore nella richiesta Ajax:');
      console.log('Stato:', status);
      console.log('Errore:', error);
      console.log('Risposta completa:', xhr.responseText);

    }
  });
}
