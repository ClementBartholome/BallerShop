<h2>Ajouter un produit</h2>

<form method="post" action="/Ballers/add" enctype="multipart/form-data" >
    <div class="form-group mt-2">
        <label for="name">Nom du produit:</label>
        <input type="text" name="name" id="name" class="form-control" required>
        <div class="invalid-feedback">
            Veuillez saisir le nom du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="description">Description:</label>
        <textarea name="description" id="description" class="form-control" rows="10" required></textarea>
        <div class="invalid-feedback">
            Veuillez saisir la description du produit.
        </div>
    </div>

    <div class="form-group mt-2 ">
        <label for="price">Prix:</label>
        <input type="text" name="price" id="price" class="form-control" required>
        <div class="invalid-feedback">
            Veuillez saisir le prix du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="category">Catégorie:</label>
        <input type="text" name="category" id="category" class="form-control" required>
        <div class="invalid-feedback">
            Veuillez saisir la catégorie du produit.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="image1">Image 1:</label>
        <input type="file" name="image1" id="image1" class="form-control-file" required>
        <div class="invalid-feedback">
            Veuillez sélectionner une image.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="image2">Image 2:</label>
        <input type="file" name="image2" id="image2" class="form-control-file" required>
        <div class="invalid-feedback">
            Veuillez sélectionner une image.
        </div>
    </div>

    <div class="form-group mt-2">
        <label for="image3">Image 3:</label>
        <input type="file" name="image3" id="image3" class="form-control-file" required>
        <div class="invalid-feedback">
            Veuillez sélectionner une image.
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2  mb-4">Ajouter le produit</button>
</form>
