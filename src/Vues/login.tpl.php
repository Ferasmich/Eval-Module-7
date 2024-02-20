<div class="container">
    <h1><?= $data["h1"] ?></h1>
    <?php if(!empty($data["erreur"])) :?>
        <div class="alert alert-danger">
            <?php foreach($data["erreur"] as $key => $value) : ?>
                <div><?=  $value  ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <form method="post">
        <div class="mb-3">
            <label for="email">votre email</label>
            <input type="email" placeholder="votre@email.fr" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password">votre mot de passe</label>
            <input type="text" placeholder="votre mot de passe" class="form-control" id="password" name="password">
        </div>
        <div class="text-center">
            <input type="submit" class="btn btn-outline-success" value="connexion">
        </div>
    </form>
</div>