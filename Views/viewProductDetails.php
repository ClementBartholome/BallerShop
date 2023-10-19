<div class="container">
    <h2>Détails du Produit</h2>
    <div class="card">
        <img src="<?= 'products_images/' . $product['image1'] ?>" alt="Image 1" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text"><?= $product['description'] ?></p>
            <p class="card-text">Prix : <?= $product['price'] ?> €</p>
            <p class="card-text">Catégorie : <?= $product['category'] ?></p>
        </div>
    </div>
</div>
