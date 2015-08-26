<?php if (!$this->session->has_userdata('login')) { ?>
    <div class="jumbotron">
        <h1>Hi-tech online!</h1>
        <p class="lead">Hi-tech online est une société qui organise des séances de ventes de différents produits.</p>
        <p><a class="btn btn-lg btn-success" href="<?= base_url('login') ?>" role="button">Rejoignez-nous</a></p>
    </div>

<?php } else { ?>
    <div class="jumbotron">

        <h3>Bienvenue <?= $_SESSION['login'] ?></h3>
    </div>



    <h2>Ventes en cours</h2>


    <?php if (isset($ventes_en_cours) && is_array($ventes_en_cours) && count($ventes_en_cours)) { ?>

        <?php foreach ($ventes_en_cours as $vente_en_cours) {
            ?>
            <div class="prochaine_vente">
                <h3><a href="<?= base_url('view_event/' . $vente_en_cours['id']) ?>"><strong><?= $vente_en_cours['title'] ?></strong></a></h3>
                <strong>Début </strong>:  <?= $vente_en_cours['date_debut'] ?>&nbsp;&nbsp;<strong>Fin </strong>: <?= $vente_en_cours['date_fin'] ?>

            </div>
        <?php }
    } else {
        ?>

        <h5>Aucun événement trouvé pour l'instant</h5>
    <?php } ?>





<?php } ?>
