<br><br><br><br>


<div>
    <br><h2>Inscription</h2><br>
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="container">
        <div class="row">
            <div class="bloc_form_connex">
                <?php
                $attributes = array("class" => "form-horizontal", "id" => "signupform", "name" => "signupform");
                echo form_open("signup", $attributes);
                ?>
                <fieldset>
                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="txt_username" class="control-label">Login</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_username" name="txt_username" placeholder="Login" type="text" value="<?php echo set_value('txt_username'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_username'); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="txt_password" class="control-label">Mot de passe</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_password" name="txt_password" placeholder="Mot de passe" type="password" value="<?php echo set_value('txt_password'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_password'); ?></span>
                            </div>
                        </div>
                    </div>

                   <div class="form-group">
                        <div class="row colbox">
                            <div class="col-lg-4 col-sm-4">
                                <label for="txt_mail" class="control-label">E-mail</label>
                            </div>
                            <div class="col-lg-8 col-sm-8">
                                <input class="form-control" id="txt_mail" name="txt_mail" placeholder="E-mail" type="text" value="<?php echo set_value('txt_mail'); ?>" />
                                <span class="text-danger"><?php echo form_error('txt_mail'); ?></span>
                            </div>
                        </div>
                    </div>
                   

                    <div class="form-group">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <input id="btn_signup" name="btn_signup" type="submit" class="btn btn-success" value="Créer mon compte" />
                            <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-default" value="Annuler" />
                        </div>
                    </div>
                </fieldset>
                <?php echo form_close(); ?>

            </div>

        </div>
    </div>

</div>
