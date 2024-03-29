<div class="container">
    <h1><?= $data["h1"] ?></h1>
    <?php if(!empty($data["erreur"])) :?>
        <div class="alert alert-danger">
            <?php foreach($data["erreur"] as $key => $value) : ?>
                <div><?=  $value  ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    
    <?php
        foreach($data["user"] as $key => $value)
        $userEmail = $value->getEmail();
    ?>

    <div class="row">
    <form method="post" class="col-6 offset-3 my-4" action="update">
        <div class="mb-3">
            <label for="user_id">ID </label>
            <input type="user_id" id="user_id" class="form-control" name="user_id" value="<?php echo $data["user_id"]; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="email">email </label>
            <input type="email" id="email" class="form-control" name="email" value = "<?= $userEmail ?>">
        </div>
        <div class="mb-3">
            <label for="password">password </label>
            <input type="password" id="password" class="form-control" name="password">
        </div>
        <!-- Ajouter un input caché avec la valeur "update" -->
        <input type="hidden" name="type" value="update" id="type">
        <div class="text-end">
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
    </div>
    
</div>