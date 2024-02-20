&nbsp;
<div class="container">

<a href="<?= $router->generate("open_vehicle_page") ?>" class="btn btn-primary float-end"> Create New </a>

    <h1 class="display-4"><?= $data["h1"] ?></h1>

    <!-- <?php print_r($data["vehicle"]) ?> -->

    <div class="container">

        <table class="table table-striped table-hover" style="width:80%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Model</th>
                    <th> Availability</th>
    
                </tr>
            </thead>
            <tbody>
            <?php foreach ($data["vehicle"] as $key => $value): ?>
                <tr>
                    <td><?= $value->getId() ?></td>
                    <td><?= $value->getName() ?></td>
                    <td><?= $value->getModel() ?></td>
                    <td><?= $value->getOn_sale() ?></td>
                    <td>
                        <form method="post" action="delete">
                            <input type="hidden" name="vehicle_id" value="<?= $value->getId() ?>">
                            <input type="submit" name="Delete" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="modify">
                            <input type="hidden" name="vehicle_id" value="<?= $value->getId() ?>">
                            <input type="submit" name="Modify" class="btn btn-danger" value="Modify">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            
            </tbody>
        </table>
    </div>
</div>
