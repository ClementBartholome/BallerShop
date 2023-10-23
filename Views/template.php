<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="container d-flex flex-column vh-100">
    <header class="py-4">
        <a class="navbar-brand" href="/Ballers">
            <h1><i class="fas fa-basketball-ball"></i> Ballers Shop</h1>
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Ballers">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse col-sm-12 col-md-6" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                    <a class="nav-link" href="/Ballers/cart">
                        <img src="images/basket.svg" alt="Panier" width="16" >
                        Panier
                    </a>
                    </li>
                        <?php if (isset($_SESSION['userIsLoggedIn']) && $_SESSION['userIsLoggedIn']) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/Ballers/logout"><i class="fas fa-user"></i> Se Déconnecter</a>
                            </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/Ballers/login"><i class="fas fa-user"></i> Se Connecter</a>
                                </li>
                                <?php } ?>
                                <?php if (isset($_SESSION['userRole']) && $_SESSION['userRole'] === 'admin') { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" aria-current="page" href="/Ballers/add-product-form">Ajouter un produit</a>
                                    </li>
                                <?php } ?>
                            </ul>
                </div>
            </div>
        </nav>
    </header>
    <main>
        <?= $content ?>
    </main>
    <footer class="bg-primary text-white py-4 mt-auto text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white">Liens Rapides</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#">Accueil</a></li>
                        <li><a class="text-white" href="#">Produits</a></li>
                        <li><a class="text-white" href="#">Promotions</a></li>
                        <li><a class="text-white" href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white">Nos Produits</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="/Ballers/products?category=Vêtements">Vêtements</a></li>
                        <li><a class="text-white" href="/Ballers/products?category=Chaussures">Chaussures</a></li>
                        <li><a class="text-white" href="/Ballers/products?category=Accessoires">Accessoires</a></li>
                        <li><a class="text-white" href="/Ballers/products?category=Produits Dérivés">Produits Dérivés</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white">Contact</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white" href="#">Support</a></li>
                        <li><a class="text-white" href="#">FAQ</a></li>
                        <li><a class="text-white" href="#">Livraison et Retours</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white">Modes de Paiement</h5>
                    <ul class="list-unstyled">
                        <li><i class="fab fa-cc-visa fa-2x text-light"></i></li>
                        <li><i class="fab fa-cc-mastercard fa-2x text-light"></i></li>
                        <li><i class="fab fa-paypal fa-2x text-light"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/7c85ecb699.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>
