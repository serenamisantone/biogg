
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
                   // updateCart(response);

                    location.reload();
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

function addNewCategory() {
    // Ottieni il valore del nome della categoria dal campo di input
    var categoryName = document.getElementById('category_name').value;
    $.ajax({
        type: "POST",
        url: "/biogg/src/adminAccount.php", // Sostituisci con il percorso del tuo script PHP
        data: { categoryName: categoryName },
        success: function (response) {
            if (response.success) {
                location.reload();

            } else {

            }
        }
    });
}

$(document).ready(function () {
    document.querySelector('.addToCartFromSingleProduct').addEventListener('click', function () {
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
location.reload();
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
$(document).ready(function () {
    // Aggiungi gli event listener ai pulsanti
    document.querySelector('.decreaseFromSingleProduct').addEventListener('click', decreaseQuantity);
    document.querySelector('.increaseFromSingleProduct').addEventListener('click', increaseQuantity);
});

