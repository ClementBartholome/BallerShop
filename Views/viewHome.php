<section class="mt-4 mb-4">
    <h2 class="text-center">Tous nos produits</h2>
    <?php if(empty($products)): ?>
        <div class="alert alert-info">Aucun produit n'a été trouvé.</div>
    <?php endif; ?>
    <div class="row mb-4">
        <?php foreach ($products as $product): ?>
            <div class="col-md-6 col-lg-4 md-4 mt-4">
                <div class="card">
                    <a href="index.php?action=productDetails&id=<?= $product['id'] ?>">
                        <img src="<?= 'products_images/' . $product['image1'] ?>" alt="Image 1" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $product['name'] ?></h5>
                            <p class="card-text">Prix : <?= $product['price'] ?> €</p>
                            <p class="card-text">Catégorie : <?= $product['category'] ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
