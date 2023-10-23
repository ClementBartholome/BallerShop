<section class="mt-4 mb-4">
    <?php if (isset($category)) : ?>
            <h2 class="text-center"><?= $category ?></h2>
        <?php else : ?>
            <h2 class="text-center">Nos derniers produits</h2>
    <?php endif; ?>
    <?php if(empty($products)): ?>
        <div class="alert alert-info">Aucun produit n'a été trouvé.</div>
    <?php endif; ?>
    <div class="row mb-4">
        <?php foreach ($products as $product): ?>
            <div class="col-md-6 col-lg-3 md-4 mt-4">
                <div class="card">
                    <a href="/Ballers/product-details?id=<?= $product->getId() ?>"> 
                        <img src="<?= 'products_images/' . $product->getImage1() ?>" alt="Image 1" class="card-img-top">
                        <div class="card-body">
                            <h3 class="card-title fs-6 text-truncate"><?= $product->getName() ?></h3>
                            <p class="card-text"><?= number_format($product->getPrice(), 2, ',', ' ') ?> €</p> 
                            <p class="card-text"><?= $product->getCategory() ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <h2 class="text-center">Filtrer par catégorie</h2>
    <div class="row justify-content-center">
        <?php foreach ($categories as $category): ?>
            <div class="col-md-3 col-lg-2 mb-4">
                <div class="card">
                    <a href="/Ballers/products?category=<?= $category['name'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category['name'] ?></h5>
                            <img src="<?= 'products_images/' . $category['image'] ?>" class="card-img-top" alt="Image 1">
                        </div>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
