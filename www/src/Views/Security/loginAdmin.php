<?php if (isset($errors)) : ?>
    <ul class='alert--info'>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<div id="admin-form-login">
    <div class="wrapper">
        <?= $form ?>
    </div>
</div>