
<?php require_once 'src/controllers/calcul_panier.php';
?>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<body>
<div class="h-screen bg-gray-100 flex justify-center items-center">
    <div class="w-full max-w-5xl flex justify-between items-start space-x-6">
        <div class="w-1/2">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="mb-10 text-center text-2xl font-bold">Récapitulatif de commande</h1>
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Sous Total</p>
                    <p class="text-gray-700">€<?php echo $total_sous_total; ?></p>
                </div>
                <div class="mb-2 flex justify-between">
                    <p class="text-gray-700">Frais de livraison</p>
                    <p class="text-gray-700"><?php echo $frais_livraison; ?></p>
                </div>
                <hr class="my-4">
                <div class="mb-2 flex justify-between">
                    <p class="text-lg font-bold">Total</p>
                    <p class="text-lg font-bold">€<?php echo $total ?></p>
                </div>
            </div>
            <div id="bouton-paypal"></div>
            </div>
        </div>
    </div>
</body>

<script>
    paypal.Button.render({
        env: 'sandbox', // Ou 'production',
        commit: true, // Affiche le bouton  "Payer maintenant"
        style: {
            color: 'gold', // ou 'blue', 'silver', 'black'
            size: 'responsive' // ou 'small', 'medium', 'large'
            // Autres options de style disponibles ici : https://developer.paypal.com/docs/integration/direct/express-checkout/integration-jsv4/customize-button/
        },
        payment: function(data, actions) {
            /* 
                 * Création du paiement
                 */
            console.log('paiement créé');
        },
        onAuthorize: function(data, actions) {
            /* 
                 * Exécution du paiement 
                 */
        },
        onCancel: function(data, actions) {
            /* 
                 * L'acheteur a annulé le paiement
                 */
        },
        onError: function(err) {
            /* 
                 * Une erreur est survenue durant le paiement 
                 */
        }
    }, '#bouton-paypal');
</script>
