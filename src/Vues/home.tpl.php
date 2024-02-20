<div class="container">
    <h1 class="display-4"><?= $data["h1"] ?></h1>
    <section class="row">

    
    <!-- <?php print_r($data["vehicle"]) ?> -->

    <?php foreach ( $data["vehicle"] as $key => $value ) : ?>
        <div class="col-4">
            <article class="card mb-4">
                <h2 class="card-header h6"><?= $value->getName() ?></h2>
                <img src="<?= $value->getImage() ?>" alt=" <?= $value->getName() ?> " style="height:150px;object-fit:cover">
                <h2 class="card-header h6"><?= $value->getModel() ?></h2>
                <div class="card-body" style="height:100px">
                    <p><?= $value->getDescription() ?></p>
                </div>
            </article>
        </div>
        <?php endforeach ?>
       
    </section>
</div>
  