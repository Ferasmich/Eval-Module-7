&nbsp;
<div class="container">

<a href="<?= $router->generate("admin_user_new") ?>" class="btn btn-primary float-end"> Create New </a>

    <h1 class="display-4"><?= $data["h1"] ?></h1>

    <!-- <?php print_r($data["user"]) ?> -->

    <div class="container">

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Pseudo</th>

                </tr>
            </thead>
            <tbody>
            <?php foreach ($data["user"] as $key => $value): ?>
                <tr>
                    <td><?= $value->getId() ?></td>
                    <td><?= $value->getEmail() ?></td>
                    <td><?= $value->getPassword() ?></td>
                    <td><?= $value->getPseudo() ?></td>
                    <td>
                        <form method="post" action="delete">
                            <input type="hidden" name="user_id" value="<?= $value->getId() ?>">
                            <input type="submit" name="Delete" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form method="post" action="modify">
                            <input type="hidden" name="user_id" value="<?= $value->getId() ?>">
                            <input type="submit" name="Modify" class="btn btn-danger" value="Modify">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
