<div class="wrapper">
    <h1>Paramètres généraux</h1>
    <?php if (isset($errors)) : ?>
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
    <?= $form; ?>
</div>