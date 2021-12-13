<div class="wrapper">
    <h1>Tous les médias </h1>
    <table id="myDatatable" class="display">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom du fichier</th>
                <th>Titre</th>
                <th>Alt</th>
                <th>Crée le</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($medias)) { ?>
                <?php foreach ($medias as $media) {
                ?>

                    <tr>
                        <td><?= $media->getId(); ?></td>
                        <td><?= $media->getFileName(); ?></td>
                        <td><?= $media->getTitle(); ?></td>
                        <td><?= $media->getAlt(); ?></td>
                        <td><?= $media->getAdd_At(); ?></td>
                    </tr>
                    </tr>
                <?php } ?>
            <?php } ?>
        </tbody>
    </table>
    <div id="modal" class="modal"></div>
    <div id="overlay"></div>
</div>