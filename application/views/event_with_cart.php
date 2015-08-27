
<script>
	
$(function() {
	$('a[data-confirm]').click(function(ev) {
		var href = $(this).attr('href');
		
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Confirmation demandée</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-success" id="dataConfirmOK">Ajouter</a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		
		return false;
	});
});

</script>
<style>
    .article{
        border:1px dotted black;
        margin: 10px;
        padding: 5px;
    }
</style>
<h3>Evénement : <?= $event['title'] ?></h3>

<?php if (isset($articles) && is_array($articles) && count($articles)) { ?>
    <br><br><h4><?= count($articles) ?> article(s) disponible(s)</h4><br>
    <div class="row">
        <div id="articles">

            <?php foreach ($articles as $article) { ?>
                <div class="article">
                    <h4><?= $article['name'] ?></h4>
                    <p class="pull-right">
                       
                        <a class="btn btn-success" href="<?= base_url('view_article/' . $article['id']).'/'.$id ?>"  data-confirm="Voulez-vous ajouter cet article à votre panier?" role="button"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Ajouter au panier</a>
                    </p>
                    <img src="<?= base_url('assets/img/articles/' . $article['img']) ?>.jpg" height="" width="200px"/><br><br>
                    <strong>Description </strong>: <?= $article['description'] ?><br>
                    <strong>Catégorie </strong>: <?= $article['title'] ?><br>
                    <strong>Quantité en Stock </strong>: <?= $article['stock'] ?><br>
                    <strong>Prix </strong>: <?= $article['prix'] ?> €<br>

                </div>


            <?php } ?>

        </div>
    </div>
<?php } else { ?>
    <h4>Aucun article trouvé pour cet événement</h4>
<?php } ?>

