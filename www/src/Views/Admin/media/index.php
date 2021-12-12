<div class="wrapper">
    <h1>Tous les médias </h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Alt</th>
                <th>Type</th>
                <th>Crée le</th>
                <th>Titre</th>
                <th>Nom du fichier</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($medias)) { ?>
                <?php foreach ($medias as $media) {
                ?>

                    <tr>
                        <td><?= $media->getId(); ?></td>
                        <td><?= $media->getFileName(); ?></td>
                        <td><?= $media->getAlt(); ?></td>
                        <td><?= $media->getFileName(); ?></td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal"></div>
    <div id="overlay"></div>
</div>