<style>
    .stock{
        font-size: 22px;
    }
    #add_to_cart_success , #add_to_cart_failed{
        display: none;
        font-size: 14px;
    }
</style>
<script>
$(function(){
    var prix  = <?= $article['prix'] ?>;
    $(":input").bind('keyup mouseup', function () {
        var nb_copies = parseInt($('[name="copies"]').val());
        
        if(typeof nb_copies  == 'number'){
            var nouveau_prix= prix * nb_copies;
            if(!isNaN(nouveau_prix)){
                $('span.prix').text(nouveau_prix);
            }else{
                $('span.prix').text('0');
            }
            
        }else{
            console.log('not a number');
        }
        $("input[type='number']").css("background-color", "pink");
    }); 
    
    $('form[name="add-to-cart"]').submit(function (){
        
        var article_id = <?= $article['id'] ?>, nb_copies = parseInt($('[name="copies"]').val()), prix_unitaire = <?= $article['prix'] ?> , img = '<?= $article['img'] ?>';
        var name = "<?= $article['name'] ?>";
        console.log('article_id = ' +article_id);
        $.ajax({
            method:'POST',
            url:'<?= base_url("add_to_cart") ?>',
            dataType: 'json',
            data:{article_id:article_id, nb_copies : nb_copies, prix_unitaire:prix_unitaire, img:img, name:name}
        }).done(function(data){
            console.log(data);
            if(data.state ==='OK'){
                     $('#add_to_cart_success').css("display", "inline").delay(6000).fadeOut();
                }else{
                     $('#add_to_cart_failed').css("display", "inline").delay(6000).fadeOut();
                }
                setTimeout(function () {
                    location.href= '<?=  base_url('view_cart')  ?>';
                }, 6000);
        })
          .fail(function(){
            console.log('erreur ajax');
        });
        
        return false;
        
    });
});
</script>
<br><br>
<div class="row">
    <h4><a href="<?= base_url('view_event_with_cart/'.$event_id) ?>">Revenir à la liste des articles</a></h4><br><br>
        <center><span id="add_to_cart_success" class="label label-success">Vos articles ont bien ajoutés au panier.</span>
    <span id="add_to_cart_failed" class="label label-danger">Un problème est survenu, vos articles n'ont pas été ajoutés au panier.</span>
        </center>
</div>


<div class="row">
  
    <form id="add-to-cart" name="add-to-cart">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/articles/' . $article['img']) ?>.jpg" height="" width="300px"/>
        </div>
        <div class="col-md-4">
            <h2><?= $article['name'] ?></h2>
            <?= $article['description'] ?><br>
            <?= $article['name'] ?><br><br>
            <div class="row">
                <div class="col-xs-3">
                    <input type="number"  name="copies" id="copies" class="form-control input-sm" step="1" min="1" value="1" max="<?= $article['stock'] ?>">
                </div>
                <span class="stock">/ <strong><?= $article['stock'] ?></strong></span>
            </div>
            <div class="row">
               <br> <input type="submit" name="btn_ajouter" id="btn_ajouter" value="Ajouter au panier" class="btn btn-lg btn-success"/>
            </div>
                
            

        </div>
        <div class="col-md-4">
            <h3><span class="prix"><?= $article['prix'] ?></span> €</h3>
             <img src="<?= base_url('assets/img/payment-logo.png')?>" height="" width="300px"/>
        </div>
    </form>
</div>
