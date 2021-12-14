<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<div id="reset-password">
    <div class="wrapper" style="height:100vh; margin-top:10rem;">
        <?= $form ?>
    </div>
</div>