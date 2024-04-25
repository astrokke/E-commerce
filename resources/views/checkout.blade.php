
<script src="https://js.stripe.com/v3/"></script>
<form id="payment-form">
    <div id="card-element">
      <!-- Un élément Stripe Card sera inséré ici. -->
    </div>

    <!-- Utilisé pour afficher les erreurs de formulaire. -->
    <div id="card-errors" role="alert"></div>

    <button id="submit-button">Payer</button>
</form>
<script>
const stripe = Stripe('pk_test_51P8MOUHV9hdtdtHLbNAsM2iFxRjS7uFzEuAsaAGh2O0l2Ve6vVWj9mpw6iK9FtUd42gH8uA70yLhfWsgpyNWe2Fw005IJoqidq'); // Utilisez votre clé publique
const elements = stripe.elements();

const style = {
  base: {
    color: "#32325d",
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: "antialiased",
    fontSize: "16px",
    "::placeholder": {
      color: "#aab7c4"
    }
  },
  invalid: {
    color: "#fa755a",
    iconColor: "#fa755a"
  }
};



const card = elements.create('card', { style: style });
card.mount('#card-element');
const form = document.getElementById('payment-form');

form.addEventListener('submit', async (event) => {
    event.preventDefault();
  
    stripe.createPaymentMethod('card', card).then(function(result) {
        if (result.error) {
            // Informez l'utilisateur s'il y a eu une erreur.
            const errorElement = document.getElementById('card-errors');
            errorElement.textContent = result.error.message;
        } else {
            // Envoyez le PaymentMethod.id au serveur pour le paiement.
            stripePaymentMethodHandler(result.paymentMethod.id);
        }
    });
});

</script>
