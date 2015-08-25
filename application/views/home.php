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
    <div class="row">
        <h3>Liste des événements :</h3><br>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Actuellement</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Prochains événements</h3>
                </div>
                <div class="panel-body">
                    Panel content
                </div>
            </div>

        </div>
    </div> 


<?php } ?>
