<h2>Connexion</h2>

<form method="post" action="index.php?action=login">
    <div class="form-group mt-2">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" name="username" id="username" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Se connecter</button>
</form>

<p>Pas encore de compte ? <a href="index.php?action=register">S'inscrire</a></p>