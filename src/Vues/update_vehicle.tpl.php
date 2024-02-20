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
    <form method="post" action="update">
    <div class="mb-3">
            <label for="vehicle_id">ID </label>
            <input type="vehicle_id" id="vehicle_id" class="form-control" name="vehicle_id" value="<?php echo $data["vehicle_id"]; ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="name"> Name </label>
            <input type="text" name="name" class="form-control" id="name" >
        </div>
        <div class="mb-4">
            <label for="model"> Model </label>
            <input type="text" name="model" class="form-control" id="model" >
        </div>
        <div class="mb-4">
            <label for="description"> Description </label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">
            </textarea>
        </div>

        <div class="mb-4">
            <label for="image"> Image Link </label>
            <input type="text" name="image" class="form-control" id="image" >
        </div>

        <div class="mb-4">
            <label for="dt_creation"> Date </label>
            <input type="text" name="dt_creation" class="form-control" id="dt_creation" >
        </div>

        <div class="mb-4">
            <label for="on_sale"> Available </label>
            <input type="text" name="on_sale" class="form-control" id="on_sale" >
        </div>

        <div class="text-end">
            <input type="submit" class="btn btn-primary" value="update">
        </div>
    </form>
</div>