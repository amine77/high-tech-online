<style>

    #payement_success , #payement_failed{
        display: none;
        font-size: 14px;
    }
</style>
<script>
    $(function () {

        $('#sandbox-container input').datepicker({
            format: "yyyy-mm-dd",
            language: "fr"
        });
        $('#payeform').submit(function () {
            var montant_total = $('[name="montant_total"]').val(), rue = $('[name="rue"]').val(), infos = $('[name="infos"]').val(), ville = $('[name="ville"]').val(), code_postal = $('[name="code_postal"]').val();
            $.ajax({
                url: '<?= base_url('paye_command') ?>',
                method: 'POST',
                dataType: 'json',
                data: {montant_total: montant_total, rue: rue, infos: infos, ville: ville, code_postal: code_postal}
            }).done(function (data) {
                console.log(data);
                if (data.state === 'OK') {
                    $('#payement_success').css("display", "inline").delay(7000).fadeOut();
                } else {
                    $('#payement_failed').css("display", "inline").delay(7000).fadeOut();
                }
                setTimeout(function () {
                    location.href = '<?= base_url('') ?>';
                }, 7000);
            }).fail(function () {
                console.log('erreur ajax');
            })

            return false;
        });

    });
</script>

<h3>Panier</h3>
<?php var_dump($_SESSION) ?>
<?php if (!$this->session->has_userdata('articles_in_cart')) { ?>
    <h3><span class="alert alert-warning">Votre panier est vide</span></h3>

    <?php
} else {

    $articles_in_cart = $_SESSION['articles_in_cart'];
    if (count($articles_in_cart) == 0) {
        echo '<br><br><h3><span class="alert alert-warning">Votre panier est vide</span></h3> ';
    } else {
        ?>
        <h3>Liste des articles</h3>
        <table class="table">
            <?php
            $total = 0;
            foreach ($articles_in_cart as $article) {
                $sous_total = ($article['nb_copies'] * $article['prix_unitaire'] );
                $total += $sous_total;
            }
            ?>
            <tr>
                <th>image</th>
                <th>nom</th>
                <th>prix unitaire</th>
                <th>nombre d'exemplaires</th>
                <th>sous total</th>
                <th>Actions</th>
            </tr>

            <?php foreach ($articles_in_cart as $article_in_cart) { ?>

                <tr>
                    <td><img src="<?= base_url('assets/img/articles/' . $article_in_cart['img']) ?>.jpg" height="" width="300px"/></td>
                    <td><?= $article_in_cart['name'] ?></td>
                    <td><?= $article_in_cart['prix_unitaire'] ?>  €</td>
                    <td><?= $article_in_cart['nb_copies'] ?></td>
                    <td><?= $article_in_cart['nb_copies'] * $article_in_cart['prix_unitaire'] ?>  €</td>
                    <td><a  title="supprimer" href="<?= base_url('delete_from_cart/' . $article_in_cart['article_id']) ?>"  data-confirm="Etes-vous certain de vouloir supprimer cet article?">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        </a></td>
                </tr>
            <?php } ?>
            <tr><td></td><td></td><td></td><td><strong>Total  </strong>: </td><td><?= $total ?>  €</td><td></td></tr>
        </table>

        <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Payer ma commande
        </button><br><br>
        <div class="collapse" id="collapseExample">
            <div class="row">
                <form action="" class="form" id="payeform" name="payeform" method="post" accept-charset="utf-8">
                    <fieldset>
                        <legend>Adresse de livraison</legend>
                        <input type="hidden" name="montant_total" id="montant_total" value="<?= $total ?>" />
                        <div class="form-group">
                            <div class="row colbox">

                                <div class="col-lg-4 col-sm-4">
                                    <input  required="required" class="form-control" type="text" name="rue" id="rue" placeholder="Rue" minlength="4"/>

                                </div>
                                <div class="col-lg-4 col-sm-4">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">

                                <div class="col-lg-4 col-sm-4">
                                    <input  required="required" class="form-control" type="text" name="code_postal" id="code_postal" placeholder="Code postal" minlength="5" />

                                </div>
                                <div class="col-lg-4 col-sm-4">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">

                                <div class="col-lg-4 col-sm-4">
                                    <input  required="required" class="form-control" type="text" name="ville" id="ville" placeholder="Ville" minlength="2" />

                                </div>
                                <div class="col-lg-4 col-sm-4">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row colbox">

                                <div class="col-lg-4 col-sm-4">
                                    <input  required="required" class="form-control" type="text" name="infos" id="infos" placeholder="Informations complémentaires"/>

                                </div>
                                <div class="col-lg-4 col-sm-4">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div></div>
                            <div>
                                <input id="btn_payement" name="btn_payement" type="submit" class="btn btn-success" value="Valider" />
                            </div>
                        </div>
                    </fieldset>
                </form>       
            </div>
        </div>
        <center>
            <span id="payement_success" class="label label-success">Votre payement s'est fait avec succès. Hi-tech online vous remercie pour votre confiance. Vous serez rédirigé vers l'accueil d'ici quelques instants</span>
            <span id="payement_failed" class="label label-danger">Malheureusement, un problème est survenu, votre achat n'a pas pu être pris en compte. Veuillez réessayer plus tard.</span>
        </center>

        <?php
    }
}
?>

