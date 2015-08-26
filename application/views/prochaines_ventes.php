

<h2>Prochaines ventes</h2>


<?php if (isset($prochaines_ventes) && is_array($prochaines_ventes) && count($prochaines_ventes)) { ?>

    <?php foreach ($prochaines_ventes as $prochaine_vente) {
        ?>
        <div class="prochaine_vente">
            <h3><a href="<?= base_url('view_event/' . $prochaine_vente['id']) ?>"><strong><?= $prochaine_vente['title'] ?></strong></a></h3>
            <strong>Début </strong>:  <?= $prochaine_vente['date_debut'] ?>&nbsp;&nbsp;<strong>Fin </strong>: <?= $prochaine_vente['date_fin'] ?>

        </div>
    <?php }
} else {
    ?>

    <h5>Aucun événement trouvé pour l'instant</h5>
<?php } ?>


