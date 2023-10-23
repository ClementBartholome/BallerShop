<h2>Editer le produit</h2>

<form method="post" action="/Ballers/edit?id=<?= $product->getId() ?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $product->getId() ?>">
    <div class="form-group mt-2">
        <label for="name">Nom du produit:</label>
        <input type="text" name="name" id="name" class="form-control" value="<?= $product->getName() ?>" required>
        <div class="invalid-feedback">
            Veuillez saisir le nom du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" rows="10" required><?= $product->getDescription() ?></textarea>
        <div class="invalid-feedback">
            Veuillez saisir la description du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="price">Prix:</label>
        <input type="text" name="price" id="price" class="form-control" value="<?= $product->getPrice() ?>" required>
        <div class="invalid-feedback">
            Veuillez saisir le prix du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="category">Catégorie:</label>
        <input type="text" name="category" id="category" class="form-control" value="<?= $product->getCategory() ?>" required>
        <div class="invalid-feedback">
            Veuillez saisir la catégorie du produit.
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2 mb-4">Editer le produit</button>
</form>
