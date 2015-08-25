<script>
    $(function () {
        $('[name="signup_newsletter"]').submit(function (e) {
            e.preventExtensions();
            var email = $('#email').val();
            console.log('email = ' + email);
        });
    })
</script>


<br><br><h3>Newsletter </h3>
<h5>Pour vous inscrire à notre newsletter, veuillez nous laisser votre adresse mail </h5>

<form  name="signup_newsletter" action="<?= base_url('secured/signup_newsletter') ?>" class="navbar-form navbar-left" role="inscription">
    <div class="form-group">
        <input id="email" name="email" type="text" class="form-control" readonly="" value="<?= $_SESSION['email'] ?>">
    </div>
    <button  type="submit" class="btn btn-success">S'inscrire</button>
</form>
