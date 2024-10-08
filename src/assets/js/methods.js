
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

function saveChanges(productId) {
  // Ottenere i valori modificati dai campi di input
  const editedName = document.getElementById(`edit_name_${productId}`).value;
  const editedDescription = document.getElementById(`edit_description_${productId}`).value;
  const editedIngredients = document.getElementById(`edit_ingredients_${productId}`).value;
  const editedPrice = document.getElementById(`edit_price_${productId}`).value;
  const editedCategory = document.getElementById(`edit_category_${productId}`).value;
  const editedManufacturer = document.getElementById(`edit_manufacturer_${productId}`).value;
  const editedStock = document.getElementById(`edit_stock_${productId}`).value;
  const editedOnline = document.getElementById(`edit_online_${productId}`).value;
  const selectedOffers = [];
  const offerCheckboxes = document.querySelectorAll(`#edit_offer_${productId}:checked`);
offerCheckboxes.forEach((checkbox) => {
  selectedOffers.push(checkbox.value);
});
  const editedImage = document.getElementById(`edit_image_${productId}`).value;
  const fileInput = document.getElementById(`fileInput2_${productId}`);
  const file = fileInput.files[0];
  // Costruire l'oggetto con i dati modificati
  const formData = new FormData();
  formData.append('productId2', productId);
  formData.append('editedName', editedName);
  formData.append('editedDescription', editedDescription);
  formData.append('editedIngredients', editedIngredients);
  formData.append('editedPrice', editedPrice);
  formData.append('editedCategory', editedCategory);
  formData.append('editedManufacturer', editedManufacturer);
  formData.append('editedStock', editedStock);
  formData.append('selectedOffers', JSON.stringify(selectedOffers));
  formData.append('editedOnline', editedOnline);
  if (file) {
    formData.append('editedImage', file);
  } else {
    formData.append('editedImage', editedImage);
  }
 
  $.ajax({
    type: "POST", // Metodo HTTP (puoi usare POST o GET in base alle tue esigenze)
    url: "/biogg/src/adminAccount.php", // URL del tuo script PHP
    data: formData,// Dati da passare al server
    contentType: false,
    processData: false,
    success: function (response) {
      console.log(response);
      // Gestisci la risposta dal server (ad esempio, aggiorna la visualizzazione del carrello)
      if (response.success) {
        window.location.href = "/biogg/src/adminAccount.php";
        //alert("Modifiche salvate");
      } else {
         alert("Errore: " + response.message);
      }
    },
    error: function () {
      // Gestisci eventuali errori durante la chiamata AJAX
      alert("Si è verificato un errore durante il salavataggio.");
    }
  });
}
function addProduct() {

  // Ottenere i valori modificati dai campi di input
  const name = document.getElementById('product_name').value;
  const description = document.getElementById('product_description').value;
  const ingredients = document.getElementById('product_ingredients').value;
  const price = document.getElementById('product_price').value;
  const category = document.getElementById('product_category').value;
  const manufacturer = document.getElementById('product_manufacturer').value;
  const stock = document.getElementById('product_stock').value;
  const online = document.getElementById('online_yes').checked ? 1 : 0;
  const fileInput = document.getElementById('fileInput');
  const file = fileInput.files[0];

  // Invia una richiesta AJAX solo quando tutti i campi obbligatori sono compilati
  if (name && description && ingredients && price && category && manufacturer && stock  !== null) {
    const formData = new FormData();
    formData.append('name', name);
    formData.append('description', description);
    formData.append('ingredients', ingredients);
    formData.append('price', price);
    formData.append('category', category);
    formData.append('manufacturer', manufacturer);
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
          location.reload();
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

  // Esegui la chiamata AJAX per eliminare la categoria
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_category", categoryId: categoryId },
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        // Rimuovi l'elemento visuale dalla tabella
        location.reload();
          }
         else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione della categoria.");
    }
  });
}
function addNewCategory() {

  // Ottenere i valori modificati dai campi di input
  const name = document.getElementById('category_name').value;

  if (name!== null) {
    const formData = new FormData();
    formData.append('categoryName', name);

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
    alert("Compila tutti i campi prima di aggiungere la categoria.");
  }
}

function saveChangesCategory(categoryId) {
  // Ottenere i valori modificati dai campi di input
  const editedName = document.getElementById(`editcategory_name_${categoryId}`).value;
  const formData = new FormData();
  formData.append('categoryId2', categoryId);
  formData.append('editedName', editedName);

  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        window.location.href = "/biogg/src/adminAccount.php";
      } else {
        // alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}



function saveChangesSlider(sliderId) {
  // Ottenere i valori modificati dai campi di input
  const editedTitle = document.getElementById(`edit_title_${sliderId}`).value;
  const editedCaption = document.getElementById(`edit_caption_${sliderId}`).value;
  const editedDescription = document.getElementById(`edit_description_${sliderId}`).value;
  const editedImage = document.getElementById(`edit_image2_${sliderId}`).value;
  const fileInput = document.getElementById(`fileInput3_${sliderId}`);
  const file = fileInput.files[0];

  // Costruire l'oggetto con i dati modificati
  const formData = new FormData();
  formData.append('action', 'save_changes');
  formData.append('sliderId', sliderId);
  formData.append('editedTitle', editedTitle);
  formData.append('editedCaption', editedCaption);
  formData.append('editedDescription', editedDescription);

  // Verifica se è stata selezionata una nuova immagine
  if (file) {
    formData.append('editedImage2', file);
  } else {
    formData.append('editedImage', editedImage);
  }

  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        location.reload();
      } else {
         alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}


function deleteSlider(sliderId2) {
  const confirmation = confirm("Sei sicuro di voler eliminare questo slider?");

  if (!confirmation) {
    return;
  }

  // Esegui la chiamata AJAX per eliminare il prodotto
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_slider", sliderId2: sliderId2 },
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        location.reload();

      } else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione dello slider.");
    }
  });
}


function addSlider() {

  // Ottenere i valori modificati dai campi di input
  const title = document.getElementById('slideradd_title').value;
  const caption = document.getElementById('slideradd_caption').value;
  const description = document.getElementById('slideradd_description').value;
  const fileInput = document.getElementById('fileInput4');
  const file = fileInput.files[0];

  // Invia una richiesta AJAX solo quando tutti i campi obbligatori sono compilati
  if (title && caption && description && file !== null) {
    const formData = new FormData();
    formData.append('title', title);
    formData.append('caption', caption);
    formData.append('description', description);
    formData.append('image2', file);

    $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // Gestisci la risposta dal server
        if (response.success) {
          location.reload();

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
    alert("Compila tutti i campi prima di aggiungere lo slider.");
  }
}


function saveChangesOffer(offerId) {
  // Ottenere i valori modificati dai campi di input
  const editedName = document.getElementById(`editoffer_name_${offerId}`).value;
  const editedStartDate = document.getElementById(`editoffer_startdate_${offerId}`).value;
  const editedEndDate = document.getElementById(`editoffer_enddate_${offerId}`).value;
  const editedType = document.getElementById(`editoffer_type_${offerId}`).value;

  // Costruire l'oggetto con i dati modificati
  const formData = new FormData();
  formData.append('offerId', offerId);
  formData.append('editedName', editedName);
  formData.append('editedStartDate', editedStartDate);
  formData.append('editedEndDate', editedEndDate);
  formData.append('editedType', editedType);


  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        location.reload();
      } else {
        // alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}


function deleteOffer(offerId2) {
  const confirmation = confirm("Sei sicuro di voler eliminare questa offerta?");

  if (!confirmation) {
    return;
  }

  // Esegui la chiamata AJAX per eliminare il prodotto
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_offer", offerId2: offerId2 },
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        location.reload();

      } else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione dell'offerta.");
    }
  });
}


function addNewOffer() {

  // Ottenere i valori modificati dai campi di input
  const name = document.getElementById('offer_name').value;
  const startDate = document.getElementById('offer_startdate').value;
  const endDate = document.getElementById('offer_enddate').value;
  const type = document.getElementById('offer_type').value;

  // Invia una richiesta AJAX solo quando tutti i campi obbligatori sono compilati
  if (name && startDate && endDate && type !== null) {
    const formData = new FormData();
    formData.append('nameOffer', name);
    formData.append('startDate', startDate);
    formData.append('endDate', endDate);
    formData.append('type', type);

    $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // Gestisci la risposta dal server
        if (response.success) {
         location.reload();

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
    alert("Compila tutti i campi prima di aggiungere l'offerta.");
  }
}


function aggiungiRecensione(){
  console.log("sono qui");
  var rate = $("input[name='rate']").val();
  var title = $("input[name='title']").val();
  var description = $("textarea[name=description]").val();
  $.ajax({
    type: "POST",
    url: "/biogg/src/customerAccount.php",
    data: {addReview:true,rate:rate, title:title, description:description},
    success: function (response) {
      if (response.success) {
       location.reload();
      } else {
        alert("Errore: " + response.success);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}
function deleteManufacturer(manufacturerId) {
  const confirmation = confirm("Sei sicuro di voler eliminare questo produttore?");

  if (!confirmation) {
    return;
  }

  // Esegui la chiamata AJAX per eliminare la categoria
  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: { action: "delete_manufacturer", manufacturerId: manufacturerId},
    success: function (response) {
      // Gestisci la risposta dal server
      if (response.success) {
        // Rimuovi l'elemento visuale dalla tabella
        location.reload();
      } else {
        alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante l'eliminazione del produttore.");
    }
  });
}
function addNewManufacturer() {

  // Ottenere i valori modificati dai campi di input
  const name = document.getElementById('manufacturer_name').value;

  if (name!== null) {
    const formData = new FormData();
    formData.append('manufacturerName', name);

    $.ajax({
      type: "POST",
      url: "/biogg/src/adminAccount.php",
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        // Gestisci la risposta dal server
        if (response.success) {
          location.reload();

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
    alert("Compila tutti i campi prima di aggiungere il produttore.");
  }
}

function saveChangesManufacturer(manufacturerId) {
  // Ottenere i valori modificati dai campi di input
  const editedName = document.getElementById(`editmanufacturer_name_${manufacturerId}`).value;
  const formData = new FormData();
  formData.append('manufacturerId2', manufacturerId);
  formData.append('editedName', editedName);

  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        window.location.href = "/biogg/src/adminAccount.php";
      } else {
        // alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}



function saveChangesAbout(aboutId) {
  // Ottenere i valori modificati dai campi di input
  const editedSloganAbout = document.getElementById(`edit_sloganAbout_${aboutId}`).value;
  const editedTitleAbout = document.getElementById(`edit_titleAbout_${aboutId}`).value;
  const editedDescriptionAbout = document.getElementById(`edit_descriptionAbout_${aboutId}`).value;
  const editedMissionAbout = document.getElementById(`edit_missionAbout_${aboutId}`).value;
  const editedVisionAbout = document.getElementById(`edit_visionAbout_${aboutId}`).value;
  const editedImageAbout = document.getElementById(`edit_imageAbout_${aboutId}`).value;
  const fileInputAbout = document.getElementById(`fileInputAbout_${aboutId}`);
  const file = fileInputAbout.files[0];

  // Costruire l'oggetto con i dati modificati
  const formData = new FormData();
  formData.append('aboutId', aboutId);
  formData.append('editedSloganAbout', editedSloganAbout);
  formData.append('editedTitleAbout', editedTitleAbout);
  formData.append('editedDescriptionAbout', editedDescriptionAbout);
  formData.append('editedMissionAbout', editedMissionAbout);
  formData.append('editedVisionAbout', editedVisionAbout);

  // Verifica se è stata selezionata una nuova immagine
  if (file) {
    formData.append('editedFileAbout', file);
  } else {
    formData.append('editedImageAbout', editedImageAbout);
  }

  $.ajax({
    type: "POST",
    url: "/biogg/src/adminAccount.php",
    data: formData,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        location.reload();
      } else {
         alert("Errore: " + response.message);
      }
    },
    error: function () {
      alert("Si è verificato un errore durante il salvataggio.");
    }
  });
}