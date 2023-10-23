<div class="container">
    <p class="breadcrumb"><?= $product['category'] ?> > <?= $product['name'] ?></p>
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex flex-wrap">
                <h2 class="card-title"><?= $product['name'] ?></h2>
                <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === 'admin') { ?>
                    <div class="ms-auto">
                        <a class="btn btn-secondary my-2 mx-2" href="/Ballers/edit-product-form?id=<?= $product['id'] ?>">Editer le produit</a>
                        <a class="btn btn-danger my-2" id="deleteProductButton" href="/Ballers/delete?id=<?= $product['id'] ?>" data-product-id="<?= $product['id'] ?>">Supprimer le produit</a>
                    </div>
                <?php } ?>
            </div>
            <div class="main-image d-flex flex-wrap">
                <div class="col-lg-6">
                    <img src="<?= 'products_images/' . $product['image1'] ?>" alt="Image 1" class="card-img-top" style="max-width: 500px">
                </div>
                <div class="col-lg-6 d-flex flex-column mt-4">
                    <p class="card-text fs-1"><?= number_format($product['price'], 2, ',', ' ') ?> €</p>
                    <p class="card-text"><?= $product['description'] ?></p>
 
           
                    <div class="d-flex flex-wrap">
                        <i class="fas fa-truck fa-2x me-2 text-primary"></i>
                        <p>Livraison sous 3 à 5 jours</p>
                    </div>

                    <div class="d-flex flex-wrap">
                        <i class="fas fa-shopping-cart fa-2x me-2 text-success"></i>
                        <label for="quantity" class="me-2">Quantité : </label>
                        <input type="number" id="quantity" name="quantity" class="form-control mt-2"  value="1" min="1">
                    </div>

                    <button class="btn btn-primary mt-3">Ajouter au panier</button>
                </div>
            </div>
            <div class="sub-image mt-4 text-center">
                <img src="<?= 'products_images/' . $product['image1'] ?>" alt="Image 1" class="card-img-top" style="max-width: 150px">
                <img src="<?= 'products_images/' . $product['image2'] ?>" alt="Image 2" class="card-img-top" style="max-width: 150px">
                <img src="<?= 'products_images/' . $product['image3'] ?>" alt="Image 3" class="card-img-top" style="max-width: 150px">
            </div>
        </div>
    </div>
</div>
