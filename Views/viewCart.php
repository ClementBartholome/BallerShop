<section class="container">
    <h1 class="text-center mt-3">Votre panier <?php if(empty($cartItems)):?>est vide<?php endif ?></h1>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Produits</th>
                    <th scope="col">Prix unitaire</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item): ?>
                    <tr>
                        <td><?= $item['product_name'] ?></td>
                        <td><?= number_format($item['product_price'], 2, ',', ' ') ?> €</td>
                        <td><?= $item['quantity'] ?></td>
                        <td><?= number_format($item['total_price'], 2, ',', ' ') ?> €</td>
                        <td>
                            <form method="post" action="/Ballers/remove-from-cart">
                                <input type="hidden" name="cart_id" value="<?= $item['cart_id'] ?>">
                                <button type="submit" class="btn btn-danger">Retirer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <p class="text-end">Total du Panier : <?= number_format($totalCartPrice, 2, ',', ' ') ?> €</p>
    <div class="text-center mt-3">
        <a href="/Ballers/checkout" class="btn btn-primary mb-4">Paiement</a>
    </div>
</section>
