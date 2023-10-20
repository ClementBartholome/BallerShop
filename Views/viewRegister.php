<h2>Inscription</h2>

<form method="post" action="/Ballers/register">
    <div class="form-group mt-2">
        <label for="new-username">Nouveau nom d'utilisateur :</label>
        <input type="text" name="new-username" id="new-username" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label for="new-password">Nouveau mot de passe :</label>
        <input type="password" name="new-password" id="new-password" class="form-control" required>
    </div>

    <div class="form-group mt-2">
        <label for="new-email">Email :</label>
        <input type="email" name="new-email" id="new-email" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success mt-2">S'inscrire</button>
</form>

<p>Déjà un compte ? <a href="/Ballers/login">Se connecter</a></p>