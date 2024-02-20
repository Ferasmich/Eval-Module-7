&nbsp;
<div class="container">

<a href="<?= $router->generate("open_user_page") ?>" class="btn btn-primary float-end"> Create New </a>

    <h1 class="display-4"><?= $data["h1"] ?></h1>

    <!-- <?php print_r($data["user"]) ?> -->

    <div class="container">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["user"] as $key => $value): ?>
                    <tr>
                        <td><?= $value->getId() ?></td>
                        <td><?= $value->getEmail() ?></td>
                        <td><?= $value->getPassword() ?></td>
                        <td>
                            <a href="manage_user.php?user_id=<?= $value->getId() ?>" class="btn btn-danger" > Modify </a>
                        </td>
                        <td>
                            <a href="manage_user.php?use_id=<?= $value->getId() ?>" class="btn btn-danger" > Delete </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
