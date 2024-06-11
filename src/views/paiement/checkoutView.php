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
    <!-- Ajout de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/XVU3+4d6bN6djzG3XWmSitmZp3Sx1CiU6DGXw" crossorigin="anonymous">
    <style>
        /* Styles de base pour le formulaire */
        h1 {
            color: #343a40;
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
            font-size: 16px;
        }

        /* Ajout de styles personnalisés */
        form {
            border-radius: 1rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .form-row {
            margin-bottom: 1.5rem;
        }

        label {
            font-weight: 500;
        }
    </style>
    <script>
        var stripeKey = "<?php echo $_ENV['STRIPE_PUBLIC_KEY']; ?>";
    </script>
</head>

<body>
    <div class="container">
        <h1 class="text-center my-4">Paiement</h1>
        <form action="process_payment.php" method="post" id="payment-form" class="p-4">
            <div class="form-row">
                <label for="card-element">
                    Carte de crédit ou de débit
                </label>
                <div id="card-element" class="form-control">
                    <!-- Un élément de carte sera inséré ici. -->
                </div>
                <!-- Utilisé pour afficher les erreurs -->
                <div id="card-errors" role="alert"></div>
            </div>
            <div class="form-row">
                <label for="name">Nom complet</label>
                <input type="text" id="name" name="name" required class="form-control">
            </div>
            <div class="form-row">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" required class="form-control">
            </div>
            <div class="form-row">
                <label for="address">Adresse de livraison</label>
                <input type="text" id="address" name="address" required class="form-control">
            </div>
            <!-- Ajoutez d'autres champs d'informations utilisateur si nécessaire -->
            <button type="submit" class="btn btn-primary w-100">Payer <?= htmlspecialchars($totalPrice, ENT_QUOTES, 'UTF-8') ?> €</button>
        </form>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripeKey = "<?php echo $_ENV['STRIPE_PUBLIC_KEY']; ?>";
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
