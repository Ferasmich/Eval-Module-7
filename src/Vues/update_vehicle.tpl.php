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

    <?php
        foreach($data["vehicle"] as $key => $value)
        $name = $value->getName();
        $model = $value->getModel();
        $description = $value->getDescription();
        $image = $value->getImage();
        $date_creation = $value->getDtCreation();
        $available = $value->getOn_sale();
    ?>

    <form method="post" action="update">
    <div class="mb-3">
            <label for="vehicle_id">ID </label>
            <input type="text" id="vehicle_id" class="form-control" name="vehicle_id" value="<?php echo $data["vehicle_id"]; ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="name"> Name </label>
            <input type="text" name="name" class="form-control" id="name" value="<?= $name ?>">
        </div>
        <div class="mb-4">
            <label for="model"> Model </label>
            <input type="text" name="model" class="form-control" id="model" value="<?= $model ?>">
        </div>
        <div class="mb-4">
            <label for="description"> Description </label>
            <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?= $description ?></textarea>
        </div>

        <div class="mb-4">
            <label for="image"> Image Link </label>
            <input type="text" name="image" class="form-control" id="image" value=" <?= $image ?>">
        </div>

        <div class="mb-4">
            <label for="date_creation"> Date </label>
            <input type="text" name="date_creation" class="form-control" id="date_creation" value=" <?= $date_creation ?>">
        </div>

        <div class="mb-4">
            <label for="on_sale"> Available </label>
            <input type="text" name="on_sale" class="form-control" id="on_sale" value=" <?= $available ?>">
        </div>

        <div class="text-end">
            <input type="submit" class="btn btn-primary" value="update">
        </div>
    </form>
</div>