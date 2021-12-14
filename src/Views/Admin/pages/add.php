<?php if (isset($errors)): ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<h1>Formulaire | Ajout d'une page</h1>
<?= $form; ?>