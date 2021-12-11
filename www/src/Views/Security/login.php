<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>

<div id="form-login">
    <div class="container">
        <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" alt="Food image">
        <div class="formLogin">
            <form action="" method="POST">
                <h2>Connexion</h2>
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
                <button type="submit">Se connecter</button>
            </form>
        </div>

    </div>
</div>