<style>
    #subscribe_newsletter_success , #subscribe_newsletter_failed, #unsubscribe_newsletter_success, #unsubscribe_newsletter_failed{
        display: none;
        font-size: 12px;
    }
</style>
<script>
    $(function () {
        $('#subscribe_newsletter').submit(function (e) {

            var email = $('#email').val();
            console.log('email = ' + email);
            $.ajax({
                method: 'POST',
                url: '<?= base_url('secured/subscribe_newsletter') ?>',
                dataType: 'json',
                data: {mail: email}
            }).done(function (data) {
                if(data.state ==='OK'){
                     $('#subscribe_newsletter_success').css("display", "inline").delay(7000).fadeOut();
                }else{
                     $('#subscribe_newsletter_failed').css("display", "inline").delay(7000).fadeOut();
                }
               
                setTimeout(function () {
                    location.reload();
                }, 7000);

            }).fail(function () {

                console.log('erreur ajax')
            });
            return false;
        });

        $('#unsubscribe_newsletter').submit(function (e) {

            var email = $('#email').val();
            console.log('email = ' + email);
            $.ajax({
                method: 'POST',
                url: '<?= base_url('secured/unsubscribe_newsletter') ?>',
                dataType: 'json',
                data: {mail: email}
            }).done(function (data) {
                if(data.state ==='OK'){
                     $('#unsubscribe_newsletter_success').css("display", "inline").delay(7000).fadeOut();
                }else{
                     $('#unsubscribe_newsletter_failed').css("display", "inline").delay(7000).fadeOut();
                }
                setTimeout(function () {
                    location.reload();
                }, 7000);

            }).fail(function () {

                console.log('erreur ajax')
            });
            return false;
        });
    })
</script>


<br><br><h3>Newsletter </h3>
<?php if ($user['in_newsletter'] != 1) { ?>
    <h5>Pour vous abonner à notre newsletter, veuillez nous laisser votre adresse mail </h5>
    <span id="subscribe_newsletter_success" class="label label-success">Vous êtes désormais inscrit à notre newsletter, Hi-tech vous remercie pour votre confiance.</span>
    <span id="subscribe_newsletter_failed" class="label label-danger">Un problème est survenu, votre inscription n'a pas été prise en compte</span>
    <form  id="subscribe_newsletter" action="#" class="navbar-form navbar-left" role="inscription">
        <div class="form-group">
            <input id="email" name="email" type="text" class="form-control" readonly="" value="<?= $_SESSION['email'] ?>">
        </div>
        <button type="submit" class="btn btn-success">S'inscrire</button>
    </form>

<?php } else { ?>

    <h5>Vous êtes bien abonné à notre newsletter, si vous le souhaitez vous pouvez vous désinscrire </h5>
    <span id="unsubscribe_newsletter_success" class="label label-success">Vous êtes désormais désabonné de notre newsletter.</span>
    <span id="unsubscribe_newsletter_failed" class="label label-danger">Un problème est survenu, votre désabonnement a échoué. Veuillez réessayer plus tard ou contacter notre webmaster.</span>
    <form  id="unsubscribe_newsletter" action="#" class="navbar-form navbar-left" role="desinscription">
        <div class="form-group">
            <input id="email" name="email" type="text" class="form-control" readonly="" value="<?= $_SESSION['email'] ?>">
        </div>
        <button type="submit" class="btn btn-success">Se désinscrire</button>
    </form>
<?php } ?>