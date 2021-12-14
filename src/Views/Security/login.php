<?php if (isset($errors)) : ?>
    <ul>
        <?php foreach ($errors as $error) : ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
    </ul>
<?php endif; ?>
<div id="form-login">
    <div class="wrapper">
        <img src="https://images.unsplash.com/photo-1493770348161-369560ae357d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1770&q=80" alt="Food image">
        <?= $form ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.random-field').html("<a href='/forgotten_password'>Mot de passe oublié ?</a>");
    })
</script>