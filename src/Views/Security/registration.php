<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<div id="form-register">
    <div class="image">
        <img src="https://images.unsplash.com/photo-1484723091739-30a097e8f929?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=898&q=80" alt="">
    </div>
    <div class="wrapper">
        <?= $form; ?>
    </div>
</div>