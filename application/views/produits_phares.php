<style>
    .article{
        border:1px dotted black;
        margin: 10px;
        padding: 5px;
    }
</style>
<h3>Produits phares</h3>

<?php if (isset($articles) && is_array($articles) && count($articles)) { ?>
    <br><br><h4><?= count($articles) ?> article(s) trouvé(s)</h4><br>
    <div class="row">
        <div id="articles">

            <?php foreach ($articles as $article) { ?>
                <div class="article">
                    <h4><?= $article['name'] ?></h4>
                    <img src="<?= base_url('assets/img/articles/' . $article['img']) ?>.jpg" height="" width="200px"/><br><br>
                    <strong>Description </strong>: <?= $article['description'] ?><br>
                    <strong>Catégorie </strong>: <?php   echo $article['title'] ?><br>
                    <strong>Quantité en Stock </strong>: <?= $article['stock'] ?><br>
                    <strong>Prix </strong>: <?= $article['prix'] ?> €<br>

                </div>


            <?php } ?>

        </div>
    </div>
<?php } else { ?>
    <h4>Aucun article trouvé pour cet événement</h4>
<?php } ?>

