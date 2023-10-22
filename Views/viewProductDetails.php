<div class="container">
    <p class="breadcrumb"><?= $product['category'] ?> > <?= $product['name'] ?></p>
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-flex">
                <h2 class="card-title"><?= $product['name'] ?></h2>
                <?php if ($_SESSION['userRole'] === 'admin') { ?>
                        <a class="btn btn-secondary ms-auto" href="/Ballers/edit-product-form?id=<?= $product['id'] ?>">Editer le produit</a>
                        <a class="btn btn-danger ms-auto" id="deleteProductButton" href="/Ballers/delete?id=<?= $product['id'] ?>" data-product-id="<?= $product['id'] ?>">Supprimer le produit</a>
                <?php } ?>
            </div>
            <div class="main-image d-flex flex-wrap">
                <div class="col-lg-6">
                    <img src="<?= 'products_images/' . $product['image1'] ?>" alt="Image 1" class="card-img-top" style="max-width: 500px">
                </div>
                <div class="col-lg-6 d-flex flex-column mt-4">
                    <p class="card-text fs-1">Prix : <?= $product['price'] ?> €</p>
                    <p class="card-text fs-1">Catégorie : <?= $product['category'] ?></p>
                    <p class="card-text"><?= $product['description'] ?></p>
                    <button class="btn btn-primary mt-auto">Ajouter au panier</button>
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
