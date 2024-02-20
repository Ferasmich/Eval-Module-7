&nbsp;

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
        <div class="mb-4">
            <label for="name"> Name *</label>
            <input type="text" name="name" class="form-control" id="name" value="<?= $data["vehicle"]->getName() ?>">
        </div>
        <div class="mb-4">
            <label for="model"> Model *</label>
            <input type="text" name="model" class="form-control" id="model" value="<?= $data["vehicle"]->getModel() ?>">
        </div>
        <div class="mb-4">
            <label for="description"> Description *</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $data["vehicle"]->getDescription() ?></textarea>
        </div>

        <div class="mb-4">
            <label for="image"> Image Link </label>
            <input type="text" name="image" class="form-control" id="image" value="<?= $data["vehicle"]->getImage() ?>">
        </div>

        <div class="mb-4">
            <label for="dt_creation"> Date </label>
            <input type="text" name="dt_creation" class="form-control" id="dt_creation" value="<?= $data["vehicle"]->getDtCreation() ?>">
        </div>

        <div class="mb-4">
            <label for="on_sale"> Available </label>
            <input type="text" name="on_sale" class="form-control" id="on_sale" value="<?= $data["vehicle"]->getOn_sale() ?>">
        </div>

        <div class="text-end">
            <input type="submit" class="btn btn-primary" value="créer nouvel vehicle">
        </div>
    </form>
</div>