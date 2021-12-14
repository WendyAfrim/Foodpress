<h1>Formulaire | Modification d'un compte Admin</h1>
<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<?= $form; ?>
