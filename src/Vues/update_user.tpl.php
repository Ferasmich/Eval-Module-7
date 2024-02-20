<div class="container">
    <h1><?= $data["h1"] ?></h1>
    <?php if(!empty($data["erreur"])) :?>
        <div class="alert alert-danger">
            <?php foreach($data["erreur"] as $key => $value) : ?>
                <div><?=  $value  ?></div>
            <?php endforeach ?>
        </div>
    <?php endif ?>

    <?php var_dump($data["user_id"]); ?>

    <div class="row">
    <form method="post" class="col-6 offset-3 my-4" action="update">
        <div class="mb-3">
            <label for="user_id">ID </label>
            <input type="user_id" id="user_id" class="form-control" name="user_id" value="<?php echo $data["user_id"]; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="email">email </label>
            <input type="email" id="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="password">password </label>
            <input type="password" id="password" class="form-control" name="password">
        </div>
        <div class="text-end">
            <input type="submit" class="btn btn-success" value="Update">
        </div>
    </form>
    </div>
    
</div>