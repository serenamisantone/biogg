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



function addToWishlist(linkElement) {
  // Ottieni lo stato corrente della wishlist dall'attributo "data-isInWishlist".
  const isInWishlist = linkElement.getAttribute('data-isInWishlist') === 'true';

  
  // Ottieni l'ID del prodotto dall'attributo "data-productId".
  const productId = linkElement.getAttribute('data-productId');

  // Determina l'URL del server in base a isInWishlist.
  const serverUrl = isInWishlist ? 'myWishlist.php' : 'shop.php';


  // Esegui una chiamata POST all'URL appropriato.
  fetch(serverUrl, {
      method: 'POST',
      body: JSON.stringify({ product_id: productId }),
      headers: {
          'Content-Type': 'application/json'
      }
  })

  .then(response => {
    /*response.text() // Ottieni il corpo della risposta come testo
    .then(bodyText => {
      console.log(bodyText); // Stampa il corpo della risposta nella console come testo
    })*/
    // Stampa l'intera risposta HTTP nella console
  
    if (!response.ok) {
        throw new Error('Errore nella chiamata POST1');
    }
    return response.json();
  })
  
  .then(data => {
      // In base alla risposta dal server, aggiorna lo stato della wishlist e l'aspetto del cuore.
      if (data.success) {
          // La richiesta è stata completata con successo.
          if (!isInWishlist) {
              // Il prodotto è stato aggiunto alla wishlist, quindi cambia l'aspetto del cuore.
              linkElement.setAttribute('data-isInWishlist', 'true');
              linkElement.querySelector('i').classList.remove('empty-heart');
              linkElement.querySelector('i').classList.add('filled-heart');
          } else {
              // Il prodotto è stato rimosso dalla wishlist, quindi cambia l'aspetto del cuore.
              linkElement.setAttribute('data-isInWishlist', 'false');
              linkElement.querySelector('i').classList.remove('filled-heart');
              linkElement.querySelector('i').classList.add('empty-heart');
          }
      } else {
          console.error('Errore nella chiamata POST2:', data.message); // Mostra il messaggio di errore del server
      }
  })
  
}

