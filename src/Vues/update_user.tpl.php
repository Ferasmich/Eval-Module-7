<div class="container">
    <h1><?= $data["h1"] ?></h1>
    <?php if(!empty($data["erreur"])) :?>
        <div class="alert alert-danger">
            <?php foreach($data["erreur"] as $key => $value) : ?>
                <div><?=  $value  ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <div class="row">
    <form method="post" class="col-6 offset-3 my-4">
        <div class="mb-3">
            <label for="email">email *</label>
            <input type="email" id="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password">password *</label>
            <input type="password" id="password" class="form-control" name="password">
        </div>
        <div class="text-end">
            <input type="submit" class="btn btn-success" value="créer un nouveau profil">
        </div>
    </form>
    </div>
    
</div>