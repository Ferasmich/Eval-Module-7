<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Module 07 </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">

    <style>
body {
  display: flex;
  flex-direction: column;
  min-height: 100vh; /* Ensures body takes up full viewport height */
}

main {
  flex: 1; /* Expands to fill available space */
}

    </style>

  </head>
  <body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <span class="navbar-brand p-2">
              Module 07
        </span>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="<?= $router->generate("home") ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="<?= $router->generate("login") ?>" class="nav-link">Login</a>
            </li>
            <?php if (isset($_SESSION["user"])) : ?>
                <li class="nav-item">
                    <a href="<?= $router->generate("logout") ?>" class="nav-link">Logout</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                        <li><a class="dropdown-item" href="<?= $router->generate("admin_manage_vehicle") ?>"> Manage Vehicle </a></li>
                        <li><a class="dropdown-item" href="<?= $router->generate("admin_manage_user") ?>"> Manage User </a></li>
                    </ul>
                </li>
                
            <?php endif ?>
        </ul>
    </nav>
</header>
