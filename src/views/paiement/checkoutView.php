<?php

get_header('Accueil', 'public');
?>

<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../../config');
$dotenv->load();

\Stripe\Stripe::setApiKey($_ENV['STRIPE_SECRET_KEY']);

// Assurez-vous que total_price est défini
$totalPrice = isset($_GET['total']) ? $_GET['total'] : 0;
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement</title>
    <style>
        /* Styles de base pour le formulaire */
        h1 {
            color: #343a40;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .form-row {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #495057;
        }

        #card-element {
            border: 1px solid #ced4da;
            padding: 10px;
            border-radius: 4px;
            background-color: #fff;
        }

        #card-errors {
            color: #e3342f;
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
    <script>
        var stripeKey = "<?php echo $_ENV['STRIPE_PUBLIC_KEY']; ?>";
    </script>
</head>

<body>
    <h1>Paiement</h1>
    <<form action="process_payment.php" method="post" id="payment-form">
        <div class="form-row">
            <label for="card-element">
                Carte de crédit ou de débit
            </label>
            <div id="card-element">
                <!-- Un élément de carte sera inséré ici. -->
            </div>
            <!-- Utilisé pour afficher les erreurs -->
            <div id="card-errors" role="alert"></div>
        </div>
        <div class="form-row">
            <label for="name">Nom complet</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-row">
            <label for="email">Adresse e-mail</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-row">
            <label for="address">Adresse de livraison</label>
            <input type="text" id="address" name="address" required>
        </div>
        <!-- Ajoutez d'autres champs d'informations utilisateur si nécessaire -->
        <button type="submit">Payer <?= htmlspecialchars($totalPrice, ENT_QUOTES, 'UTF-8') ?> €</button>
        </form>


        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe(stripeKey);
            var elements = stripe.elements();

            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            var card = elements.create('card', {
                style: style
            });
            card.mount('#card-element');

            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        </script>
</body>

</html>