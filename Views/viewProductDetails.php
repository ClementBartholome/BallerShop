<div class="container">
    <p class="breadcrumb"><?= $product->getCategory() ?> > <?= $product->getName() ?></p>
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <h2 class="card-title"><?= $product->getName() ?></h2>
                <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === 'admin') { ?>
                    <div class="ms-auto">
                        <a class="btn btn-secondary my-2 mx-2" href="/Ballers/edit-product-form?id=<?= $product->getId() ?>">Editer le produit</a>
                        <a class="btn btn-danger my-2" id="deleteProductButton" href="/Ballers/delete?id=<?= $product->getId() ?>" data-product-id="<?= $product->getId() ?>">Supprimer le produit</a>
                    </div>
                <?php } ?>
            </div>
            <div class="main-image d-flex flex-wrap">
                <div class="col-lg-6">
                    <img src="<?= 'products_images/' . $product->getImage1() ?>" alt="Image 1" class="card-img-top" style="max-width: 500px">
                </div>
                <div class="col-lg-6 d-flex flex-column mt-4 gap-3">
                    <p class="card-text fs-1"><?= number_format($product->getPrice(), 2, ',', ' ') ?> €</p>
                    <p class="card-text"><?= $product->getDescription() ?></p>
 
           
                    <div class="d-flex flex-wrap">
                        <i class="fas fa-truck fa-2x me-2 text-primary"></i>
                        <p>Livraison sous 3 à 5 jours</p>
                    </div>

                    <form method="post" action="/Ballers/add-to-cart">
                        <input type="hidden" name="product_id" value="<?= $product->getId() ?>">
                        <div class="d-flex flex-column">
                            <div class="d-flex align-items-center mb-3">
                                <i class="fas fa-shopping-cart fa-2x me-2 text-success"></i>
                                <label for="quantity" class="me-2">Quantité</label>
                                <input type="number" name="quantity" value="1" min="1" class="form-control w-50">
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Ajouter au panier</button>
                        </div>
                    </form>
                    <div id="productAddedMessage" style="display: none" class="alert alert-success mt-3">
                        Produit ajouté au panier!
                    </div>
                </div>
            </div>
            <div class="sub-image mt-4 text-center">
                <img src="<?= 'products_images/' . $product->getImage1() ?>" alt="Image 1" class="card-img-top" style="max-width: 150px">
                <img src="<?= 'products_images/' . $product->getImage2() ?>" alt="Image 2" class="card-img-top" style="max-width: 150px">
                <img src="<?= 'products_images/' . $product->getImage3() ?>" alt="Image 3" class="card-img-top" style="max-width: 150px">
            </div>
        </div>
    </div>
</div>
